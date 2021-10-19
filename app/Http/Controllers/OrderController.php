<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Subsidiary;
use App\Models\Order;
use Exception;

class OrderController extends Controller
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
        return view('orders.index', [
            'subsidiaries' => session('subsidiares_pharmacy'),
        ]);
    }

    public function validateData(Request $request){

        $data = $request->validate([
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ]
        ]);

        return redirect()->route('order.show', $data['subsidiary']);
    }

    public function show($idSubsidiary){
        try{
            $subsidiary = Subsidiary::findOrFail($idSubsidiary); //Obtengo la sucursal
            $orders = $subsidiary->orders()->with('laboratory')->get(); //Obtengo pedidos de la sucursal

            return view('orders.show', [
                'subsidiary' => $subsidiary,
                'orders' => $orders,
            ]);
        }
        catch(Exception $e){
            return redirect()->route('home');
        }
    }

    public function showProducts($idOrder){
        try{
            $order = Order::findOrFail($idOrder);
            $products = $order->products()->with('medicine')->get();
            return view('orders.showProducts', [
                'order' => $order,
                'products' => $products,
            ]);
        }
        catch(Exception $e){
            ddd($e);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
