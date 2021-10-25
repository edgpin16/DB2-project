<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        
        $subsidiaries = session('subsidiares_pharmacy'); 

        $totalEmployeers = 0; $totalOrders = 0; $totalSubsidiaryStocks = 0; $totalMedicines = 0;

        if( $subsidiaries )
            foreach ($subsidiaries as $subsidiary) {

                $totalEmployeers += $subsidiary->employeers()->count();
                $totalOrders += $subsidiary->orders()->count();
                $totalSubsidiaryStocks += $subsidiary->subsidiaryStocks()->count();

            }
        else if( session('laboratory') )
            $totalMedicines = session('laboratory')->medicines()->count();

        return view('home', [
            'pharmacy' => session('pharmacy'),
            'subsidiares' => session('subsidiares_pharmacy'),
            'laboratory' => session('laboratory'),
            'totalSubsidiaries' => session('subsidiares_pharmacy')?->count(),
            'totalEmployeers' => $totalEmployeers,
            'totalOrders' => $totalOrders,
            'totalSubsidiaryStocks' => $totalSubsidiaryStocks,
            'totalMedicines' => $totalMedicines,
        ]);
    }
}
