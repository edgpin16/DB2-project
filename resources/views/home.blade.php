@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @if ($pharmacy)
        <h1 class="display-1 text-center"> Farmacia: {{ $pharmacy->name }} </h1>
    @elseif ($laboratory)
        <h1 class="display-1 text-center"> Laboratorio: {{ $laboratory->name }} </h1>
    @endif
@stop

@section('content')

    @if ($pharmacy)
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$totalSubsidiaries}}</h3>
                      <p>Sucursales</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-fw fa-hospital-alt"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                  </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$totalEmployeers}}</h3>
                      <p>Empleados</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-fw fa-users"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                  </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$totalOrders}}</h3>
                      <p>Pedidos</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                  </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$totalSubsidiaryStocks}}</h3>
                      <p>Medicinas en stock</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-fw fa-warehouse"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                  </div>
            </div>
        </div> {{--END div row--}}
    @elseif ($laboratory)
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$totalMedicines}}</h3>
                      <p>Total de medicinas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-fw fa-pills"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                  </div>
            </div>
        </div> {{--END div row--}}
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
