@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-title">
            Filtros
        </div>

        <div class="card-tools">
            <button type="button" class="btn btn-tool  " data-card-widget="collapse">
                <i class="nav-item fas fa-filter" width="" height=""></i>
            </button>
        </div>
    </div>
    <div class="card-body collapse">
        {{-- <form class="form-group " method="GET" action="{{route('auditoria.pdf')}}"> --}}

            <div class="row d-flex justify-content-around">
                <div class=" col-sm-2">
                    <label for="">Tabla</label>
                    <select name="tabla" id="tabla" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        <option value="1">PRESTAMOS</option>
                        <option value="2">LIBROS</option>
                        <option value="3">INGRESOS</option>
                        <option value="4">BAJAS</option>

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
{{-- Empiezaaaa ##############################################33 --}}
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

<script>
    $(document).ready(function() {
    var table = $('#auditorias').DataTable();
    $('#limpiar').click(function(){
        $("#tabla ").prop("selectedIndex", 0) ;
        $("#user ").prop("selectedIndex", 0) ;
        $('input[type=date]').val('');
        $.fn.dataTable.ext.search.pop(
            function( settings, data, dataIndex ) {
                if(1){
                    return true ;
                }
                return false ;
            }
        );
        table.draw() ;
    }) ;
    $('#filtrar').click(function(){
        var fec1 =  $('#min').val() ;
        var fec2 =  $('#max').val() ;
        var filtro1 = $('#tabla').val() ;
        var filtro2 = $('#user').val() ;
        $.fn.dataTable.ext.search.pop(
            function( settings, data, dataIndex ) {
                if(1){
                    return true ;
                }
                return false ;
            }
        );
        table.draw() ;
        if(filtro1 != null){
            var tabla = $('#tabla option:selected').text() ;
        }
        if(filtro2 != null){
            var user = $('#user option:selected').text() ;
        }
        if((fec1 != "") && (fec2 != "")){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                var min = moment(fec1) ;
                var max = moment(fec2) ;
                var d = data[3]
                var datearray = d.split("/");
                var newdate =   datearray[2] + '/'+ datearray[1] + '/' + datearray[0] ;
                var s = new Date(newdate)
                var startDate = moment(s)
                if(filtro1 == null && filtro2 == null){
                    if  (
                            ( min == "" || max == "" ) ||
                            (
                                (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) )
                            )
                        )
                    {
                        return true ;
                    }else{
                        return false;
                    }
                }else if(filtro1 != null && filtro2 != null){
                    if  (
                            ( min == "" || max == "" ) ||
                            (
                                (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                (tabla == data[1]) &&
                                (user == data[5])
                            )
                        )
                    {
                        return true ;
                    }else{
                        return false;
                    }
                }else if(filtro1 != null && filtro2 == null){
                    if  (
                            ( min == "" || max == "" ) ||
                            (
                                (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                (tabla == data[1])
                            )
                        )
                    {
                        return true ;
                    }else{
                        return false;
                    }
                } else if(filtro1 == null && filtro2 != null){
                    if  (
                            ( min == "" || max == "" ) ||
                            (
                                (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                (user == data[5])
                            )
                        )
                    {
                        return true ;
                    }else{
                        return false;
                    }
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else if(filtro1 != null && filtro2 == null){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                if  ( tabla == data[1]){
                    return true ;
                }else{
                    return false;
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else if(filtro1 == null && filtro2 != null){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                if (user == data[5]) {
                    return true ;
                }else{
                    return false;
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else if(filtro1 != null && filtro2 != null){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                if(user == data[5] && tabla == data[1]){
                    return true ;
                } else{
                    return false ;
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else{
            swal({
            title: "Alerta",
            text: "Seleccione opciones de filtrado!",
            });
        }
    }) ;
} );
</script>
@endpush