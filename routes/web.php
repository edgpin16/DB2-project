<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InstallerController;
use App\http\Controllers\SubsidiaryController;
use App\Http\Controllers\SelectSubsidiaryController;
use App\Http\Controllers\EmployeerController;
use App\Http\Controllers\EmployeerPharmaceutistController;
use App\Http\Controllers\EmployeerInternController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DebtsToPayController;
use App\Http\Controllers\SubsidiaryStockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InstallerController::class, 'index'])->name('index');

Route::post('validar-datos-instalador', [InstallerController::class, 'validateDataInstaller'])->name('installer.validateData');

// Route::get('realizar-migraciones', [InstallerController::class, 'realizeMigrations'])->name('installer.realizeMigrations');

// Route::post('realizando-migraciones', [InstallerController::class, 'doMigrations'])->name('installer.doMigrations');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('sucursal', SubsidiaryController::class)->parameters(['sucursal' => 'subsidiary'])->names('subsidiary');

Route::get('/seleccionar-sucursal/{nameCategory?}', [SelectSubsidiaryController::class, 'index'])->name('selectSubsidiary');

Route::post('/validando-datos', [SelectSubsidiaryController::class, 'validateData'])->name('validateDataSubsidiaryCategory');

Route::get('/empleado/{nameCategory?}/sucursal/{idSubsidiary?}', [EmployeerController::class, 'index'])->name('empleado.index');

Route::get('/empleado/crear/{nameCategory?}', [EmployeerController::class, 'create'])->name('empleado.create');

Route::resource('empleado', EmployeerController::class)->except('index', 'create')->parameters(['empleado' => 'employeer'])->names('employeer');

Route::get('/empleadoFarmaceutico/sucursal/{idSubsidiary?}', [EmployeerPharmaceutistController::class, 'index'])->name('employeerPharmaceutist.index');

Route::resource('empleadoFarmaceutico', EmployeerPharmaceutistController::class)->except('index', 'show')->parameters(['empleadoFarmaceutico' => 'employeer'])->names('employeerPharmaceutist');

Route::get('/empleadoPasante/sucursal/{idSubsidiary?}', [EmployeerInternController::class, 'index'])->name('employeerIntern.index');

Route::resource('empleadoPasante', EmployeerInternController::class)->except('index', 'show')->parameters(['empleadoPasante' => 'employeer'])->names('employeerIntern');

Route::get('laboratorio/editarDatos', [LaboratoryController::class, 'edit'])->name('laboratory.edit');

Route::patch('laboratorio/validandoDatos/{laboratory?}', [LaboratoryController::class, 'update'])->name('laboratory.update');

Route::resource('medicina', MedicineController::class)->except('show')->parameters(['medicina' => 'medicine'])->names('medicine');

Route::post('pedidos/validando-datos', [OrderController::class, 'validateData'])->name('order.validateData');

Route::get('pedidos/mostrando-datos/{idSubsidiary?}', [OrderController::class, 'show'])->name('order.show');

Route::resource('pedidos', OrderController::class)->except('show')->parameters(['pedidos' => 'order'])->names('order');

Route::get('pedidos/mostrando-datos/productos/{idOrder?}', [OrderController::class, 'showProducts'])->name('order.showProducts');

Route::get('pedidos/obteniendo-datos', [OrderController::class, 'getDataOrder'])->name('order.getData');

Route::post('pedidos/confirmar-pedido/{Order?}', [OrderController::class, 'confirmOrder'])->name('order.confirmOrder');

Route::resource('cuentas-por-pagar', DebtsToPayController::class)->except(['show', 'store', 'create', 'edit', 'update', 'destroy'])->parameters(['cuentas-por-pagar' => 'debtsToPay'])->names('debtsToPay');

Route::post('cuentas-por-pagar/validar-datos', [DebtsToPayController::class, 'validateData'])->name('debtsToPay.validateData');

Route::get('cuentas-por-pagar/sucursal/{IDSubsidiary?}', [DebtsToPayController::class, 'show'])->name('debtsToPay.show');

Route::resource('stock-sucursal', SubsidiaryStockController::class)->except(['show', 'store', 'create', 'edit', 'update', 'destroy'])->parameters(['stock-sucursal' => 'subsidiaryStock'])->names('subsidiaryStock');

Route::post('stock-sucursal/validar-datos', [SubsidiaryStockController::class, 'validateData'])->name('subsidiaryStock.validateData');

Route::get('stock-sucursal/sucursal/{IDSubsidiary?}', [SubsidiaryStockController::class, 'show'])->name('subsidiaryStock.show');