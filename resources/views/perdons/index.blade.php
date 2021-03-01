@extends('admin-lte.index')

@section('content')
<div class="card">
    
</div>

<div class="card">
    <div class="card-header">Tabla de Perdonados  
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('perdons.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <div class="row d-flex ">
            
        </div>
        {{-- <a class="btn btn-primary btn-sm" href="{{route('ingreso.pdf') }}">Pdf</a> --}}
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Fecha de Perdon</th>
                    <th scope="col">Lector Perdonado</th>
                    <th scope="col">Razon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perdon as $p)
                <tr>
                    <td>{{$p->getFechaPerdon()}}</td>
                    <td>{{$p->lector->nombres}} {{$p->lector->apellidos}}</td>
                    <td>{{$p->descripcion}}</td>

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
{{-- 
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
</script> --}}
{{-- Script para eliminar --}}
{{-- <script>
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
</script> --}}
@endpush