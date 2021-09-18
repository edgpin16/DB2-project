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
        $this->middleware('can:selectSubsidiary');
        $this->middleware('can:validateDataSubsidiaryCategory');
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
        $validated = $request->validated(); //Valido los datos

        $subsidiaryID = $validated['subsidiary'];
        $typeCategory = $validated['type_category'];

        if($typeCategory === "administrative" || $typeCategory === "Analyst" || $typeCategory === "auxiliaryPharmacy")
            return redirect()->route('empleado.index', [$typeCategory,$subsidiaryID,]);
        else if($typeCategory === "pharmaceutist")    
            return redirect()->route('employeerPharmaceutist.index', [$subsidiaryID]);
        else if($typeCategory === "intern")
            return redirect()->route('employeerIntern.index', [$subsidiaryID]);
        else
            return redirect()->route('home');
    }
}