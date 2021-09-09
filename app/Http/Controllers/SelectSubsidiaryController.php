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
        $validated = $request->validated(); //Valido los datos

        $subsidiaryID = $validated['subsidiary'];
        $typeCategory = $validated['type_category'];

        if($typeCategory === "administrative" || $typeCategory === "Analyst" || $typeCategory === "auxiliaryPharmacy")
            return redirect()->route('empleado.index', [$typeCategory,$subsidiaryID,]);

    }
}



        // ddd($subsidiaryID, $typeCategory);
        //Ahora, lo que hay que hacer, es, luego que los datos fueron validados, dependiendo del tipo de categoria a escoger, redireccionarlos al controlador respectivo, para los usuarios administrativos, auxiliares y analistas al EmployeerController, a los usuarios farmaceuticos, al controlador respectivo, al usuario Pasante al controlador respectivo y tal vez al pasante menor de edad a su controlador respectivo