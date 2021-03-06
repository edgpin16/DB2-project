<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Employeer;
use App\Models\Subsidiary;
use App\Models\Pharmaceutist;
use App\Models\Certificate;
use App\http\Requests\StoreSavedEmployeerPharmaceutist;

class EmployeerPharmaceutistController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:employeerPharmaceutist.index')->only('index');
        $this->middleware('can:employeerPharmaceutist.create')->only('create','store');
        $this->middleware('can:employeerPharmaceutist.edit')->only('edit','update');
        $this->middleware('can:employeerPharmaceutist.destroy')->only('destroy');
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($SubsidiaryID)
    {    
        try{
            return view('employeerPharmaceutist.index', [
                'employeers' => Employeer::with('pharmaceutist','pharmaceutistCertificate')->where('category', 'pharmaceutist')->where('subsidiary_id', $SubsidiaryID)->get() ,
                'nameSubsidiary' => Subsidiary::findOrFail($SubsidiaryID)->name,
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
        return view('employeerPharmaceutist.create', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedEmployeerPharmaceutist $request)
    {
        //
        $data = $request->validated();

        $employeer = Employeer::create([
            'CI' => $data['CI'],
            'subsidiary_id' => $data['subsidiary'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'date_birth' => $data['date_birth'],
            'salary' => $data['salary'],
            'category' => $data['type_category'],
        ]);

        $employeerPharmaceutist = Pharmaceutist::create([
            'employeer_CI' => $data['CI'],
            'sanitary_permise_number' => $data['sanitary_permise_number'],
            'schooling_number' => $data['schooling_number'],
        ]);

        Certificate::create([
            'pharmaceutist_id' => $employeerPharmaceutist->id,
            'registry_number' => $data['registry_number'],
            'university' => $data['university'],
            'date_registration' => $data['date_registration'],
        ]);

        return redirect()->route('employeerPharmaceutist.index', [$employeer->subsidiary_id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeer $employeer)
    {
        $employeer = Employeer::with('pharmaceutist','pharmaceutistCertificate')->findOrFail($employeer->CI);

        return view('employeerPharmaceutist.edit', [
            'subsidiaries' => session('subsidiares_pharmacy'),
            'employeer' => $employeer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSavedEmployeerPharmaceutist $request, Employeer $employeer)
    {
        //
        $data = $request->validated();

        $employeer->update([
            'CI' => $data['CI'],
            'subsidiary_id' => $data['subsidiary'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'date_birth' => $data['date_birth'],
            'salary' => $data['salary'],
            'category' => $data['type_category'],
        ]);

        $employeer->pharmaceutist()->update([
            'employeer_CI' => $data['CI'],
            'sanitary_permise_number' => $data['sanitary_permise_number'],
            'schooling_number' => $data['schooling_number'],
        ]);

        $employeer->pharmaceutistCertificate()->update([
            'registry_number' => $data['registry_number'],
            'university' => $data['university'],
            'date_registration' => $data['date_registration'],
        ]);

        return redirect()->route('employeerPharmaceutist.index', [$employeer->subsidiary_id]);
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
        $SubsidiaryID = $employeer->subsidiary_id;

        $employeer->delete();

        return redirect()->route('employeerPharmaceutist.index', [$SubsidiaryID]);
    }
}
