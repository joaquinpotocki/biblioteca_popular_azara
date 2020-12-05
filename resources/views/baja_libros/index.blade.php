@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Tabla de bajas
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('baja_libros.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        {{-- Filtros --}}
        
        <div class="mt-1 mr-1">
            <div class="float-right">
              <button title="Desplegar filtros" data-toggle="collapse" data-target="#demo" class="btn primary bg-light"><i
                  class="fas fa-filter"></i></button>
            </div>
            <div class="ml-1">
              <div id="demo" class="collapse">
                <div class="row">
                  <div class="col-md-2">
                    <label for="desde" class="col-form-label text-md-right">Desde</label>
                    <input type="date" id="desde" class="form-control" data-inputmask-alias="datetime"
                      data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy">
                  </div>
                  <div class="col-md-2">
                    <label for="hasta" class="col-form-label text-md-right">Hasta</label>
                    <input type="date" id="hasta" class="form-control" data-inputmask-alias="datetime"
                      data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="dd/mm/yyyy">
                  </div>
                  <div class="col-md-3">
                    <label for="editoriales" class=" col-form-label text-md-right">Editoriales</label>
                    <select class="select2bs4 select2-hidden-accessible" multiple=""
                      data-placeholder="Seleccione editoriales" style="width: 100%;" aria-hidden="true" id="editoriales">
                      @foreach ($editoriales as $editorial)
                      <option value="{{$editorial->nombre_editorial}}">{{$editorial->nombre_editorial}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="tipo_bajas" class=" col-form-label text-md-right">Tipo de Baja</label>
                    <select class="select2bs4 select2-hidden-accessible" multiple=""
                      data-placeholder="Seleccione tipo_bajas" style="width: 100%;" aria-hidden="true"
                      id="tipo_bajas">
                      @foreach ($tipo_bajas as $tipo_baja)
                      <option value="{{$tipo_baja->nombre_baja}}">{{$tipo_baja->nombre_baja}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-1">
                    <label for="" class="col-form-label text-md-right text-white">Filtro</label>
                    <button id="filtrar" type="button" class="btn btn-dark">Filtrar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {{-- Termina filtros --}}
        <table id="tabla" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Fecha de Baja</th>
                    <th scope="col">Libro/edicion</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Tipo de baja</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($baja_libros as $baja_libro)
                <tr>
                    <td>{{ \Carbon\Carbon::create($baja_libro->fecha_baja)->format('d/m/Y')}}</td>
                    <td>{{$baja_libro->libro->nombre}} - {{$baja_libro->libro->edicion}}</td>
                    <td>{{$baja_libro->libro->editoriales->nombre_editorial}}</td>
                    <td>{{$baja_libro->cantidad}}</td>
                    <td>{{$baja_libro->tipo_bajas->nombre_baja}}</td>
                    <td class="text-right">
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$baja_libro->id}}>Borrar</a>
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
<input type="hidden" id="filtros" value="Ningun filtro aplicado.">

@endsection

@push('scripts')

{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('baja_libros.destroy',":id")}}";
    url2=url2.replace(':id',id);
 
    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>

<!-- Primer script (inicializacion de inputs de fecha) -->
<script>
    $(function () {
      //Datemask dd/mm/yyyy
      $('#desde').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
      $('#hasta').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy' });  
      $('.select2bs4').select2({
          theme: 'bootstrap4'
      });
      document.getElementById("desde").max = new Date().toISOString().split("T")[0];
      document.getElementById("hasta").max = new Date().toISOString().split("T")[0];

      $("#desde").change(function () {
        var fecha = $(this).val();
        document.getElementById("hasta").min = fecha;
      });
      $("#hasta").change(function () {
        var fecha = $(this).val();
        document.getElementById("desde").max = fecha;
      });
      })
  </script>



