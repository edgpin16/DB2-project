@extends('adminlte::page')

@section('title', 'Ver empleados')

@section('content_header')
    <h1 class="text-center" >Farmacia: {{ session('pharmacy')->name }} </h1>
    <h2 class="text-center">Sucursal: {{$nameSubsidiary}} </h2>
@stop

@section('content')
        <div class="d-flex justify-content-between">
            {{-- {{ ddd($employeers) }} --}}
            @forelse ($employeers as $employeer)
                <div class="row w-75">
                    <div class="card mr-5">
                        <div class="card-body">
                            <p class="card-text" > Nombre: {{ $employeer->name }} </p>
                            <p class="card-text" > Apellido: {{ $employeer->surname }} </p>
                            <p class="card-text" > CI: {{ $employeer->CI }} </p>
                            <p class="card-text" > Fecha de nacimiento: {{ $employeer->date_birth }} </p>
                            <p class="card-text" > Salario: {{ $employeer->salary }} </p>

                            @if ($employeer->category === 'pharmaceutist')
                                <p class="card-text" > Categoría: Farmaceútico </p>
                            @endif
                            <p class="card-text" > N° de permiso sanitario: {{ $employeer->pharmaceutist->sanitary_permise_number }} </p>
                            <p class="card-text" > N° de colegiatura: {{ $employeer->pharmaceutist->schooling_number }} </p>

                            <h3 class="card-text text-center mb-3"> Datos del título: </h3>
                            <p class="card-text" > N° de registro: {{ $employeer->pharmaceutistCertificate->registry_number }} </p>
                            <p class="card-text" > Universidad: {{ $employeer->pharmaceutistCertificate->university }} </p>
                            <p class="card-text" > Fecha de registro: {{ $employeer->pharmaceutistCertificate->date_registration }} </p>

                            <a href=" {{ route('employeerPharmaceutist.edit', $employeer) }} " class="btn btn-primary mb-2 btn-block" role="button" >Editar</a>

                            <form method="post" action=" {{route('employeerPharmaceutist.destroy', $employeer)}} ">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary mb-2 btn-block" >Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posees ningun empleado en esta sucursal, por lo menos de esta categoría.... :( Debes agregar uno!!</p>
                <a href=" {{route('home')}} " class="btn btn-primary mb-2 btn-lg" role="button" >Ir al home</a>
            @endforelse
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop