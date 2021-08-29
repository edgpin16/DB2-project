@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    {{-- {{ ddd($pharmacy) }} --}}
    @if ($pharmacy)
        <p> {{ Auth::user()->email }} </p>
        <p> {{ $pharmacy->name }} </p>
    @endif

    @if (!$subsidiares->isEmpty())
        <p>Tienes una o mas sucursales!!!</p>
        @foreach ($subsidiares as $subsidiary)
            <p> {{$subsidiary->city}} </p>
            <p> {{$subsidiary->province}} </p>
        @endforeach
    @else
        <p>No tienes una sucursal :( Debes agregar una!! </p>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
