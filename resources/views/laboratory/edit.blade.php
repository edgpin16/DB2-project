@extends('adminlte::page')

@section('title', 'Editar datos del laboratorio')

@section('content_header')
    <h1 class="display-1 text-center"> Laboratorio: {{ $laboratory->name }} </h1>
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h5 class="display-5 mb-3" >Editar datos del laboratorio</h5>
            <form action=" {{route('laboratory.update', $laboratory)}} " method="post"> 
                @csrf
                @method('PATCH')
            
                <div class="form-group form-control-lg mb-5">
                    <label for="name" class="control-label" >Ingresa el nombre del laboratorio: </label>
                    <input type="text" name="name" id="name" 
                        class="form-control"
                        value="{{ old('name', $laboratory->name) }}" 
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
                    <label for="country" class="control-label" >Ingresa el país: </label>
                    <input type="text" name="country" id="country" 
                        class="form-control"
                        value="{{ old('country', $laboratory->country) }}" 
                        placeholder="Ingresa aquí el país" 
                    >
                    @error('country')
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
                        value="{{ old('province', $laboratory->province) }}" 
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

                <div class="form-group form-control-lg mb-5">
                    <label for="city" class="control-label" >Ingresa la ciudad: </label>
                    <input type="text" name="city" id="city" 
                        class="form-control"
                        value="{{ old('city', $laboratory->city) }}" 
                        placeholder="Ingresa aquí el nombre" 
                    >
                    @error('city')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <div class="form-group form-control-lg mb-3" >
                    <button 
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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop