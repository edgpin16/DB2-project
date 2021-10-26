@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">

            <h1 class="display-5">Bienvenidos al sistema administrativo de farmacias y laboratorios</h1>
            <h2 class="text-center display-6">Instalador</h2>
            <h2 class="text-center display-3 mb-5">Configuración a la BD exitosa</h2>

            <form method="POST" action=" {{route('installer.doMigrations')}} " > 
                @csrf
                <button 
                    class="btn btn-primary mb-5 btn-block" 
                    type="submit"
                    {{-- onclick="handleOnClick(this)" --}}
                >
                    Realizar migraciones con los seeders
                </button>
                <small>Puede tardar un poco, sea paciente :)</small>
            </form>

            {{-- <div class="d-flex justify-content-center">
                <div class="spinner-border" style="width: 10rem; height: 10rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </div> --}}
                
        </div> {{-- end div col-auto --}}
    </div> {{-- end div row justify-content-center --}}
</div> {{-- end div container --}}
@endsection