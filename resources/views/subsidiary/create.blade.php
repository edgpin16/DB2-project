@extends('adminlte::page')

@section('title', 'Crear sucursal')

@section('content_header')
    <h1 class="display-1 text-center mb-1" > Farmacia: {{ session('pharmacy')->name }} </h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h5 class="display-5 mb-3" >Crear una nueva sucursal</h5>
                <form action=" {{route('subsidiary.store')}} " method="post">
                    @csrf
                    {{-- {{ ddd($errors) }} --}}
                    @error('slug')
                        <div class="form-group form-control-lg mb-5">
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div> 
                        </div>                      
                    @enderror

                    <div class="form-group form-control-lg mb-5">
                        <label for="name" class="control-label" >Ingresa el nombre: </label>
                        <input type="text" name="name" id="name" 
                            class="form-control"
                            value="{{ old('name') }}" 
                            placeholder="Ingresa aquí el nombre" 
                            autofocus
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
                        <label for="city" class="control-label" >Ingresa la ciudad: </label>
                        <input type="text" name="city" id="city" 
                            class="form-control"
                            value="{{ old('city') }}" 
                            placeholder="Ingresa aquí la ciudad" 
                            autofocus
                        >
                        @error('city')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>
    
                    <div class="form-group form-control-lg mb-5">
                        <label for="province" class="control-label" >Ingresa la provincia: </label>
                        <input type="text" name="province" id="province" 
                            class="form-control"
                            value="{{ old('province') }}" 
                            placeholder="Ingresa aquí la provincia" 
                        >
                        @error('province')
                            <div class="mb-5 d-block">
                                <small style="color: red">
                                    <p>{{ $message }}</p>
                                </small>  
                            </div>                       
                        @enderror
                    </div>
    
                    <div class="form-group form-control-lg mb-3" >
                        <button 
                            href=" {{route('subsidiary.store')}} " 
                            class="btn btn-primary mb-2 btn-block" 
                            role="button" 
                        >
                            Agregar
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

