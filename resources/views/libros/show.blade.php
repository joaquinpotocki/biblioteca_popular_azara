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
                            <dd class="col-sm-8 text-muted">{{ $libro->edicion }}</dd>
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
                            <dd class="col-sm-8 text-muted">{{$libro->editoriales->nombre_editorial}}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Tipo de libro</dt>
                            <dd class="col-sm-8 text-muted">{{$libro->tipo_libro->nombre_tipo}}</dd>
                        </dl>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="partes">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-head-fixed text-nowrap table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Cantidad de ejemplares disponibles</th>
                                        <th>Cantidad de ejemplares prestados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">
                                            {{ $libro->stock_libro}}
                                        </td>
                                        <td>
                                            Aun trabajando
                                        </td>
                                    </tr
                                </tbody>
                            </table>
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