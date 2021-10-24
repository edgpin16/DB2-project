@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h1 class="text-center">Sucursal: {{$subsidiary->name}} </h1>
@stop

@section('content')

    <div class="d-flex flex-wrap justify-content-between">
        @forelse ($orders as $order)
            <div class="row w-25">
                <div class="card mr-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Pedido n° {{$order->id}} : </h5>
                        <p class="card-text" > Analista que emitió el pedido: {{$order->analist}} </p>
                        <p class="card-text" > Tipo de pago: {{$order->payment_type}} </p>
                        <p class="card-text" > Fecha de pago: {{$order->payment_date}} </p>
                        <p class="card-text" > Nombre del laboratorio: {{$order->laboratory->name}} </p>
                        <p class="card-text" > Status: {{ $order->status == 0 ? 'En espera' : 'En stock' }} </p>

                        <a href=" {{ route('order.showProducts', $order) }} " class="btn btn-primary mb-2 btn-block" role="button" >Ver todos los productos</a>

                        @if ( $order->status == 0 )
                            <form action="{{route('order.confirmOrder', $order)}}" method="POST">
                                @csrf
                                <button class="btn btn-primary mb-2 btn-block" >Confirmar pedido</button>
                            </form>
                            {{-- <a href=" {{ route('order.confirmOrder', $order) }} " class="btn btn-primary mb-2 btn-block" role="button" >Confirmar pedido</a> --}}
                        @endif

                        {{-- <a href=" {{ route('medicine.edit', $medicine) }} " class="btn btn-primary mb-2 btn-block" role="button" >Editar</a>
                        <form method="POST" action=" {{route('medicine.destroy', $medicine)}} ">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary mb-2 btn-block" >Eliminar</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        @empty
            <p>No posees ningun pedido :( </p>
            <a href="{{ route('order.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar uno</a>
        @endforelse
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop