<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Employeer;
use App\Models\Subsidiary;
use App\Models\Intern;

use App\Http\Requests\StoreSavedEmployeerIntern;

class EmployeerInternController extends Controller
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
        //
        try{
            return view('employeerIntern.index', [
                'employeers' => Employeer::with('intern')->where('category', 'intern')->where('subsidiary_id', $SubsidiaryID)->get() ,
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
        return view('employeerIntern.create', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedEmployeerIntern $request)
    {
        //

        $data = $request->validated();

        Employeer::create([
            'CI' => $data['CI'],
            'subsidiary_id' => $data['subsidiary'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'date_birth' => $data['date_birth'],
            'salary' => $data['salary'],
            'category' => $data['type_category'],
        ]);

        Intern::create([
            'employeer_CI' => $data['CI'],
            'university' => $data['university'],
            'specialty' => $data['specialty'],
            'start_internship' => $data['start_internship'],
            'end_internship' => $data['end_internship'],
            'continue_working' => $data['continue_working'],
        ]);

        return redirect()->route('employeerIntern.index', [$data['subsidiary']]);

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
        $employeer = Employeer::with('intern')->findOrFail($employeer->CI);

        return view('employeerIntern.edit', [
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
    public function update(StoreSavedEmployeerIntern $request, Employeer $employeer)
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

        $employeer->intern()->update([
            'employeer_CI' => $data['CI'],
            'university' => $data['university'],
            'specialty' => $data['specialty'],
            'start_internship' => $data['start_internship'],
            'end_internship' => $data['end_internship'],
            'continue_working' => $data['continue_working']
        ]);

        return redirect()->route('employeerIntern.index', [$employeer->subsidiary_id]);
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

        return redirect()->route('employeerIntern.index', [$SubsidiaryID]);

    }
}
