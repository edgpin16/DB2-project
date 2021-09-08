<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsidiary;

use App\Http\Requests\StoreSavedSubsidiarySelected;

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

        /**
     * Valida los datos seleccionados en la ruta get selectSubsidiary.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateData(StoreSavedSubsidiarySelected $request)
    {
        //
        // ddd($request);
        $validated = $request->validated();
        ddd($validated);
    }

}
