@extends('adminlte::page')

@section('title', 'Elegir una sucursal')

@section('content_header')
    <h1 class="text-center mb-2" >Farmacia: {{ session('pharmacy')->name }} </h1>
@stop

@section('content')
        @if (!$subsidiaries->isEmpty())
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action=" {{ route('validateDataSubsidiaryCategory') }} " method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <label for="subsidiary" class="mr-3">Selecciona una sucursal: </label>
                                <select class="input-group mb-3" name= "subsidiary" id="subsidiary">
                                    <option value=""></option>
                                    @foreach ($subsidiaries as $subsidiary)
                                        <option value=" {{$subsidiary->id}} "> {{ $subsidiary->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('subsidiary')
                                <div class="form-group form-control-lg mb-5">
                                    <div class="mb-5 d-block">
                                        <small style="color: red">
                                            <p>{{ $message }}</p>
                                        </small>  
                                    </div> 
                                </div>  
                            @enderror

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
                                @error('type_category')
                                <div class="form-group form-control-lg">
                                    <div class="d-block">
                                        <small style="color: red">
                                            <p>{{ $message }}</p>
                                        </small>  
                                    </div> 
                                </div>  
                                @enderror
                            </div>
                            <button class="btn btn-primary mb-2 btn-block" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p>No posees ninguna sucursal :( </p>
            <a href="{{ route('subsidiary.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar una</a>
        @endif
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop