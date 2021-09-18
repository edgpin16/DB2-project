@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="error-template">
                <h1>
                    Uups!</h1>
                <h2 class="display-1">
                    403 Forbidden
                </h2>
                <div class="error-details mb-4">
                    Lo sentimos :(, un error ha ocurrido! No estas autorizado para hacer esta acción.
                </div>
                
                <div class="error-actions">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Volver al home
                        </a>
                </div>
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