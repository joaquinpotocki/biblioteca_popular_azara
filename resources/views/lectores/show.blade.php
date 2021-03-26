@extends('admin-lte.index')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#detalleLibro" data-toggle="tab">Detalle</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="detalleLibro">

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">Lector:  {{$lector->nombres}} {{ $lector->apellidos}}</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                            <h4>La reputacion de este lector es: 
                            @if ($lector->getreputacion($lector->reputacion) == 'MUY BUENO')
                                    <span class="badge badge-success" style="color: white; ">{{ $lector->getreputacion($lector->reputacion) }}</span>
                                @endif 
                                @if ($lector->getreputacion($lector->reputacion) == 'BUENO')
                                    <span class="badge badge-success" style="color: white; ">{{ $lector->getreputacion($lector->reputacion) }}</span>
                                @endif 
                                @if ($lector->getreputacion($lector->reputacion) == 'MEDIO')
                                    <span class="badge badge-warning" style="color: white; ">{{ $lector->getreputacion($lector->reputacion) }}</span>
                                @endif 
                                @if ($lector->getreputacion($lector->reputacion) == 'MALO')
                                    <span class="badge badge-danger" style="color: white; ">{{ $lector->getreputacion($lector->reputacion) }}</span>
                                @endif 
                                @if ($lector->getreputacion($lector->reputacion) == 'MUY MALO')
                                    <span class="badge badge-danger" style="color: white; ">{{ $lector->getreputacion($lector->reputacion) }}</span>
                                @endif 
                            </h4>

                        
                        {{-- <dd>{{$lector->getreputacion($lector->reputacion)}}</dd> --}}

                        
                        <br>
                        <br>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Numero de Lector</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->numero_lectores }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">DNI</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->cuil }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Fecha de Nacimiento</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->getFechaNacimiento() }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->email }}</dd>
                        </dl>
                        
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Sexo</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->sexo }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Telefono</dt>
                            <dd class="col-sm-8 text-muted">{{ $lector->telefono }}</dd>
                        </dl>
                        
                        <div class="text-muted" style="font-family: 'Open Sans', serif;">DIRECCION </div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
  
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Pais</dt>
                                <dd class="col-sm-8 text-muted">{{ $lector->direccion->pais->pais }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Provincia</dt>
                                <dd class="col-sm-8 text-muted">{{ $lector->direccion->provincia->provincia }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Localidad</dt>
                                <dd class="col-sm-8 text-muted">{{ $lector->direccion->localidad->localidad }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Calle</dt>
                                <dd class="col-sm-8 text-muted">{{ $lector->direccion->calle }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Altura</dt>
                                <dd class="col-sm-8 text-muted">{{ $lector->direccion->altura}}</dd>
                            </dl>
                            
                        </dl>
                        <div class="text-muted" style="font-family: 'Open Sans', serif;">Notas Particulares </div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dd class="col-sm-8 text-muted">{{ $lector->notas_particulares }}</dd>
                        </dl>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->

        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->



@endsection

@push('scripts')

@endpush