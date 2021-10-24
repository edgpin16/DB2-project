@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h1 class="text-center">Sucursal: {{$subsidiary->name}} </h1>
@stop

@section('content')

    <div class="d-flex flex-wrap justify-content-between">
        @forelse ($subsidiaryStocks as $subsidiaryStock)
            <div class="row w-25">
                <div class="card mr-5">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Medicina N°: {{$subsidiaryStock->id}}</h4>

                        <p class="card-text" > N° de serial: {{$subsidiaryStock->serial_number}} </p>
                        <p class="card-text" > Nombre de la medicina: {{$subsidiaryStock->name_medicine}} </p>
                        <p class="card-text" > Nombre del laboratorio: {{$subsidiaryStock->name_laboratory}} </p>
                        <p class="card-text" > Presentación: {{$subsidiaryStock->presentation}} </p>
                        <p class="card-text" > Componente principal: {{$subsidiaryStock->main_component}} </p>
                        <p class="card-text" > Acción terapeútica: {{$subsidiaryStock->therapeutic_action}} </p>
                        <p class="card-text" > Precio por unidad: {{$subsidiaryStock->price_by_unit}} </p>
                        <p class="card-text" > Cantidad: {{$subsidiaryStock->quantity}} </p>

                    </div>
                </div>
            </div>
        @empty
            <p>No posees ninguna medicina en stock :( </p>
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