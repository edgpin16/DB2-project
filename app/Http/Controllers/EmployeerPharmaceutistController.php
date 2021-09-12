<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Employeer;
use App\Models\Subsidiary;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function destroy($id)
    {
        //
    }
}
