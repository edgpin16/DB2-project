<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employeer;
use App\Models\Subsidiary;
use Exception;

use App\Http\Requests\StoreSavedEmployeer;

class EmployeerController extends Controller
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
    public function index($category, $SubsidiaryID)
    {
        try{
            return view('employeer.index',[
                'employeers' => Employeer::where('category', $category)->where('subsidiary_id', $SubsidiaryID)->get(),
                'nameSubsidiary' => Subsidiary::findOrFail($SubsidiaryID)->name, //Cuando haya tiempo, cambiar a deber del ID, que este el nombre de la sucursal
            ]);
        }
        catch(Exception $e){
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employeer.create', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedEmployeer $request)
    {
        //
        $validated = $request->validated();

        Employeer::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'CI' => $validated['CI'],
            'date_birth' => $validated['date_birth'],
            'salary' => $validated['salary'],
            'subsidiary_id' => $validated['subsidiary'],
            'category' => $validated['type_category'],
        ]);

        return redirect()->route('empleado.index', [$validated['type_category'], $validated['subsidiary']]);
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
    public function edit(Employeer $employeer)
    {
        //
        return view('employeer.edit', [
            'employeer' => $employeer,
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSavedEmployeer $request, Employeer $employeer)
    {
        //
        $employeer->update( array_filter($request->validated()) );

        return redirect()->route('empleado.index', [$employeer->category, $employeer->subsidiary_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employeer $employeer)
    {
        //
        $category = $employeer->category;
        $SubsidiaryID = $employeer->subsidiary_id;

        $employeer->delete();

        return redirect()->route('empleado.index', [$category, $SubsidiaryID]);
    }
}
