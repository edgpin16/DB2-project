<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavedSubsidiary;
use App\Models\Subsidiary;

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
            'city' => $validated['city'],
            'province' => $validated['province']
        ]); 

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
    public function edit($id)
    {
        //
        $subsidiary = Subsidiary::findOrFail($id);
        if($subsidiary)
            return view('subsidiary.edit', [
                'subsidiary' => $subsidiary,
            ]);
        else
            return redirect()->route('subsidiary.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSavedSubsidiary $request, $id)
    {
        //
        $subsidiary = Subsidiary::findOrFail($id);
        if($subsidiary)
            $subsidiary->update( array_filter($request->validated()) ); 
        
        return redirect()->route('subsidiary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subsidiary = Subsidiary::findOrFail($id);
        if($subsidiary)
            $subsidiary->delete();
        
        return redirect()->route('subsidiary.index');
    }
}
