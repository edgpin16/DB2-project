<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pharmacy\Pharmacy;


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
        //Podemos colocar auth()->user() 
        // $pharmacy = User::find(auth()->id())->with('pharmacy');
        // ddd(auth()->user()->with('pharmacy') );
        // $pharmacy = Pharmacy::where('id_user', auth()->user()->id);

        if( !session()->has('pharmacy') )
            session(['pharmacy' => Pharmacy::where('user_id', auth()->user()->id)->get()]);
        

        return view('home', [
            // 'pharmacy' => User::with('pharmacy')->find(auth()->id()),
            // 'pharmacy' => $pharmacy,
            // 'pharmacy' => User::find(auth()->id())->pharmacy,
            //'pharmacy' => User::with('pharmacy')->find(auth()->id()),
            'pharmacy' => session('pharmacy'),
        ]);
    }
}
