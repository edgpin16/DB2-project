@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h1 class="text-center">Sucursal: {{$order->subsidiary->name}} </h1>
@stop

@section('content')

    <div class="d-flex flex-wrap justify-content-between">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h3 class="card-text">Pedido n° {{$order->id}} : </h3>
                    <p class="card-text" > Analista que emitió el pedido: {{$order->analist}} </p>
                    <p class="card-text" > Tipo de pago: {{$order->payment_type}} </p>
                    <p class="card-text" > Fecha de pago: {{$order->payment_date}} </p>
                    <p class="card-text" > Nombre del laboratorio: {{$order->laboratory->name}} </p>
                    <p class="card-text" > Status: {{ $order->status == 0 ? 'En espera' : 'En stock' }} </p>
                </div>
            </div>
        </div>

        @forelse ($products as $product)
            <div class="row w-25">
                <div class="card mr-5">
                    <div class="card-body">
                        <p class="card-text" > N° de serial: {{ $product->medicine->serial_number }} </p>
                            <p class="card-text" > Nombre de la medicina: {{ $product->medicine->name_medicine }} </p>
                            <p class="card-text" > Presentación: {{ $product->medicine->presentation }} </p>
                            <p class="card-text" > Componente principal: {{ $product->medicine->main_component }} </p>
                            <p class="card-text" > Acción terapeútica: {{ $product->medicine->therapeutic_action }} </p>
                            <p class="card-text"> Cantidad: {{$product->quantity}} </p>
                    </div>
                </div>
            </div>
        @empty
            <p>No posees ningun producto :( </p>
            <a href="{{ route('order.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar uno</a>
        @endforelse
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <a href=" {{url()->previous()}} " class="btn btn-primary mb-2" role="button" >Volver</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop