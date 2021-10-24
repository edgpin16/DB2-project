@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h1 class="text-center">Sucursal: {{$subsidiary->name}} </h1>
@stop

@section('content')

    <div class="d-flex flex-wrap justify-content-between">
        @forelse ($debtsToPays as $debtsToPay)
            <div class="row w-25">
                <div class="card mr-5">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Cuenta por pagar n°: {{$debtsToPay->id}}</h4>
                        <h5 class="card-title mb-3">Pedido n° {{$debtsToPay->order->id}} : </h5>
                        <p class="card-text" > Analista que emitió el pedido: {{$debtsToPay->order->analist}} </p>
                        <p class="card-text" > Tipo de pago: {{$debtsToPay->order->payment_type}} </p>
                        <p class="card-text" > Fecha de pago: {{$debtsToPay->order->payment_date}} </p>
                        <p class="card-text" > Nombre del laboratorio: {{$debtsToPay->order->laboratory->name}} </p>
                        <p class="card-text" > Monto a pagar: {{$debtsToPay->amount_to_pay}} </p>

                    </div>
                </div>
            </div>
        @empty
            <p>No posees ninguna cuenta por pagar :( </p>
            <p>Debes primero, ordenar un pedido, y confirmarlo</p>
            <a href="{{ route('order.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar un nuevo pedido</a>
        @endforelse
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop