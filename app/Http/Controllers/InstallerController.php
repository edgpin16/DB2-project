<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use PDO;

class InstallerController extends Controller
{
    //
    public function index(){
        return view('installer.index');
    }

    public function validateDataInstaller(){

        $data = request()->validate([
            'SGBD' => ['required', 'string', Rule::in(['sqlite', 'mysql', 'pgsql', 'sqlsrv'])],
            'host' => ['required', 'string'],
            'port' => ['required', 'string'],
            'databaseName' => ['required', 'string'],
            'DBUser' => ['required', 'string'],
            'DBPassword' => ['required', 'string'],
        ]); //Datos validados

        if($data['DBPassword'] == 0) //Si este campo es 0
            $data['DBPassword'] = ''; //Significa que para acceder a la BD, no hace falta la contraseña

            $databases = [
                'mysql' => [
                    'driver' => 'mysql',
                    'url' => env('DATABASE_URL'),
                    'host' => $data['host'],
                    'port' => $data['port'],
                    'database' => $data['databaseName'],
                    'username' => $data['DBUser'],
                    'password' => $data['DBPassword'],
                    'unix_socket' => env('DB_SOCKET', ''),
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'prefix_indexes' => true,
                    'strict' => true,
                    'engine' => null,
                    'options' => extension_loaded('pdo_mysql') ? array_filter([
                        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                    ]) : [],
                ], //Configuración para la BD MYSQL
    
                'sqlite' => [
                    'driver' => 'sqlite',
                    'url' => env('DATABASE_URL'),
                    'database' => env('DB_DATABASE', database_path('database.sqlite')),
                    'prefix' => '',
                    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
                ], //Configuración para la BD SQLITE
    
                'pgsql' => [
                    'driver' => 'pgsql',
                    'url' => env('DATABASE_URL'),
                    'host' => $data['host'],
                    'port' => $data['port'],
                    'database' => $data['databaseName'],
                    'username' => $data['DBUser'],
                    'password' => $data['DBPassword'],
                    'charset' => 'utf8',
                    'prefix' => '',
                    'prefix_indexes' => true,
                    'schema' => 'public',
                    'sslmode' => 'prefer',
                ], //Configuración para la BD POSTGRESQL
    
                'sqlsrv' => [
                    'driver' => 'sqlsrv',
                    'url' => env('DATABASE_URL'),
                    'host' => env('DB_HOST', 'localhost'),
                    'port' => env('DB_PORT', '1433'),
                    'database' => env('DB_DATABASE', 'forge'),
                    'username' => env('DB_USERNAME', 'forge'),
                    'password' => env('DB_PASSWORD', ''),
                    'charset' => 'utf8',
                    'prefix' => '',
                    'prefix_indexes' => true,
                ], //Configuración para la BD SQL SERVER
            ];    

        config(['database.default' => $data['SGBD']]); //Establezco la conexión por defecto, que es la seleccionada

        config(['database.connections' => $databases]); //Establezco la nueva configuración para las BDS

        $database = [
            'default' => $data['SGBD'],
            'connections' => $databases,
            'migrations' => 'migrations',
            'redis' => [
                'client' => env('REDIS_CLIENT', 'phpredis'),
                'options' => [
                    'cluster' => env('REDIS_CLUSTER', 'redis'),
                    'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
                ],
                'default' => [
                    'url' => env('REDIS_URL'),
                    'host' => env('REDIS_HOST', '127.0.0.1'),
                    'password' => env('REDIS_PASSWORD', null),
                    'port' => env('REDIS_PORT', '6379'),
                    'database' => env('REDIS_DB', '0'),
                ],
                'cache' => [
                    'url' => env('REDIS_URL'),
                    'host' => env('REDIS_HOST', '127.0.0.1'),
                    'password' => env('REDIS_PASSWORD', null),
                    'port' => env('REDIS_PORT', '6379'),
                    'database' => env('REDIS_CACHE_DB', '1'),
                ],
            ],
        ];

        // Abrimos el archivo de configuración de BD
        $fp = fopen(base_path() .'/config/database.php' , 'w');
        // Lo sobreescribimos con los datos dinamicos dados por el usuario ya validados
        fwrite($fp, '<?php return ' . var_export($database, true) . ';');
        // Finalmente cerramos el archivo
        fclose($fp);

        //Se abre y se sobreescribe el archivo config/database, debido a que los datos dinámicos no son persistentes en tiempo de ejecución, por ende, debe sobreescribirse de nuevo y borrar la cache.

        try {
            DB::connection()->getPdo(); //Intento obtener la conexión
            if(DB::connection()->getDatabaseName()){ //Si obtengo el nombre exitoso de la base de datos
                Artisan::call('migrate --seed'); //Hago las migraciones con sus seeders
                Artisan::call('config:cache'); //Borro el cache de config
                Artisan::call('cache:clear'); //Borro el cache general
                
                return redirect()->route('login');
            }
        } 
        catch (\Exception $e) {
            return redirect()->route('index')->with('error', $e->getMessage()); //En caso que no, redireccióno al instalador con el mensaje de error
        }

    }
}

