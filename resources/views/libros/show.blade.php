@extends('admin-lte.index')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#detalleLibro" data-toggle="tab">Detalle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#partes" data-toggle="tab">Estado</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="detalleLibro">

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">LIBRO</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Numero de serie</dt>
                            <dd class="col-sm-8 text-muted">{{ $libro->numero_serie }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Nombre</dt>
                            <dd class="col-sm-8 text-muted">{{ $libro->nombre }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Edicion</dt>
                            <dd class="col-sm-8 text-muted">{{ $libro->edicion }} Edicion</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Genero</dt>
                            <dd class="col-sm-8 text-muted">{{$libro->generolibro->genero_libros}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Autor</dt>
                            <dd class="col-sm-8 text-muted">{{$libro->autor->nombre_autor}} {{$libro->autor->apellido_autor}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Editorial</dt>
                            <dd class="col-sm-8 text-muted">{{$libro->editorial->nombre_editorial}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Tipo de libro</dt>
                            <dd class="col-sm-8 text-muted">{{$libro->tipo_libro->nombre_tipo}}</dd>
                        </dl>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="estado">

                        <div class="table-responsive">
                            <table id="datatable"
                                class="table table-head-fixed text-nowrap table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="callout" style="border-left-color: #3c8dbc;">
                            <h5>asd</h5>

                            <p>Aun trabajando de en ello</p>
                        </div>
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