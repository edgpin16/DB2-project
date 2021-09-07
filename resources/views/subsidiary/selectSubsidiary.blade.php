@extends('adminlte::page')

@section('title', 'Elegir una sucursal')

@section('content_header')
    <h1 class="text-center mb-2" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h2 class="text-center">Selecciona una sucursal: </h2>
@stop

@section('content')
    {{-- {{ddd(request()->routeIs('/seleccionar-sucursal/administrativo'))}} --}}
        <div class="d-flex justify-content-between"> 
            @forelse ($subsidiaries as $subsidiary)
                <div class="row w-75">
                    <div class="card mr-5">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Sucursal n° {{$loop->iteration}} : </h5>
                            <p class="card-text" > Nombre: {{ $subsidiary->name }} </p>
                            <p class="card-text" > Ciudad: {{ $subsidiary['city'] }} </p>
                            <p class="card-text" > Provincia: {{ $subsidiary['province'] }} </p>
                            <a href=" # " class="btn btn-primary mb-2 btn-block" role="button" >Seleccionar</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posees ninguna sucursal :( </p>
                <a href="{{ route('subsidiary.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar una</a>
            @endforelse
        </div>
        @if ($subsidiaries)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <label for="type_category" class="mr-3">Selecciona un tipo de categoría: </label>
                            <select class="input-group mb-3" name= "type_category" id="type_category">
                                <option value=""></option>

                                <option 
                                    value="administrative" 
                                    {{request()->path() === 'seleccionar-sucursal/administrativo' ? 'selected' : 'disabled'}}
                                >
                                    Administrativo
                                </option>

                                <option 
                                    value="auxiliaryPharmacy"
                                    {{request()->path() === 'seleccionar-sucursal/auxiliarFarmacia' ? 'selected' : 'disabled'}}
                                >
                                    Auxiliar de farmacia
                                </option>

                                <option 
                                    value="Analyst"
                                    {{request()->path() === 'seleccionar-sucursal/analista' ? 'selected' : 'disabled'}}                               
                                >
                                    Analista
                                </option>
                                
                                <option 
                                    value="pharmaceutist"
                                    {{request()->path() === 'seleccionar-sucursal/farmaceutico' ? 'selected' : 'disabled'}}
                                >
                                    Farmaceutico
                                </option>

                                <option 
                                    value="intern"
                                    {{request()->path() === 'seleccionar-sucursal/pasante' ? 'selected' : 'disabled'}}
                                >
                                    Pasante
                                </option>

                                <option 
                                    value="minorIntern"
                                    {{request()->path() === 'seleccionar-sucursal/pasanteMenorDeEdad' ? 'selected' : 'disabled'}}
                                >
                                    Pasante menor de edad
                                </option>

                            </select>
                            @if($errors->has('type_category'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('type_category') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop