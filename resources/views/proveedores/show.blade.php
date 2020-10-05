@extends('admin-lte.index')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#detalleProveedor" data-toggle="tab">Detalle</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="detalleProveedor">

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">PROVEEDOR</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Cuit</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->cuit }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Empresa</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->empresa }}</dd>
                        </dl>
                        
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Nombre persona contacto</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->nombre_persona_contacto }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Apellido persona contacto</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->apellido_persona_contacto }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Telefono empresarial</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->telefono }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-8 text-muted">{{ $proveedor->email }}</dd>
                        </dl>
                        
                        <div class="text-muted" style="font-family: 'Open Sans', serif;">DIRECCION </div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">

                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Direccio postal</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion_postal }}</dd>
                            </dl>    
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Pais</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion->pais->pais }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Provincia</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion->provincia->provincia }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Localidad</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion->localidad->localidad }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Calle</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion->calle }}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Altura</dt>
                                <dd class="col-sm-8 text-muted">{{ $proveedor->direccion->altura}}</dd>
                            </dl>
                            
                        </dl>

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">EDITORIALES CON LAS QUE TRABAJA</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Editoriales</dt>
                            <dd class="col-sm-8 text-muted">
                                @foreach ($proveedor->editoriales as $p)
                                <span class="badge badge-pill">
                                    {{$p->nombre_editorial}}
                                </span>
                                @endforeach
                            </dd>
                        </dl>

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">NOTAS GENERALES SOBRE ESTE PROVEEDOR</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dd class="col-sm-8 text-muted">{{ $proveedor->notas_generales }}</dd>
                        </dl>
                    </div>
                    <!-- /.tab-pane -->
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