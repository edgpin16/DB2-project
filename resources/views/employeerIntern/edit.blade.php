@extends('adminlte::page')

@section('title', 'Editar empleado farmaceútico')

@section('content_header')
    <h1 class="display-1 text-center mb-1" > Farmacia: {{ session('pharmacy')?->name }} </h1>
@stop

@section('content')
    @if (!$subsidiaries->isEmpty())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h5 class="display-5 mb-3" >Editar un empleado farmaceútico</h5>
                    <form action=" {{route('employeerIntern.update', $employeer)}} " method="post"> 
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
                                <option value="">Selecciona una opción</option>
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
                                <option value="">Selecciona una opción</option>
                                
                                <option 
                                    value="intern"        
                                    selected                
                                >
                                    Pasante
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
                        
                        <div class="form-group form-control-lg mb-5">
                            <label for="university" class="control-label" >Ingresa la universidad: </label>
                            <input type="text" name="university" id="university" 
                                class="form-control"
                                value="{{ old('university', $employeer->intern->university) }}" 
                                placeholder="Ingresa aquí la universidad" 
                            >
                            @error('university')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="specialty" class="control-label" >Ingresa la especialidad: </label>
                            <input type="text" name="specialty" id="specialty" 
                                class="form-control"
                                value="{{ old('specialty', $employeer->intern->specialty) }}" 
                                placeholder="Ingresa aquí la especialidad" 
                            >
                            @error('specialty')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="start_internship" class="control-label" >Fecha de inicio de la pasantía </label>
                            <input type="date" name="start_internship" id="start_internship" 
                                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                class="form-control"
                                value="{{ old('start_internship', $employeer->intern->start_internship) }}" 
                                {{-- placeholder="Ingresa aquí el número de cedula"  --}}
                            >
                            @error('start_internship')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="end_internship" class="control-label" >Fecha de culminación de la pasantía </label>
                            <input type="date" name="end_internship" id="end_internship" 
                                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                class="form-control"
                                value="{{ old('end_internship', $employeer->intern->end_internship) }}" 
                                {{-- placeholder="Ingresa aquí el número de cedula"  --}}
                            >
                            @error('end_internship')
                                <div class="mb-5 d-block">
                                    <small style="color: red">
                                        <p>{{ $message }}</p>
                                    </small>  
                                </div>                       
                            @enderror
                        </div>

                        <div class="form-group form-control-lg mb-5">
                            <label for="continue_working" class="mr-3">continuará laborando? : </label>
                            <select class="input-group mb-3" name= "continue_working" id="continue_working">
                                <option value="">Selecciona una opción</option>
                                
                                <option 
                                    value = 0
                                    {{ $employeer->intern->continue_working === 0 ? 'selected' : ''}}
                                >
                                    NO
                                </option>

                                <option 
                                    value = 1
                                    {{ $employeer->intern->continue_working === 1 ? 'selected' : ''}}
                                >
                                    SI
                                </option>

                            </select>
                            @error('continue_working')
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
                                {{-- href=" {{route('employeerPharmaceutist.update')}} "  --}}
                                class="btn btn-primary mt-4 mb-2 btn-block" 
                                role="button" 
                            >
                                Actualizar
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