<!--Datatable con reportes -->
<script>
    $(function () {
          $("#tabla").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": true,
            "ordering": true,
            buttons: [
              'copy', 'csv', 'excel',
              {
                extend: 'pdfHtml5',
                className: 'btn btn-secondary buttons-pdf buttons-html5',
                text: 'PDF',
                filename: 'bajas_libros_pdf',
                orientation: 'portrait', //landscape
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter


                customize: function (doc) {
                  //quitamos el titulo por defecto del pdfhtml5 eliminando el primer elemento del pdf que esta en el array content.
                  doc.content.splice(0, 1);
                  //Fecha para usar en el reporte mas adelante
                  var now = new Date();
                  var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear();

                  //Para poner una imagen hay que convertirla a Base64 con esta pagina se puede:
                  // http://codebeautify.org/image-to-base64-converter


                  //#region aca esta el logo en base64 (expandir, es muy largo xd)
                  var logo = '{{$configuracion->getImagenReporte64()}}';
                  //#endregion


                  // Ahora establecemos los margenes: [left,top,right,bottom] o [horizontal,vertical]
                  // si ponemos solo un numero se establece ese mismo para todos los margenes
                  doc.pageMargins = [60, 135, 20, 50];

                  // Tamaño de fuente de todo el documento
                  doc.defaultStyle.fontSize = 10;
                  // Tamaño de fuente del encabezado
                  doc.styles.tableHeader.fontSize = 12;

                  //Al elemento 0 (porque borre el titulo al principio) del contenido o sea la tabla
                  //lo centramos forzadamente
                  //doc.content[0].margin = [100, 0, 100, 0]

                  // Para personalizar el encabezado:
                  // Creamos un encabezado con 3 columnas
                  // A la izquierdalogo
                  // En el medio: Titulo
                  // A la derecha: algo xd

                  //El titulo lo saco de un input oculto para poder usar esta misma configuracion para reportes distintos, entonces cambia el titulo segun el reporte.
                  var titulo = 'Listado de baja de libros';
                  var autor_reporte = '{{Auth::user()->name}}';
                  filtros = String($('#filtros').val());

                  var titulo_header = "{{$configuracion->nombre}}"
                  var direccion_header = "{{$configuracion->direccion}}  "
                  var contacto_header = "Contacto: {{$configuracion->email}}"

                  doc['header'] = (function () {
                    return {
                      columns: [
                        {
                          image: logo,
                          width: 70,
                          margin: [-10, -10, 10, 0]
                        },
                        // {
                        //   alignment: 'left',
                        //   fontSize: 10,
                        //   text: [
                        //     { text: titulo + " \n", bold: true, fontSize: 12 },
                        //     { text: 'Filtros' + "\n", fontSize: 10 },
                        //     { text: filtros + "\n" },
                        //   ],
                        //   width: 100,
                        //   margin: [-30, 100, 0, 0],
                        //   alignment: 'left'
                        // },
                        {
                          alignment: 'center',
                          text: [
                            { text: titulo_header + " \n", bold: true, fontSize: 16 },
                            { text: direccion_header + " \n" },
                            { text: contacto_header + "\n \n \n \n" },
                            { text: titulo + " \n", bold: true, fontSize: 12, alignment: 'left' },
                            { text: filtros, fontSize: 10, alignment: 'left' },
                          ],
                          fontSize: 10,
                          margin: [-28, 10, 0, 10]
                        },
                        {
                          alignment: 'right',
                          fontSize: 10,
                          text: ['Fecha: ', { text: jsDate.toString() }, { text: '\n Autor: ' + autor_reporte, bold: true, fontSize: 11 }],
                          width: 75,
                          margin: [0, 10, 0, 0],
                          alignment: 'left'
                        }
                      ],
                      margin: [20, 10, 20, 20]
                    }
                  });

                  //Funcion que pone cada columna en tamaño *, para que se ajuste automagicamente. cuenta cada <td> del data table y genera array del tipo [*,*,*,..,n] y establece dicho array como width.
                  var colCount = new Array();
                  $("#tabla").find('tbody tr:first-child td').each(function () {
                    if ($(this).attr('colspan')) {
                      for (var j = 1; j <= $(this).attr('colspan'); $j++) {
                        colCount.push('*');
                      }
                    } else { colCount.push('*'); }
                  });
                  //console.log(colCount);
                  colCount.push('*'); //Le pongo uno mas porque tengo un td oculto (el id)

                  //doc.content[0].table.widths = colCount;

                  //Es equivalente a: 
                  doc.content[0].table.widths = ['auto', 'auto', 'auto', 'auto', 'auto'];

                  //Obtenemos la cantidad de filas y le damos la orientacion (izquierda, centro, derecha) que queremos
                  var rowCount = document.getElementById("tabla").rows.length;
                  for (i = 1; i < rowCount; i++) {
                    doc.content[0].table.body[i][0].alignment = 'right';
                    doc.content[0].table.body[i][1].alignment = 'left';
                    doc.content[0].table.body[i][2].alignment = 'left';
                    doc.content[0].table.body[i][3].alignment = 'right';
                    doc.content[0].table.body[i][4].alignment = 'left';

                  };


                  // Para personalizar el pie de pagina:
                  // Creamos un objeto de pie de pagina con dos columnas
                  // Lado izquierdo: Fecha de creacion del reporte
                  // Lado derecho: pagina actual y total de pagina
                  doc['footer'] = (function (page, pages) {
                    return {
                      columns: [{
                        alignment: 'left',
                        text: ['Fecha de Generación: ', { text: jsDate.toString() }]
                      },
                      {
                        alignment: 'right',
                        text: ['Página ', { text: page.toString() }, ' de ', { text: pages.toString() }]
                      }
                      ],
                      margin: 20
                    }
                  });

                  // Change dataTable layout (Table styling)
                  // To use predefined layouts uncomment the line below and comment the custom lines below
                  // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                  var objLayout = {};
                  objLayout['hLineWidth'] = function (i) { return .7; };
                  objLayout['vLineWidth'] = function (i) { return .7; };
                  objLayout['hLineColor'] = function (i) { return '#cdcdcd'; };
                  objLayout['vLineColor'] = function (i) { return '#cdcdcd'; };
                  objLayout['paddingLeft'] = function (i) { return 4; };
                  objLayout['paddingRight'] = function (i) { return 4; };
                  objLayout['paddingTop'] = function (i) { return 6; };
                  objLayout['paddingBottom'] = function (i) { return 6; };
                  doc.content[0].layout = objLayout;
                },
                exportOptions: {
                  columns: [0,1,2,3,4]
                }
              }
            ],
            dom: 'lrfBtip',
            language: {
              "sProcessing": "Procesando...",
              "sLengthMenu": "Ver _MENU_",
              "sZeroRecords": "No se encontraron resultados",
              "sEmptyTable": "Todavía no se registraron pagos",
              "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_",
              "sInfoEmpty": "Mostrando  del 0 al 0 de de 0 ",
              "sInfoFiltered": "(filtrado de _MAX_ registros)",
              "sInfoPostFix": "",
              "sSearch": "Buscar:",
              "sUrl": "",
              "sInfoThousands": ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Sig",
                "sPrevious": "Ant"
              },
              "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              },
              "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
              }
            }
          });

$('#tabla_length').css({
          'position': 'absolute'
});

$('.dt-buttons').css({
          'position': "relative",
  'display': "-ms-inline-flexbox",
  'display': "block",
  'vertical-align': "middle",
  'text-align':" right"
});
});
  </script>

    <!-- Filtros -->
    <script>
        $(document).ready(function () {
          var table = $('#tabla').DataTable();
    
          //un boton con id filtrar
          $('#filtrar').click(function () {
    
    
            //aca se obtienen los valores
            var filtro3 = [];
            filtro3 = $('#editoriales').val();
    
            var filtro4 = [];
            filtro4 = $('#tipo_bajas').val();
    
            var filtro1 = $('#desde').val();
            var filtro1Titulo = moment(filtro1).format('DD/MM/YYYY');
            if (filtro1 != "") {
              filtro1 = moment(filtro1).format('YYYYMMDD');
            }
    
            var filtro2 = $('#hasta').val();
            var filtro2Titulo = moment(filtro2).format('DD/MM/YYYY');
            if (filtro2 != "") {
              filtro2 = moment(filtro2).format('YYYYMMDD');
            }
    
            //no olvidarme de volver a poner (pop) las filas
            //esto es por si se realizo algun filtro asi se vuelve a cargar el datatable
    
            $.fn.dataTable.ext.search.pop(
              function (settings, data, dataIndex) {
                if (1) {
                  return true;
                }
                return false;
              }
            );
            table.draw();
    
            if (filtro3 != "") {
              var editoriales = filtro3;
              console.log(editoriales);
            }
            if (filtro4 != "") {
              var tipo_bajas = filtro4;
              console.log(tipo_bajas);
            }
            if (filtro1 != "") {
              var desde = filtro1;
              console.log(desde);
            }
            if (filtro2 != "") {
              var hasta = filtro2;
              console.log(hasta);
            }
            filtros = "";
            if (filtro1 == "" && filtro2 == "" && filtro3 == "" && filtro4 == "") {
              console.log('filtro 0');
              var filtros = "Ningún filtro aplicado.";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                if (true) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            if (filtro1 != "" && filtro2 == "" && filtro3 == "" && filtro4 == "") {
              console.log('filtro 1');
              var filtros = "F. desde: " + filtro1Titulo+".";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
    
            else if (filtro1 != "" && filtro2 != "" && filtro3 == "" && filtro4 == "") {
              console.log('filtro 2');
              var filtros = "F. desde: " + filtro1Titulo+" y F. hasta: " + filtro2Titulo;
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && hasta >= newdate1) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw() 
    
            }
    
            else if (filtro1 != "" && filtro2 != "" && filtro3 != "" && filtro4 == "") {
              console.log('filtro 3');
              var filtros = "F. desde: " + filtro1Titulo+", F. hasta: " + filtro2Titulo +" y Editoriales: "+String(filtro3);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && hasta >= newdate1 && editoriales.includes(data[2])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 != "" && filtro2 != "" && filtro3 != "" && filtro4 != "") {
              console.log('filtro 4');
              var filtros = "F. desde: " + filtro1Titulo+", F. hasta: " + filtro2Titulo +", Editoriales: "+String(filtro3) +" y Tipo de Bajas: "+ String(filtro4);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && hasta >= newdate1 && editoriales.includes(data[2]) && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 == "" && filtro2 != "" && filtro3 != "" && filtro4 != "") {
              console.log('filtro 5');
              var filtros = "F. hasta: "+filtro2Titulo+", Editoriales: "+String(filtro3)+" y Tipo de Bajas: "+String(filtro4); 
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (hasta >= newdate1 && editoriales.includes(data[2]) && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 == "" && filtro2 != "" && filtro3 == "" && filtro4 != "") {
              console.log('filtro 6');
              var filtros = "F. hasta: "+filtro2Titulo+" y Tipo de Bajas: "+String(filtro4);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (hasta >= newdate1 && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 == "" && filtro2 != "" && filtro3 == "" && filtro4 == "") {
              console.log('filtro 7');
              var filtros = "F. hasta: "+filtro2Titulo+".";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (hasta >= newdate1) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
    
            else if (filtro1 == "" && filtro2 == "" && filtro3 != "" && filtro4 != "") {
              console.log('filtro 8');
              var filtros = "Editoriales: "+String(filtro3)+" y Tipo de Bajas: "+String(filtro4);
              console.log(filtros);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                if (editoriales.includes(data[2]) && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 == "" && filtro2 == "" && filtro3 != "" && filtro4 == "") {
              console.log('filtro 9');
              var filtros = "Editoriales: "+String(filtro3);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                if (editoriales.includes(data[2])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 != "" && filtro2 == "" && filtro3 != "" && filtro4 == "") {
              console.log('filtro 10');
              var filtros = "F. desde: " + filtro1Titulo+"y Editoriales: "+String(filtro3)+".";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && editoriales.includes(data[2])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 == "" && filtro2 != "" && filtro3 != "" && filtro4 == "") {
              console.log('filtro 11');
              var filtros = "F. hasta: "+filtro2Titulo+"y Editoriales: "+String(filtro3)+".";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (hasta >= newdate1 && editoriales.includes(data[2])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
    
            else if (filtro1 == "" && filtro2 == "" && filtro3 == "" && filtro4 != "") {
              console.log('filtro 12');
              var filtros = "Tipo de Bajas: "+String(filtro4)+".";
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                if (tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 != "" && filtro2 == "" && filtro3 == "" && filtro4 != "") {
              console.log('filtro 13');
              var filtros = "F. desde: "+filtro1Titulo+" y Tipo de Bajas: "+String(filtro4);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 != "" && filtro2 != "" && filtro3 == "" && filtro4 != "") {
              console.log('filtro 14');
              var filtros = "F. desde: " + filtro1Titulo+", F. hasta: " + filtro2Titulo +" y Tipo de Bajas: "+String(filtro4);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && hasta >= newdate1 && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
            }
            else if (filtro1 != "" && filtro2 == "" && filtro3 != "" && filtro4 != "") {
              console.log('filtro 15');
              var filtros = "F. desde: " + filtro1Titulo+", Editoriales: " + String(filtro3) +" y Tipo de Bajas: "+String(filtro4);
              var filtradoTabla = function FuncionFiltrado(settings, data, dataIndex) {
                var datearray1 = data[0].split("/");
                var newdate1 =   datearray1[2] + datearray1[1] + datearray1[0];
                if (desde <= newdate1 && editoriales.includes(data[2]) && tipo_bajas.includes(data[4])) {
                  return true;
    
                } else {
                  return false;
    
                }
              }
    
              $.fn.dataTable.ext.search.push(filtradoTabla)
    
              table.draw()
    
              
    
            }
            $('#filtros').val(String(filtros));
    
          });
        });
      </script>
@endpush