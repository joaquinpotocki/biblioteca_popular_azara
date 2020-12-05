@extends('admin-lte.index')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Filtros
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="nav-item fas fa-filter" width="" height=""></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form class="form-group " method="GET" action="{{route('ingreso.pdf')}}">
        <div class="row d-flex justify-content-around">

                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="">Desde</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha1" id="min" class="form-control" 
                                
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>
                
                <div class="col-2" >
                    <div class="form-group " >
                        <label for="" class="">Hasta</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    {{-- <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span> --}}
                            </div>
                            <input type="date" name="fecha2" id="max" class="form-control" 
                                
                                >
                        </div>
                            {{-- <a class="btn btn-primary btn-sm float-right text-white"  href="#" id="filtrar">Filtrar</a> --}}
                    </div>
                </div>
                
                <div class=" col-sm-4">
                    <label for="">Libro</label>
                    <select name="libro_id" id="libro" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($libros as $libro)
                        <option value="{{$libro->id}}">{{$libro->nombre}} - {{$libro->editoriales->nombre_editorial}} - {{$libro->edicion}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col-sm-3">
                    <label for="">Tipo de Ingreso</label>
                    <select name="tipo_ingreso_id" id="tipo_ingreso" class="form-control">
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($tipos_ingresos as $tipo_ingreso)
                        <option value="{{$tipo_ingreso->id}}">{{$tipo_ingreso->nombre_ingreso}}</option>
                        @endforeach
                    </select>
                </div>
                
                {{-- <div class="col-1 mt-4 pt-2" >
                </div>  --}}
                {{-- <div class="">
                    <a class="btn btn-primary btn-sm float-right text-white"  href="#" id="filtrar">Filtrar</a>   
                </div>    --}}
                    
                <div class="row d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary btn-xs mr-1" id="limpiar">Limpiar <i class="fas fa-redo "></i></button>
                    <button type="button" class="btn btn-primary btn-xs" id="filtrar">Filtrar <i
                            class="fas fa-filter "></i></button>
    
                </div>

            
        </div>
    </div>
    
</div>
<div class="card">
    <div class="card-header">Tabla de ingresos   
        <button type="submit" class="btn btn-primary btn-xs" >Pdf <i
            class=""></i></button>
        </form>
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('ingreso_libros.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <div class="row d-flex ">
            
        </div>
        {{-- <a class="btn btn-primary btn-sm" href="{{route('ingreso.pdf') }}">Pdf</a> --}}
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Libro/editorial</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Tipo de Ingreso</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingreso_libros as $ingreso_libro)
                <tr>
                    <td>{{$ingreso_libro->getFechaIngreso()}}</td>
                    <td>{{$ingreso_libro->libro->nombre}} - {{$ingreso_libro->libro->editoriales->nombre_editorial}} - {{$ingreso_libro->libro->edicion}}</td>
                    <td>{{$ingreso_libro->cantidad}}</td>
                    <td>{{$ingreso_libro->proveedor->empresa}}</td>
                    <td>{{$ingreso_libro->tipo_ingresos->nombre_ingreso}}</td>
                    <td class="text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('ingreso_libros.show', $ingreso_libro->id) }}">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div id="confirmDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmacion</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">¿Esta seguro que desea borrarlo?</h4>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- Paso el id de la materia  aborrar en materia_delete--}}
                    <button type="submit" name="ok_delete" id="ok_delete" class="btn btn-danger">SI Borrar</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO Borrar</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
{{-- <script>
    $(function () {
          $('#datatable').DataTable({
            "order": [[ 0, "desc" ]] ,
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
</script> --}}
{{-- <script>
    
</script> --}}

{{-- <script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable();
    
        $('#limpiar').click(function(){
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
        //no olvidarme de volver a poner (pop) las filas
        $.fn.dataTable.ext.search.pop(
            function( settings, data, dataIndex ) {
                if(1){
                    return true ;
                }
                return false ;
            }
        );
        table.draw();
        if((fec1 != "") && (fec2 != "")){
            
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                
                var min = moment(fec1) ;
                var max = moment(fec2) ; //moment es una libreria de js p[ara gestionar fechas
                var d = data[0]; 
                var datearray = d.split("/");
                var newdate =   datearray[2] + '/'+ datearray[1] + '/' + datearray[0] ;
                var s = new Date(newdate);
                var startDate = moment(s);
                console.log(startDate);
                
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
                  
                
            }
            $.fn.dataTable.ext.search.push( filtradoTabla );
            table.draw();
        } ;
    } );    
});
</script>  --}}

<script>
    $(document).ready(function() {
    var table = $('#datatable').DataTable();
    $('#limpiar').click(function(){
        $("#libro ").prop("selectedIndex", 0) ;
        $("#tipo_ingreso ").prop("selectedIndex", 0) ;
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
        var filtro1 = $('#libro').val() ;
        var filtro2 = $('#tipo_ingreso').val() ;
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
            var libro = $('#libro option:selected').text() ;
            console.log('aqu')
        }
        if(filtro2 != null){
            var tipo_ingreso = $('#tipo_ingreso option:selected').text() ;
        }
        if((fec1 != "") && (fec2 != "")){
            
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                console.log(fec1)
                var min = moment(fec1) ;
                var max = moment(fec2) ;
                var d = data[0]
                var datearray = d.split("/");
                var newdate =   datearray[2] + '/'+ datearray[1] + '/' + datearray[0] ;
                var s = new Date(newdate)
                var startDate = moment(s)
                console.log(min)
                console.log(max)
                console.log(startDate)
                if(filtro1 == null && filtro2 == null){
                    console.log('aqu')
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
                    console.log('entre por aca')
                    if  (
                            ( min == "" || max == "" ) ||
                            (
                                (moment(startDate).isSameOrAfter(min) && moment(startDate).isSameOrBefore(max) ) &&
                                (libro == data[1]) &&
                                (tipo_ingreso == data[4])
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
                                (libro == data[1])
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
                                (tipo_ingreso == data[4])
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
                if  ( libro == data[1]){
                    return true ;
                }else{
                    return false;
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else if(filtro1 == null && filtro2 != null){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                if (tipo_ingreso == data[4]) {
                    return true ;
                }else{
                    return false;
                }
            }
            $.fn.dataTable.ext.search.push( filtradoTabla )
            table.draw()
        }else if(filtro1 != null && filtro2 != null){
            var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex){
                if(tipo_ingreso == data[4] && libro == data[1]){
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
{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('ingreso_libros.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush