<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Subsidiary;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if( !session()->has('pharmacy') )
            session(['pharmacy' => Pharmacy::where('user_id', auth()->user()->id)->first()]); //En este caso, porque por las reglas del negocio sabemos que sí o sí, un usuario tendrá asociado SOLO una cuenta.
        
        if( !session()->has('subsidiares_pharmacy') )
            session(['subsidiares_pharmacy' => Subsidiary::where('pharmacy_id', session('pharmacy')->id)->get()]); //Obtengo todas las sucursales donde su clave foranea sea igual al id de la sesión
        
        return view('home', [
            'pharmacy' => session('pharmacy'),
            'subsidiares' => session('subsidiares_pharmacy'),
        ]);
    }
}

        //Podemos colocar auth()->user() 
        // $pharmacy = User::find(auth()->id())->with('pharmacy');
        // ddd(auth()->user()->with('pharmacy') );
        // $pharmacy = Pharmacy::where('id_user', auth()->user()->id);

        // 'pharmacy' => User::with('pharmacy')->find(auth()->id()),
        // 'pharmacy' => $pharmacy,
        // 'pharmacy' => User::find(auth()->id())->pharmacy,
        //'pharmacy' => User::with('pharmacy')->find(auth()->id()),