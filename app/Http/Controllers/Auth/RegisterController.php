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
        ]);

        Pharmacy::create([
            'name' => $data['name'],
            'user_id' => $newUser->id,
        ]); 

        return $newUser;
        // if($data['type_organization'] === "Farmacia") //Si solicito farmacia
        //     echo("Farmacia"); //Entonces, al final del user::Create, deberemos de colocar asigneRole
        // else if($data['type_organization'] === "Laboratorio")
        //     echo("Laboratorio"); //Igual aquí 
    }
}
