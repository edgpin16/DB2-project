@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                @if ( !$subsidiaries->isEmpty() )
                    @if ( !$laboratories->isEmpty() )
                        <form action=" {{ route('order.getData') }} " method="get">
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
                                <label for="laboratory" class="mr-3">Selecciona un laboratorio: </label>
                                <select class="input-group mb-3" name= "laboratory" id="laboratory">
                                    <option value=""></option>
                                    @foreach ($laboratories as $laboratory)
                                        <option value=" {{$laboratory->id}} "> {{ $laboratory->name }} </option>
                                    @endforeach
                                </select>
                                @error('laboratory')
                                <div class="form-group form-control-lg">
                                    <div class="d-block">
                                        <small style="color: red">
                                            <p>{{ $message }}</p>
                                        </small>  
                                    </div> 
                                </div>  
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <label for="payment_type" class="mr-3">Selecciona un tipo de pago: </label>
                                <select class="input-group mb-3" name= "payment_type" id="payment_type">
                                    <option value=""></option>
                                    <option value="decontado">Decontado</option>
                                    <option value="credito">Crédito</option>
                                </select>
                                @error('payment_type')
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
                    @else
                        <p>No hay ningún laboratorio registrado en la BD, debes esperar a que se registre uno :(</p>
                    @endif
                @else
                    <p>No posees ninguna sucursal :( </p>
                    <a href="{{ route('subsidiary.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar una</a>
                @endif
            </div> {{-- end div col-auto --}}
        </div> {{-- end div row justify-content-center --}}
    </div> {{-- end div container --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop