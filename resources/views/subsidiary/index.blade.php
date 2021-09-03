@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
@stop

@section('content')
        <div class="d-flex justify-content-between">
            @forelse ($subsidiaries as $subsidiary)
                <div class="row w-75">
                    <div class="card mr-5">
                        <div class="card-body">
                            <h5 class="card-title">Sucursal n° {{$loop->iteration}} : </h5>
                            <p class="card-text" > Ciudad: {{ $subsidiary['city'] }} </p>
                            <p class="card-text" > Provincia: {{ $subsidiary['province'] }} </p>
                            <a href=" {{ route('subsidiary.edit', $subsidiary) }} " class="btn btn-primary mb-2 btn-block" role="button" >Editar</a>
                            <form method="POST" action=" {{route('subsidiary.destroy', $subsidiary)}} ">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary mb-2 btn-block" >Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posees ninguna sucursal :( </p>
                <a href="{{ route('subsidiary.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar una</a>
            @endforelse
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop