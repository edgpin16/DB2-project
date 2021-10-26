<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        //Verifica si NO existe un archivo placebo de instalación
        if( !( Storage::exists('public/installer.txt') ) ) 
            return view('auth.login');
        else
            return redirect()->route('index');
    }

    public function login(){

        $credentials = $this->validate(request(), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($credentials)){
            
            if (Auth()->user()->hasRole('pharmacy_admin')){
                session(['pharmacy' => Auth()->user()->pharmacy()->first()]);
                session(['subsidiares_pharmacy' => Auth()->user()->pharmacySubsidiaries()->get()]);
            }
            else if(Auth()->user()->hasRole('laboratory_admin')){
                session(['laboratory' => Auth()->user()->laboratory()->first()]);
            }
            
            return redirect()->route('home');
        }

        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
        
    }

    protected function loggedOut() {
        request()->session()->flush(); //Cuando nos deslogueamos, esto se encarga de borrar la sesión
        return redirect()->route('login') ;
    }

}
