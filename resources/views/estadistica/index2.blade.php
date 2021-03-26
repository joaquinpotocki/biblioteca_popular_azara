@extends('admin-lte.index')

@section('content')

<div class="card">
    <form class="form-group " method="GET" enctype="multipart/form-data" action={{route("estadistica.index2")}}>
    @csrf
    <div class="card">
        <div class="card-header">Estadisticas
            <label for="anio"></label>
            <hr>
            
            <div class="row">
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
                            <input type="date" name="fecha2" id="max" class="form-control">
                        </div>
                            {{-- <a class="btn btn-primary btn-sm float-right text-white"  href="#" id="filtrar">Filtrar</a> --}}
                    </div>
                </div>
                <div class="col-2">
                    <label for="" class=""> </label>
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary"></i> Aplicar</button>
                    </div>
                    
                </div>           
            </div>
    
            
        </form>  
        </div>
    </div>
    

    {{-- <div class="card-header">Ingreso y Bajas de Libros
        <hr>
        <canvas id="ingresoBajaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div> --}}

        <div class="card-header">Cantidad de servicios por estados
            <canvas id="lectoresChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
        </div>
</div>


@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
{{-- inicializamos nuestros labels y nuestros datas --}}
<script>
    var labelsLectores = [];
    var dataLectores = [];
    dataLectores = []
    labelsLectores = []
    //#####################################################################################################################################
    // var labelsBaja = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
    // var labelsIngreso = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
    // var dataBaja = [];
    // var dataIngreso = [];
    // dataPrestamos = []
    colors = ["#98FFB7", "#74C9E8","#A38CFF","#FFDB80","#EAFFA6","#C596FF", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4","#FFE078","#7E7DFF","#81C8EB", "#D1FEED","#C4EBBE","#E1FCEE","#F3E1FD","#96FFB7", "#3DC1EB","#FFD359","#A296FF","#96FFFC","#E6E3FE", "#67EBBC","#DE96FF","#E3FFFC"];

</script>

{{-- cargamos el labes de libros --}}
@foreach ($lectores as $clave => $valor)
<script>
    labelsLectores.push(" {{ $clave }} ");
    dataLectores.push(" {{ $valor }} ");
</script>

@endforeach

{{-- @foreach ($valores2 as $clave => $valor)
<script>
    // labelsIngreso.push(" {{ $clave }} ");
    dataIngreso.push(" {{ $valor }} ");
</script>
@endforeach
@foreach ($valores3 as $clave => $valor)
<script>
    // labelsIngreso.push(" {{ $clave }} ");
    dataBaja.push(" {{ $valor }} ");
</script>
@endforeach --}}

{{-- primera parte configura, 2da crea --}}

{{-- <script>
    var ingresoBajaChartCanvas = $('#ingresoBajaChart').get(0).getContext('2d')
    var chartOptions     = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true
    },
    title: {
        display: true,
        text: 'Gráfico de Bajas de libros y Ingreso de Libros por cada mes',
        fontSize: 16
    },
    scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1,
                    min: 0,
                    max: dataIngreso.max
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Cantidad de Ingresos y Bajas',
                    fontSize: 14
                }
            }],

    xAxes: [{
            ticks: {
                beginAtZero: false,
                stepSize: 1,
                min: 0,
                max: dataIngreso.max
            },
            
            scaleLabel: {
                display: true,
                labelString: 'Meses' ,
                fontSize: 14
            }
        }],
    },
    }

    var ingresoBajaChart = new Chart(ingresoBajaChartCanvas, {
    type: 'bar',
    data: {
        labels:labelsBaja,
        datasets: [{
            label:"Ingreso de Libros",
            data: dataIngreso,
            borderColor: "#14B517",
            backgroundColor: "#98FFB7",
            fill: false
        },
        {
            label:"Baja de Libros",
            data: dataBaja,
            borderColor: "#FFDB80",
            backgroundColor: "#FFDB80",
            fill: false
        }
        
        ]

    },
    options: chartOptions
    })
</script> --}}

{{-- primera parte configura, 2da crea --}}
<script>
    var lectoresChartCanvas = $('#lectoresChart').get(0).getContext('2d')
    var chartOptions     = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    title: {
        display: true,
        text: 'Gráfico de prestamos por cada Lector',
        fontSize: 16
    },
    scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1,
                    min: 0,
                    max: dataLectores.max
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Lectores',
                    fontSize: 14
                }
            }],

    xAxes: [{
            ticks: {
                beginAtZero: false,
                stepSize: 1,
                min: 0,
                max: dataLectores.max
            },
            scaleLabel: {
                display: true,
                labelString: 'Cantidad de Prestamos' ,
                fontSize: 14
            }
        }],
    },
    }

    var lectoresChart = new Chart(lectoresChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: labelsLectores,

        datasets: [{
            label: "Cantidad de prestamos por Lector",
            data: dataLectores,
            borderColor: "#14B517",
            backgroundColor: colors,
            fill: false
        }
        ]

    },
    options: chartOptions
    })
</script>
{{-- <script>
    var lectoresChartCanvas = $('#lectoresChart').get(0).getContext('2d')
    var chartOptions     = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    title: {
        display: true,
        text: 'Gráfico de servicios finalizados por cada tecnico',
        fontSize: 16
    },
    scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1,
                    min: 0,
                    max: dataLectores.max
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Cantidad de servicios',
                    fontSize: 14
                }
            }],

    xAxes: [{
            ticks: {
                beginAtZero: false,
                stepSize: 1,
                min: 0,
                max: dataLectores.max
            },
            scaleLabel: {
                display: true,
                labelString: 'Tecnicos' ,
                fontSize: 14
            }
        }],
    },
    }
    var myBarChart = new Chart(document.getElementById("lectoresChart"), {
        type: 'horizontalBar',
        data: {
            labels: labelsLectores,
            datasets: [
        {
        label: "aa",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4"],
        data: dataLectores
        }
    ]
    },
    options: {
        title: {
            display: true,
            text: 'Movimientos por cada lector',
            fontSize: 16
        }
    }
    }); --}}


{{-- //     var lectoresChart = new Chart(document.getElementById("lectoresChart"), {
//     type: 'doughnut',
//     data: {
//     labels: labelsLectores,
//     datasets: [
//         {
//         label: "aa",
//         backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4"],
//         data: dataLectores
//         }
//     ]
//     },
//     options: {
//     title: {
//         display: true,
//         text: 'Movimientos por cada lector',
//         fontSize: 16
//     }
//     }
// }) --}}
{{-- </script> --}}
@endpush