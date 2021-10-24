<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use App\Models\Subsidiary;
use Exception;

class DebtsToPayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:medicine.index')->only('index');
        // $this->middleware('can:medicine.create')->only('create','store');
        // $this->middleware('can:medicine.edit')->only('edit','update');
        // $this->middleware('can:medicine.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('debtsToPay.index', [
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

        return redirect()->route('debtsToPay.show', $data['subsidiary']);
    }
    
    public function show($IDSubsidiary)
    {
        //
        try{
            $subsidiary = Subsidiary::findOrFail($IDSubsidiary); //Obtengo la sucursal
            $debtsToPays = $subsidiary->debtsToPays()->with('order')->get(); //Obtengo las cuentas por pagar
            return view('debtsToPay.show', [
                'subsidiary' => $subsidiary,
                'debtsToPays' => $debtsToPays,
            ]);
        }
        catch(Exception $e){
            return redirect()->route('home');
        }
    }

}
