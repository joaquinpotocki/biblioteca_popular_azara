@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-title">
            Filtros
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fal fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form class="form-group " method="GET" action="#">

            <div class="row d-flex justify-content-around">
                <div class=" col-sm-2">
                    <label for="">Tabla</label>
                    <select name="tabla" id="tabla" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        <option value="1">PRESTAMOS</option>
                        <option value="2">INGRESOS</option>
                        <option value="3">BAJAS</option>
                        <option value="4">LIBROS</option>

                    </select>
                </div>
                <div class=" col-sm-2">
                    <label for="">Usuario</label>
                    <select name="empleado_id" id="user" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->apellido}} {{$user->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Desde</label>
                        <input type="date" id="min" name="fecha1" value="" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Hasta</label>
                        <input type="date" id="max" name="fecha2" value="" class="form-control">
                    </div>
                </div>


                {{-- <div class="col-md-1">
                <button type="submit" class="btn btn-xs btn-danger ">Generar <i class="fa fa-file-pdf"></i></button>
            </div> --}}
            </div>

            <div class="row d-flex justify-content-center">
                <button type="button" class="btn btn-secondary btn-xs mr-1" id="limpiar">Limpiar <i
                        class="fas fa-redo "></i></button>
                <button type="button" class="btn btn-primary btn-xs" id="filtrar">Filtrar <i
                        class="fas fa-filter "></i></button>

            </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3>Auditoria
            <button type="submit" class="btn btn-xs btn-danger ">Generar <i class="fa fa-file-pdf"></i></button>
        </h3>
        @csrf
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive table-sm">
            <table id="auditorias" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Tabla</th>
                        <th>Operacion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditoriasPrestamos as $auditoria)
                    <tr>
                        <td>{{$auditoria->auditable_id}}</td>
                        <td>PRESTAMOS</td>
                        <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                        <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                        <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                        <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>

                        <td width="150px" class="text-center">
                            <a href="{{ route('auditoria.showPrestamo', ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                class="btn btn-xs btn-primary">Ver
                                mas</a>

                        </td>
                    </tr>

                    @endforeach
                    @foreach($auditoriasBajas as $auditoria)
                    <tr>
                        <td>{{$auditoria->auditable_id}}</td>
                        <td>BAJAS</td>
                        <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                        <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                        <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                        <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                        <td width="150px" class="text-center">
                            <a href="{{route('auditoria.showBaja' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                class="btn btn-xs btn-primary">Ver
                                mas</a>

                        </td>
                    </tr>

                    @endforeach
                    @foreach($auditoriasIngresos as $auditoria)
                    <tr>
                        <td>{{$auditoria->auditable_id}}</td>
                        <td>INGRESOS</td>
                        <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                        <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                        <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                        <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                        <td width="150px" class="text-center">
                            <a href="{{route('auditoria.showIngreso' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                class="btn btn-xs btn-primary">Ver
                                mas</a>

                        </td>
                    </tr>

                    @endforeach
                    @foreach($auditoriasLibros as $auditoria)
                    <tr>
                        <td>{{$auditoria->auditable_id}}</td>
                        <td>LIBROS</td>
                        <td style="text-transform:uppercase">{{$auditoria->event}}</td>
                        <td>{{$auditoria->created_at->format('d/m/Y')}}</td>
                        <td>{{$auditoria->created_at->format('H:i:s')}}</td>
                        <td>{{$auditoria->user->apellido}} {{$auditoria->user->name}}</td>
                        <td width="150px" class="text-center">
                            <a href="{{route('auditoria.showLibro' , ['auditoria' => $auditoria->auditable_id, 'id' => $auditoria->id])}}"
                                class="btn btn-xs btn-primary">Ver
                                mas</a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
          $('#auditorias').DataTable({
            "order": [[ 3, "desc" ] , [4 , 'desc']] ,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
          });
        });
</script>

<script>
    @if(session('confirmar'))
        Confirmar.fire() ;
    @elseif(session('cancelar'))
        Cancelar.fire();
    @elseif(session('borrado'))
        Borrado.fire();
    @endif
</script>

@endpush