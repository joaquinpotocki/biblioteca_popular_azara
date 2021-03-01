@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" enctype="multipart/form-data" action="{{route("movimientos.update",$movimiento->id)}}" >
    @csrf
    @method("PUT")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h5>
                            Devolucion
                        </h5>
                    </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="detalleLibro">
                            <div class="text-muted" style="font-family: 'Open Sans', serif;">INFORMACION DE PRESTAMO</div>
                            <hr style="margin-bottom: 1%; margin-top: 0%">
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Fecha de prestamo</dt>
                                <dd class="col-sm-8 text-muted">{{ $movimiento->fecha_prestamo }}</dd>
                            </dl>
                             
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Fecha de devolucion estipulada</dt>
                                <dd class="col-sm-8 text-muted">{{$movimiento->fecha_devolucion}}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Lector Prestamo</dt>
                                <dd class="col-sm-8 text-muted" name="lector_id">{{$movimiento->lector->nombres}} {{$movimiento->lector->apellidos}}</dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Libro Prestamo</dt>
                                <dd class="col-sm-8 text-muted"><td>
                                    @foreach ($movimiento->libro as $p)
                                        <span class="badge badge-pill">
                                            {{$p->nombre}} - {{$p->editoriales->nombre_editorial}} - {{$p->edicion}}
                                        </span>
                                    @endforeach
                                </td></dd>
                            </dl>
                            <dl class="row" style="margin-left: 1%">
                                <dt class="col-sm-3">Cantidad Prestamo</dt>
                                <dd class="col-sm-8 text-muted">{{$movimiento->cantidad}}</dd>
                            </dl>
                            <input type="hidden" name="lector_id" value="{{$movimiento->lector->id}}">
                            
                            {{-- <input type="text" name="libros_select_id" value="{{$movimiento->libro->id}}"> --}}
                            {{-- <select class="form-control" name="lector_id"   >
                                <option value="" disabled selected>--Seleccione un lector por favor--</option>
                                @foreach($lectores as $lector)
                                <option value="{{$lector->id}}" @if(old('lector_id')==$lector->id) selected
                                    @endif>{{$lector->id}}</option> 
                                @endforeach
                            </select> --}}
                            {{-- <select name="lector_id" >
                                <option value="" disabled selected>--Seleccione un lector--</option>
                                
                                @foreach($lectores as $lector)
                                <option value="{{$lector->id}}" @if($lector != null)
                                    @if($lector->id==$lector->id) selected
                                    @endif @endif>{{$lector->id}}</option>
                                @endforeach
                            </select> --}}
                                
                            @foreach($movimiento->libro as $libro)
                                <input type="hidden" name="libros_select_id"  value="{{$libro->id}}">
                            @endforeach
                        </div>
                    </div>

                    <!-- /.tab-content -->
                    <div class="card">
                        <div class="card-header">
                            <div class="text-muted" style="font-family: 'Open Sans', serif;">DATOS</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="nav-item fas fa-filter" width="" height=""></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group ">
                                        <label for="" class="">Fecha de Devolucion </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                {{-- <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span> --}}
                                            </div>
                                            <input type="date" name="fecha_devolucion_real" class="form-control" required
                                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group ">
                                        <label for="estado_devolucions" class="">Estado de Devolucion</label>
                                        
                
                                        <select class="form-control" name="estado_devolucion_id" id="estado_devolucion_id" required>
                                            <option value="" disabled selected>--Seleccione un estado por favor--</option>
                                            @foreach($estado_devolucions as $estado)
                                            <option value="{{$estado->id}}" @if(old('estado_id')==$estado->id) selected
                                                @endif>{{$estado->nombre}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="">
                                    <div class="float-right">
                                        <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                                        <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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