<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;
use App\Http\Requests\StoreSavedMedicine;

class MedicineController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:medicine.index')->only('index');
        $this->middleware('can:medicine.create')->only('create','store');
        $this->middleware('can:medicine.edit')->only('edit','update');
        $this->middleware('can:medicine.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('medicine.index', [
            'laboratory' => session('laboratory'),
            'medicines' => session('laboratory')->medicines()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('medicine.create', [
            'laboratory' => session('laboratory'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedMedicine $request)
    {
        //
        $data = $request->validated();

        Medicine::create([
            'serial_number' => $data['serial_number'],
            'laboratory_id' => session('laboratory')->id,
            'name_medicine' => $data['name_medicine'],
            'presentation' => $data['presentation'],
            'main_component' => $data['main_component'],
            'therapeutic_action' => $data['therapeutic_action'],
        ]);

        return redirect()->route('medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
        return view('medicine.edit', [
            'laboratory' => session('laboratory'),
            'medicine' => $medicine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSavedMedicine $request, Medicine $medicine)
    {
        //
        // if($medicine->laboratory()->first()->id === session('laboratory')->id) Esto para validar que la medicina a actualizar pertenezca al laboratorio, comprobación opcional. 
        $medicine->update( array_filter($request->validated()) );

        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
        $medicine->delete();

        return redirect()->route('medicine.index');
    }
}
