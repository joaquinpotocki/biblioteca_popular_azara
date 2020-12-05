@extends('admin-lte.index')

@section('content')
<div class="content-header">
    <div class="container-fuid">
        <h3>Inicio</h3>
    </div>

</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$movimientos}}</h3>

          <p>Prestamos</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('movimientos.index')}}" class="small-box-footer" >Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$libros}}</h3>

          <p>Libros disponibles</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a class="small-box-footer" href="{{route('libros.index')}}">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$lectores}}</h3>

          <p>Lectores</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a  class="small-box-footer"  href="{{route('lectores.index')}}">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$ingreso_libros}}</h3>

          <p>Ingresos</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a  class="small-box-footer"  href="{{route('ingreso_libros.index')}}">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
@endsection
