@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @if ($pharmacy)
        <h1 class="display-1 text-center"> Farmacia: {{ $pharmacy->name }} </h1>
    @elseif ($laboratory)
        <h1 class="display-1 text-center"> Laboratorio: {{ $laboratory->name }} </h1>
    @endif
@stop

@section('content')

    @if ($pharmacy)
        <p> {{ Auth::user()->email }} </p>
        <p> {{ $pharmacy->name }} </p>
        @if (!$subsidiares->isEmpty())
            <p>Tienes una o mas sucursales!!!</p>
        @else
            <p>No tienes una sucursal :( Debes agregar una!! </p>
        @endif
    @elseif ($laboratory)
        <p> Nombre Laboratorio: {{ $laboratory->name }}</p>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
