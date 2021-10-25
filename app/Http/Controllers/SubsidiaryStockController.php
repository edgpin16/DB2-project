<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use App\Models\Subsidiary;
use Exception;

class SubsidiaryStockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:subsidiaryStock.index')->only('index');
        $this->middleware('can:subsidiaryStock.validateData')->only('validateData');
        $this->middleware('can:subsidiaryStock.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subsidiaryStock.index', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    public function validateData(){
        $data = request()->validate([
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ]
        ]);

        return redirect()->route('subsidiaryStock.show', $data['subsidiary']);
    }
    
    public function show($IDSubsidiary)
    {
        //
        try{
            $subsidiary = Subsidiary::findOrFail($IDSubsidiary); //Obtengo la sucursal
            $subsidiaryStocks = $subsidiary->subsidiaryStocks()->get(); //Obtengo las medicinas en stock de esa sucursal

            return view('subsidiaryStock.show', [
                'subsidiary' => $subsidiary,
                'subsidiaryStocks' => $subsidiaryStocks,
            ]);
        }
        catch(Exception $e){
            return redirect()->route('home');
        }
    }
}
