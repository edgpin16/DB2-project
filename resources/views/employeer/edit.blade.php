@extends('adminlte::page')

@section('title', 'Editar empleado')

@section('content_header')
    <h1 class="display-1 text-center mb-1" > Farmacia: {{ session('pharmacy')?->name }} </h1>
@stop

@section('content')
    @if (!$subsidiaries->isEmpty())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h5 class="display-5 mb-3" >Editar un empleado</h5>
                    <form action=" {{route('employeer.update', $employeer)}} " method="post"> 
                        @csrf
                        @method('PATCH')
                    
                        <div class="form-group form-control-lg mb-5">
                            <label for="name" class="control-label" >Ingresa el nombre: </label>
                            <input type="text" name="name" id="name" 
                                class="form-control"
                                value="{{ old('name', $employeer->name) }}" 
                                placeholder="Ingresa aquí el nombre" 
                            >
                            @error('name')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="surname" class="control-label" >Ingresa el apellido: </label>
                            <input type="text" name="surname" id="surname" 
                                class="form-control"
                                value="{{ old('surname', $employeer->surname) }}" 
                                placeholder="Ingresa aquí el apellido" 
                            >
                            @error('surname')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="CI" class="control-label" >Ingresa el n° de cédula: </label>
                            <input type="number" name="CI" id="CI" 
                                class="form-control"
                                value="{{ old('CI', $employeer->CI) }}" 
                                placeholder="Ingresa aquí el número de cedula" 
                            >
                            @error('CI')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="date_birth" class="control-label" >Ingresa la fecha de nacimiento </label>
                            <input type="date" name="date_birth" id="date_birth" 
                                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                class="form-control"
                                value="{{ old('date_birth', $employeer->date_birth) }}" 
                                {{-- placeholder="Ingresa aquí el número de cedula"  --}}
                            >
                            @error('date_birth')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="salary" class="control-label" >Ingresa el salario: </label>
                            <input type="number" step="0.00001" name="salary" id="salary" 
                                class="form-control"
                                value="{{ old('salary', $employeer->salary) }}" 
                                placeholder="Ingresa aquí el salario" 
                            >
                            @error('salary')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="subsidiary" class="mr-3">Selecciona una sucursal: </label>
                            <select class="input-group mb-3" name= "subsidiary" id="subsidiary">
                                <option value=""></option>
                                @foreach ($subsidiaries as $subsidiary)
                                    <option 
                                        value=" {{$subsidiary->id}} "
                                        {{$subsidiary->id === $employeer->subsidiary_id ? 'selected' : ''}}
                                    > 
                                        {{ $subsidiary->name }} 
                                    </option>
                                @endforeach
                            </select>
                            @error('subsidiary')
                            <div class="d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small> 
                            </div>  
                        @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="type_category" class="mr-3">Selecciona un tipo de categoría: </label>
                            <select class="input-group mb-3" name= "type_category" id="type_category">
                                <option value=""></option>
                                
                                <option 
                                    value="administrative" 
                                    {{"administrative" === $employeer->category ? 'selected' : ''}}
                                >
                                    Administrativo
                                </option>

                                <option 
                                    value="auxiliaryPharmacy"
                                    {{"auxiliaryPharmacy" === $employeer->category ? 'selected' : ''}}
                                >
                                    Auxiliar de farmacia
                                </option>

                                <option 
                                    value="Analyst"        
                                    {{"Analyst" === $employeer->category ? 'selected' : ''}}                 
                                >
                                    Analista
                                </option>
                            </select>
                            @error('type_category')
                            {{-- <div class="form-group form-control-lg"> --}}
                                <div class="d-block">
                                    <small style="color: red">
                                        <p class="mb-5">{{ $message }}</p>
                                    </small>  
                                </div> 
                            {{-- </div>   --}}
                            @enderror
                        </div>                       
        
                        <div class="form-group form-control-lg mb-3" >
                            <button 
                                href=" {{route('employeer.store')}} " 
                                class="btn btn-primary mt-4 mb-2 btn-block" 
                                role="button" 
                            >
                                Editar
                            </button>
                        </div>
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