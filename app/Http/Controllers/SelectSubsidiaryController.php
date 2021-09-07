<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsidiary;

class SelectSubsidiaryController extends Controller
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
     * Muestra la lista de sucursales activas de la farmacia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subsidiary.selectSubsidiary', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

}
