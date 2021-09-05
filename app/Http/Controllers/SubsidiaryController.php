<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavedSubsidiary;
use App\Models\Subsidiary;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SubsidiaryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subsidiary.index', [
            'subsidiaries' => session('subsidiares_pharmacy'),
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
        return view('subsidiary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedSubsidiary $request)
    {
        //
        $validated = $request->validated();
        
        Subsidiary::create([
            'pharmacy_id' => session('pharmacy')->id,
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'city' => $validated['city'],
            'province' => $validated['province']
        ]); 

        $this->updateDataSessionSubsidiary();

        return redirect()->route('subsidiary.index');
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
        //En este metodo, redireccionara a una vista, donde se verá el nombre, ciudad, estado, y total de empleados de la farmacia
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subsidiary $subsidiary)
    {
        return view('subsidiary.edit', [
            'subsidiary' => $subsidiary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSavedSubsidiary $request, Subsidiary $subsidiary)
    {
        //
        $subsidiary->update( array_filter($request->validated()) ); 
        $this->updateDataSessionSubsidiary();

        return redirect()->route('subsidiary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsidiary $subsidiary)
    {
        //
        $subsidiary->delete();
        $this->updateDataSessionSubsidiary();

        return redirect()->route('subsidiary.index');
    }

    private function updateDataSessionSubsidiary(){
        session()->forget('subsidiares_pharmacy'); //Olvido los datos que estan almacenados en la sesion
        session(['subsidiares_pharmacy' => Subsidiary::where('pharmacy_id', session('pharmacy')->id)->get()]);//Después, los actualizo aquí
    }
}
