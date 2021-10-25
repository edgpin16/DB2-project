<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Subsidiary;
use App\Models\Laboratory;
use App\Models\Order;
use App\Models\Product;
use App\Models\DebtsToPay;

use Exception;
use App\Http\Requests\StoreSavedOrder;
use App\Models\SubsidiaryStock;

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
        $this->middleware('can:order.index')->only('index');
        $this->middleware('can:order.validateData')->only('validateData');
        $this->middleware('can:order.show')->only('show');
        $this->middleware('can:order.showProducts')->only('showProducts');
        $this->middleware('can:order.create')->only('create');
        $this->middleware('can:order.getData')->only('getDataOrder');
        $this->middleware('can:order.store')->only('store');
        $this->middleware('can:order.confirmOrder')->only('confirmOrder');
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
        return view('orders.create', [
            'subsidiaries' => session('subsidiares_pharmacy'),
            'laboratories' => Laboratory::all()
        ]);
    }

    public function getDataOrder(){

        $data = request()->validate([
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ],
            'laboratory' => ['required', 'numeric', Rule::exists('laboratories', 'id')],
            'payment_type' => ['required', 'string', Rule::in(['decontado', 'credito'])],
        ]);

        try{

            $subsidiary = Subsidiary::findOrFail($data['subsidiary']);
            $laboratory = Laboratory::findOrFail($data['laboratory']);


            return view('orders.formCreateOrder', [
                'subsidiary' => $subsidiary,
                'laboratory' => $laboratory,
                'payment_type' => $data['payment_type'],
                'medicines' => $laboratory->medicines()->get(),
                'analists' => $subsidiary->employeers()->where('category', 'analyst')->get(),
            ]);
        }
        catch(Exception $e){
            ddd($e);
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavedOrder $request)
    {
        //

        $data = $request->validated(); //Valido los datos

        $medicines = $data['medicines']; //Obtengo las medicinas
        $quantitys = $data['quantitys']; //Obtengo sus cantidades

        $order = Order::create([
            'subsidiary_id' => $data['subsidiary'],
            'laboratory_id' => $data['laboratory'],
            'analist' => $data['analist'],
            'payment_type' => $data['payment_type'],
            'payment_date' => $data['payment_date'],
            'status' => 0,
        ]); //Creo la orden

        for ($i = 0; $i < sizeof($medicines); $i++)
            Product::create([
                'order_id' => $order->id,
                'serial_number_medicine' => $medicines[$i],
                'quantity' => $quantitys[$i],
            ]); //Creo los n productos, que dependerán de la cantidad de medicamentos escogidos
        
        return redirect()->route('order.show', $data['subsidiary']);
        // ddd($data, $medicines, $quantitys, $order, sizeof($medicines), sizeof($quantitys));

    }

    public function confirmOrder(Order $Order){

        if($Order->status == 0){

            $products = $Order->products()->with('medicine')->get(); //Obtengo todos los productos

            $totalAmount = 0; //El monto a pagar, es 0 al principio, ya que no se ha iterado nada

            if(!$products->isEmpty()) //Si los productos no estan vacíos
                foreach ($products as $product) {
                    $totalAmount += ($product->medicine->price * $product->quantity); 
                    //Itero todos los productos, de cada producto, obtengo el precio de la medicina, y la multiplico por la cantidad a comprar
                }

            DebtsToPay::create([
                'order_id' => $Order->id,
                'subsidiary_id' => $Order->subsidiary_id,
                'laboratory_id' => $Order->laboratory_id,
                'amount_to_pay' => $totalAmount,
            ]); //Creo una cuenta por pagar, enlazada con la sucursal, y el id del pedido

            if(!$products->isEmpty()){
                //Si los productos no estan vacíos
                $laboratoryName = $products[0]->medicine->laboratory()->first()->name;
                foreach ($products as $product) {
                    
                    SubsidiaryStock::create([
                        'subsidiary_id' => $Order->subsidiary_id,
                        'serial_number' => $product->medicine->serial_number,
                        'name_laboratory' => $laboratoryName, //Ya que todos son del mismo laboratorio
                        'name_medicine' => $product->medicine->name_medicine,
                        'presentation' => $product->medicine->presentation,
                        'main_component' => $product->medicine->main_component,
                        'therapeutic_action' => $product->medicine->therapeutic_action,
                        'price_by_unit' => $product->medicine->price + $product->medicine->price * 0.30,
                        'quantity' => $product->quantity,
                    ]);
                    //Itero todos los productos, de cada producto, los guardo en el stock de la sucursal correspondiente.
                }
            } 

            $Order->update([
                'status' => 1, //Actualizo el estado del pedido a 1, o listo
            ]);

        }

        return redirect()->route('order.show', $Order->subsidiary_id);

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
