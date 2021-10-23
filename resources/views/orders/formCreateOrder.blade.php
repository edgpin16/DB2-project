@extends('adminlte::page')

@section('title', 'Ver pedidos')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
@stop

@section('content')

    <div class="d-flex flex-wrap justify-content-between">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">

                    <h3 class="card-text">DATOS DEL PEDIDO : </h3>
                    <p class="card-text" > Sucursal: {{$subsidiary->name}} </p>
                    <p class="card-text" > Laboratorio: {{$laboratory->name}} </p>
                    <p class="card-text" > Tipo de pago: {{$payment_type}} </p>

                    @if ( !$analists->isEmpty() )
                        @if ( !$medicines->isEmpty() )
                            <form action="{{route('order.store')}}" method="post">
                                @csrf

                                <input type="hidden" name="subsidiary" value="{{$subsidiary->id}}">
                                <input type="hidden" name="laboratory" value="{{$laboratory->id}}">
                                <input type="hidden" name="payment_type" value="{{$payment_type}}">

                                <div class="form-group form-control-lg mb-5">
                                    <label for="payment_date" class="control-label" >Ingresa la fecha del pago </label>
                                    <input type="date" name="payment_date" id="payment_date" 
                                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                        class="form-control"
                                        value="{{ old('payment_date', (new DateTime('now'))->format('Y-m-d')) }}" 
                                        {{ $payment_type == 'decontado' ? 'readOnly' : 'enable' }}
                                        {{-- placeholder="Ingresa aquí el número de cedula"  --}}
                                    >
                                    @error('payment_date')
                                        <div class="mb-5 d-block">
                                            <small style="color: red">
                                                <p>{{ $message }}</p>
                                            </small>  
                                        </div>                       
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <label for="analist" class="mr-3">Selecciona un analista: </label>
                                    <select class="input-group mb-3" name= "analist" id="analist">
                                        <option value=""></option>
                                        @foreach ($analists as $analist)
                                            <option value=" {{$analist->name}} {{$analist->surname}} "> {{$analist->name}}  {{$analist->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
        
                                @error('analist')
                                    <div class="form-group form-control-lg mb-5">
                                        <div class="mb-5 d-block">
                                            <small style="color: red">
                                                <p>{{ $message }}</p>
                                            </small>  
                                        </div> 
                                    </div>  
                                @enderror

                                <div class="d-flex flex-wrap justify-content-between">
                                    @foreach ($medicines as $medicine)
                                        
                                        <div class="row w-100">
                                            <div class="card mr-5">
                                                <div class="card-body">
                                                    <h5 class="card-text mb-3">Medicina n° {{$loop->iteration}} : </h5>
                                                    <p class="card-text" > N° de serial: {{ $medicine->serial_number }} </p>
                                                    <p class="card-text" > Nombre de la medicina: {{ $medicine->name_medicine }} </p>
                                                    <p class="card-text" > Presentación: {{ $medicine->presentation }} </p>
                                                    <p class="card-text" > Componente principal: {{ $medicine->main_component }} </p>
                                                    <p class="card-text" > Acción terapeútica: {{ $medicine->therapeutic_action }} </p>
                                                    <p class="card-text" > Precio por unidad: {{ $medicine->price }} </p>
                                                    <input type="checkbox" class = "form-control"     
                                                        name="medicines[]" 
                                                        id = "medicine"
                                                        value="{{$medicine->serial_number}}"
                                                        onchange = "comprobar(this, {{$medicine->serial_number}})"
                                                    >
                                                        Selecciona
                                                    <br> 
                                                    <label class="control-label" for="quantity">Ingresa una cantidad</label>
                                                    <input type="number" name="quantitys[]" 
                                                        id="{{$medicine->serial_number}}"
                                                        class="form-control"
                                                        placeholder="Ingresa aquí la cantidad" 
                                                        disabled
                                                        value="{{old('medicine[]')}}"
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                                @error('medicines')
                                    <div class="form-group form-control-lg mb-5">
                                        <div class="mb-5 d-block">
                                            <small style="color: red">
                                                <p>{{ $message }}</p>
                                            </small>  
                                        </div> 
                                    </div>  
                                @enderror

                                @error('quantitys')
                                    <div class="form-group form-control-lg mb-5">
                                        <div class="mb-5 d-block">
                                            <small style="color: red">
                                                <p>{{ $message }}</p>
                                            </small>  
                                        </div> 
                                    </div>  
                                @enderror

                                @error('quantitys.*')
                                    <div class="form-group form-control-lg mb-5">
                                        <div class="mb-5 d-block">
                                            <small style="color: red">
                                                {{-- <p>{{ $message }}</p> --}}
                                                <p> Debes ingresar la cantidad que deseas pedir </p>
                                            </small>  
                                        </div> 
                                    </div>  
                                @enderror

                                <button class="btn btn-primary mb-5 btn-block" type="submit">Crear</button>
                            </form>
                        @else
                            <p>El laboratorio que escogiste, no posee ninguna medicina en venta :( </p>
                        @endif
                    @else
                        <p>No posees ninguna analista en esta sucursal, no puedes realizar pedidos :( </p>
                        <a href="/empleado/crear/analista" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar uno</a>
                    @endif

                </div>
            </div>
        </div>

        {{-- @forelse ($products as $product)
            <div class="row w-25">
                <div class="card mr-5">
                    <div class="card-body">
                        <p class="card-text" > N° de serial: {{ $product->medicine->serial_number }} </p>
                            <p class="card-text" > Nombre de la medicina: {{ $product->medicine->name_medicine }} </p>
                            <p class="card-text" > Presentación: {{ $product->medicine->presentation }} </p>
                            <p class="card-text" > Componente principal: {{ $product->medicine->main_component }} </p>
                            <p class="card-text" > Acción terapeútica: {{ $product->medicine->therapeutic_action }} </p>
                            <p class="card-text"> Cantidad: {{$product->quantity}} </p>
                    </div>
                </div>
            </div>
        @empty
            <p>No posees ningun producto :( </p>
            <a href="{{ route('order.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar uno</a>
        @endforelse
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <a href=" {{url()->previous()}} " class="btn btn-primary mb-2" role="button" >Volver</a>
                </div>
            </div>
        </div> --}}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        console.log('Hi!'); 
        function comprobar(object, serial){  
            console.log(object, serial); 
            if (object.checked)
                document.getElementById(serial).disabled = false;
            else
                document.getElementById(serial).disabled = true;
        }
    </script>
@stop