@extends('admin-lte.index')

@section('content')

<div class="card">
    <form class="form-group " method="GET" enctype="multipart/form-data" action={{route("estadistica.index")}}>
    @csrf
    <div class="card-header">Estadisticas
        <label for="anio"></label>
        <hr>
        <div class="row">
            <div class="col-2">
                <select name="anio_id" class="form-control" id="anio_id">
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2019">2018</option>
                    <option value="2019">2017</option>
                    <option value="2019">2016</option>  
                    <option value="2019">2015</option>
                    <option value="2019">2014</option>
                    <option value="2019">2013</option>
                    <option value="2019">2012</option>
                    <option value="2019">2011</option>
                    <option value="2019">2010</option>
                </select>
                
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary"></i> Aplicar</button>
            </div>           
        </div>

        
    </form>  
    </div>

    <div class="card-header">Prestamos por mes
        <hr>
        <canvas id="movimientosChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Cantidad de ingresos por mes

                </div>

                <div class="card-body">
                    <canvas id="librosChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Cantidad de bajas por mes

                </div>

                <div class="card-body">
                    <canvas id="bajasChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
{{-- inicializamos nuestros labels y nuestros datas --}}
<script>
    var labelsPrestamos = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
    var labelsIngreso = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
    var dataPrestamos = [];
    var dataBaja = [];
    var dataIngreso = [];
    dataPrestamos = []
    colors = ["#98FFB7", "#74C9E8","#A38CFF","#FFDB80","#EAFFA6","#C596FF", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4","#FFE078","#7E7DFF","#81C8EB", "#D1FEED","#C4EBBE","#E1FCEE","#F3E1FD","#96FFB7", "#3DC1EB","#FFD359","#A296FF","#96FFFC","#E6E3FE", "#67EBBC","#DE96FF","#E3FFFC"];

</script>
{{-- cargamos el labes de tecinicos generan las cantidades de barras que va a tener el grafico --}}
@foreach ($valores as $clave => $valor)
<script>
    // labelsPrestamos.push(" ");
    dataPrestamos.push(" {{ $valor }} ");
</script>
@endforeach

@foreach ($valores2 as $clave => $valor)
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
@endforeach

{{-- primera parte configura, 2da crea --}}
<script>
    var movimientosChartCanvas = $('#movimientosChart').get(0).getContext('2d')
    var chartOptions     = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    title: {
        display: true,
        text: 'Gráfico de prestamos por cada mes',
        fontSize: 16
    },
    scales: {
            yAxes: [{
                ticks: {
                    stepSize: 1,
                    min: 0,
                    max: dataPrestamos.max
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Cantidad de pretamos',
                    fontSize: 14
                }
            }],

    xAxes: [{
            ticks: {
                beginAtZero: false,
                stepSize: 1,
                min: 0,
                max: dataPrestamos.max
            },
            scaleLabel: {
                display: true,
                labelString: 'Meses' ,
                fontSize: 14
            }
        }],
    },
    }

    var movimientosChart = new Chart(movimientosChartCanvas, {
    type: 'bar',
    data: {
        labels: labelsPrestamos,

        datasets: [{
            data: dataPrestamos,
            borderColor: "#14B517",
            backgroundColor: colors,
            fill: false
        }
        ]

    },
    options: chartOptions
    })
</script>
<script>

            var librosChart = new Chart(document.getElementById("librosChart"), {
            type: 'doughnut',
            data: {
            labels: labelsIngreso,
            datasets: [
                {
                label: "Libros",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4"],
                data: dataIngreso
                }
            ]
            },
            options: {
            title: {
                display: true,
                text: 'Grafico de ingresos por cada mes',
                fontSize: 16
            }
            }
        })
</script>
<script>

    var librosChart = new Chart(document.getElementById("bajasChart"), {
    type: 'doughnut',
    data: {
    labels: labelsIngreso,
    datasets: [
        {
        label: "Libros",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#7DE8E6","#FFEC59","#E8E3FF","#B5E2FF","#D599E8", "#88EBAC","#A5EBA4"],
        data: dataBaja
        }
    ]
    },
    options: {
    title: {
        display: true,
        text: 'Grafico de bajas por cada mes',
        fontSize: 16
    }
    }
})
</script>
@endpush