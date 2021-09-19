@extends('adminlte::page')

@section('title', 'Medicinas')

@section('content_header')
    <h1 class="text-center" >Medicamentos: </h1>
@stop

@section('content')
        <div class="d-flex flex-wrap justify-content-between">
            @forelse ($medicines as $medicine)
                <div class="row w-25">
                    <div class="card mr-5">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Medicina n° {{$loop->iteration}} : </h5>
                            <p class="card-text" > N° de serial: {{ $medicine->serial_number }} </p>
                            <p class="card-text" > Nombre de la medicina: {{ $medicine->name_medicine }} </p>
                            <p class="card-text" > Presentación: {{ $medicine->presentation }} </p>
                            <p class="card-text" > Componente principal: {{ $medicine->main_component }} </p>
                            <p class="card-text" > Acción terapeútica: {{ $medicine->therapeutic_action }} </p>
                            <a href=" {{ route('medicine.edit', $medicine) }} " class="btn btn-primary mb-2 btn-block" role="button" >Editar</a>
                            <form method="POST" action=" {{route('medicine.destroy', $medicine)}} ">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary mb-2 btn-block" >Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posees ninguna medicina :( </p>
                <a href="{{ route('medicine.create') }}" class="btn btn-primary mb-2 btn-lg" role="button" >Agregar una</a>
            @endforelse
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop