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
                            <dt class="col-sm-3">Fecha Baja</dt>
                            <dd class="col-sm-8 text-muted">{{\Carbon\Carbon::create($baja_libro->fecha_baja)->format('d/m/Y')}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Libro relacionado a la baja</dt>
                            
                            <dd class="col-sm-8 text-muted"> <p>ISBN: {{$baja_libro->libro->numero_serie}}</p>  <p>Titulo: {{$baja_libro->libro->nombre}} </p> <p>Edicion: {{$baja_libro->libro->edicion}} </p> <p>Editorial: {{$baja_libro->libro->editoriales->nombre_editorial}}  </p>  </dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Cantidad</dt>
                            <dd class="col-sm-8 text-muted">{{$baja_libro->cantidad}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Tipo de baja</dt>
                            <dd class="col-sm-8 text-muted">{{$baja_libro->tipo_bajas->nombre_baja}}</dd>
                        </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Lector responsable</dt>
                                @if ($baja_libro->lector_id == null)
                                    <dd class="col-sm-8 text-muted">No tiene un lector relacionado</dd>
                                @else
                                    <dd class="col-sm-8 text-muted">{{$baja_libro->lector->nombres}} {{$baja_libro->lector->apellidos}}</dd>
                                @endif
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