@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">

            <h1 class="display-5">Bienvenidos al sistema administrativo de farmacias y laboratorios</h1>
            <h2 class="text-center display-4">Instalador</h2>

            @if ( session()->get('error') )
                <div class="form-group form-control-lg mb-5">
                    <div class="mb-5 d-block">
                        <p> <b style="color: red">No se pudo conectar a la BD :(.</b> Verifica que esten CORRECTOS los datos, y que esten instalados los drivers necesarios</p>
                        <small style="color: red">
                            <p class="mb-5">Mensaje de error: {{ session()->get('error') }}</p>
                        </small>  
                    </div> 
                </div> 
            @endif

            <form method="POST" action=" {{route('installer.validateData')}} " > 
                @csrf
                <div class="input-group mt-5 mb-3">
                    <label for="SGBD" class="mr-3">Selecciona un gestor de bases de datos: </label>
                    <select class="input-group mb-3" name= "SGBD" id="SGBD">
                        <option value=""></option>
                        <option value="sqlite">SQLITE</option>
                        <option value="mysql">MYSQL</option>
                        <option value="pgsql">PGSQL</option>
                        <option value="sqlsrv">SQLSRV</option>
                    </select>
                </div>

                @error('SGBD')
                    <div class="form-group form-control-lg mb-5">
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div> 
                    </div>  
                @enderror

                <div class="form-group form-control-lg mb-5">
                    <label for="host" class="control-label" >Ingresa el número del HOST: </label>
                    <input type="text" name="host" id="host" 
                        class="form-control"
                        value="{{ old('host') }}" 
                        placeholder="Ingresa aquí el HOST, ej: 127.0.0.1" 
                    >
                    @error('host')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <div class="form-group form-control-lg mb-5">
                    <label for="port" class="control-label" >Ingresa el número del puerto (PORT): </label>
                    <input type="text" name="port" id="port" 
                        class="form-control"
                        value="{{ old('port') }}" 
                        placeholder="Ingresa aquí el PORT, ej: 3306" 
                    >
                    @error('port')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <div class="form-group form-control-lg mb-5">
                    <label for="databaseName" class="control-label" >Ingresa el nombre EXACTO de la BD a conectar: </label>
                    <input type="text" name="databaseName" id="databaseName" 
                        class="form-control"
                        value="{{ old('databaseName') }}" 
                        placeholder="Ingresa aquí el nombre de la BD" 
                    >
                    @error('databaseName')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <div class="form-group form-control-lg mb-5">
                    <label for="DBUser" class="control-label" >Ingresa el usuario EXACTO de la BD a conectar: </label>
                    <input type="text" name="DBUser" id="DBUser" 
                        class="form-control"
                        value="{{ old('DBUser') }}" 
                        placeholder="Ingresa aquí el usuario de la BD, ej:root" 
                    >
                    @error('DBUser')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <div class="form-group form-control-lg mb-5">
                    <label for="DBPassword" class="control-label" >Ingresa la contraseña para acceder a la BD: </label>
                    <input type="text" name="DBPassword" id="DBPassword" 
                        class="form-control"
                        value="{{ old('DBPassword') }}" 
                        placeholder="Ingresa aquí la contraseña para acceder a la BD, coloca 0 si no posee contraseña" 
                    >
                    @error('DBPassword')
                        <div class="mb-5 d-block">
                            <small style="color: red">
                                <p>{{ $message }}</p>
                            </small>  
                        </div>                       
                    @enderror
                </div>

                <button class="btn btn-primary mb-2 btn-block" type="submit">Instalar</button>
                <b>Al instalar, se ejecutarán las migraciones con los seeders. Puede tardar un poco, sea paciente :), y solo de click UNA VEZ.</b>
            </form>
                
        </div> {{-- end div col-auto --}}
    </div> {{-- end div row justify-content-center --}}
</div> {{-- end div container --}}
@endsection