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

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">Ingreso Libro</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Fecha Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->getFechaIngreso() }}</dd>
                        </dl>
                        
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Proveedor Responsable</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->proveedor->cuit}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Libro Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->libro->numero_serie}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Editorial Libro Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->libro->editoriales->nombre_editorial}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Edicion Libro Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->libro->edicion}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Cantidad Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->cantidad}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Tipo Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->tipo_ingresos->nombre_ingreso}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Descripcion Tipo Ingreso</dt>
                            <dd class="col-sm-8 text-muted">{{ $ingreso_libro->tipo_ingresos->descripcion}}</dd>
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