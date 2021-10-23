@extends('adminlte::page')

@section('title', 'Crear medicina')

@section('content_header')
    <h1 class="text-center" >Crear un medicamento </h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <form action=" {{route('medicine.store')}} " method="post">
                    @csrf

                    <div class="form-group form-control-lg mb-5">
                        <label for="serial_number" class="control-label" >Ingresa el número de serial: </label>
                        <input type="text" name="serial_number" id="serial_number" 
                            class="form-control"
                            placeholder="Ingresa aquí el número de serial" 
                            value="{{old('serial_number')}}"
                        >
                        @error('serial_number')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>

                    <div class="form-group form-control-lg mb-5">
                        <label for="name_medicine" class="control-label" >Ingresa el nombre de la medicina: </label>
                        <input type="text" name="name_medicine" id="name_medicine" 
                            class="form-control"
                            placeholder="Ingresa aquí el nombre de la medicina" 
                            value="{{old('name_medicine')}}"
                        >
                        @error('name_medicine')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>
    
                    <div class="form-group form-control-lg mb-5">
                        <label for="presentation" class="control-label" >Ingresa la presentación: </label>
                        <input type="text" name="presentation" id="presentation" 
                            class="form-control"
                            placeholder="Ingresa aquí la presentación" 
                            value="{{ old('presentation') }}" 
                        >
                        @error('presentation')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>

                    <div class="form-group form-control-lg mb-5">
                        <label for="main_component" class="control-label" >Ingresa el componente principal: </label>
                        <input type="text" name="main_component" id="main_component" 
                            class="form-control"
                            placeholder="Ingresa el componente principal" 
                            value="{{ old('main_component') }}" 
                        >
                        @error('main_component')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>

                    <div class="form-group form-control-lg mb-5">
                        <label for="therapeutic_action" class="control-label" >Ingresa la acción terapeútica: </label>
                        <input type="text" name="therapeutic_action" id="therapeutic_action" 
                            class="form-control"
                            placeholder="Ingresa aquí la acción terapeútica" 
                            value="{{ old('therapeutic_action') }}" 
                        >
                        @error('therapeutic_action')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>

                    <div class="form-group form-control-lg mb-5">
                        <label for="price" class="control-label" >Ingresa el precio: </label>
                        <input type="number" step="0.00001" name="price" id="price" 
                            class="form-control"
                            value="{{ old('price') }}" 
                            placeholder="Ingresa aquí el precio" 
                        >
                        @error('price')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>
    
                    <div class="form-group form-control-lg mb-3" >
                        <button 
                            class="btn btn-primary mb-2 btn-block" 
                            role="button" 
                        >
                            Crear
                        </button>
                    </div>
                </form>
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