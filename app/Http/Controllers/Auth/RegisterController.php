<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Subsidiary;
use App\Models\Laboratory;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type_organization' => ['required', 'string', 'max:255', Rule::in(['Farmacia', 'Laboratorio']) ], //Rule hace, que solo admita 2 valores, entre Farmacia y Laboratorio
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $newUser = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]); //Creo un nuevo usuario

        if($data['type_organization'] === "Farmacia"){

            $pharmacy = Pharmacy::create([
                'name' => $data['name'],
                'user_id' => $newUser->id,
            ]); //Creo una nueva farmacia

            $newUser->assignRole('pharmacy_admin'); //Le asigno el rol
            
            session(['pharmacy' => $pharmacy]);
            session(['subsidiares_pharmacy' => Subsidiary::where('pharmacy_id', $pharmacy->id)->get()]);
        }

        else if ($data['type_organization'] === "Laboratorio" ){
            $laboratory = Laboratory::create([
                'name' => $data['name'],
                'user_id' => $newUser->id,
            ]);

            $newUser->assignRole('laboratory_admin');
            session(['laboratory' => $laboratory]);
        }

        return $newUser;
    }
}
