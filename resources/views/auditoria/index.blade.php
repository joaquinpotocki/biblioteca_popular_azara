@extends('admin-lte.index')

@section('content')

<div class="card">
    


</div>

<div class="card">
    <div class="card-header">
        <h3>Auditoria
            
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