//     public function realizeMigrations(){
//         return view('installer.realizeMigrations');
//     }

//     public function doMigrations(){
//         //Artisan::call('cache:forget spatie.permission.cache');
//         //Artisan::call('config:cache');
//         //Artisan::call('cache:clear');
//         Artisan::call('migrate --seed');
//         return redirect()->route('login');
//     }
// }


     // env('DB_CONNECTION', $data['SGBD']);
        // env('DB_HOST', $data['host']);
        // env('DB_PORT', $data['port']);
        // env('DB_DATABASE', $data['databaseName']);
        // env('DB_USERNAME', $data['DBUser']);
        // env('DB_PASSWORD', $data['DBPassword']);

        // $database = [
        //     'default' => $data['SGBD'],
        //     'connections' => [
        //         'mysql' => [
        //             'driver' => 'mysql',
        //             'url' => env('DATABASE_URL'),
        //             'host' => $data['host'],
        //             'port' => $data['port'],
        //             'database' => $data['databaseName'],
        //             'username' => $data['DBUser'],
        //             'password' => $data['DBPassword'],
        //             'unix_socket' => env('DB_SOCKET', ''),
        //             'charset' => 'utf8mb4',
        //             'collation' => 'utf8mb4_unicode_ci',
        //             'prefix' => '',
        //             'prefix_indexes' => true,
        //             'strict' => true,
        //             'engine' => null,
        //             'options' => extension_loaded('pdo_mysql') ? array_filter([
        //                 PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        //             ]) : [],
        //         ], //Configuración para la BD MYSQL
    
        //         'sqlite' => [
        //             'driver' => 'sqlite',
        //             'url' => env('DATABASE_URL'),
        //             'database' => env('DB_DATABASE', database_path('database.sqlite')),
        //             'prefix' => '',
        //             'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        //         ], //Configuración para la BD SQLITE
    
        //         'pgsql' => [
        //             'driver' => 'pgsql',
        //             'url' => env('DATABASE_URL'),
        //             'host' => $data['host'],
        //             'port' => $data['port'],
        //             'database' => $data['databaseName'],
        //             'username' => $data['DBUser'],
        //             'password' => $data['DBPassword'],
        //             'charset' => 'utf8',
        //             'prefix' => '',
        //             'prefix_indexes' => true,
        //             'schema' => 'public',
        //             'sslmode' => 'prefer',
        //         ], //Configuración para la BD POSTGRESQL
    
        //         'sqlsrv' => [
        //             'driver' => 'sqlsrv',
        //             'url' => env('DATABASE_URL'),
        //             'host' => env('DB_HOST', 'localhost'),
        //             'port' => env('DB_PORT', '1433'),
        //             'database' => env('DB_DATABASE', 'forge'),
        //             'username' => env('DB_USERNAME', 'forge'),
        //             'password' => env('DB_PASSWORD', ''),
        //             'charset' => 'utf8',
        //             'prefix' => '',
        //             'prefix_indexes' => true,
        //         ], //Configuración para la BD SQL SERVER
        //     ],
        //     'migrations' => 'migrations',
        //     'redis' => [

        //         'client' => env('REDIS_CLIENT', 'phpredis'),
        
        //         'options' => [
        //             'cluster' => env('REDIS_CLUSTER', 'redis'),
        //             'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        //         ],
        
        //         'default' => [
        //             'url' => env('REDIS_URL'),
        //             'host' => env('REDIS_HOST', '127.0.0.1'),
        //             'password' => env('REDIS_PASSWORD', null),
        //             'port' => env('REDIS_PORT', '6379'),
        //             'database' => env('REDIS_DB', '0'),
        //         ],
        
        //         'cache' => [
        //             'url' => env('REDIS_URL'),
        //             'host' => env('REDIS_HOST', '127.0.0.1'),
        //             'password' => env('REDIS_PASSWORD', null),
        //             'port' => env('REDIS_PORT', '6379'),
        //             'database' => env('REDIS_CACHE_DB', '1'),
        //         ],
        
        //     ],
        // ];