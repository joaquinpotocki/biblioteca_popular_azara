@extends('admin-lte.index')

@section('content')
<div class="content-header">
    <div class="container-fuid">
        <h3>Bienvenidos</h3>
    </div>

</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$enero}}</h3>

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
  <style>
    .mySlides {display:none;}
  </style>
  <div class="w3-content w3-section" style="max-width:1400px">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
    <img class="mySlides" src="{{asset("assets/icons/poto-02.png")}}" style="width:100%">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
  </div>
  
  <script>
  var myIndex = 0;
  carousel();
  
  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
  }
  </script>
  {{-- <div class="w3-content w3-display-container">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
    <img class="mySlides" src="{{asset("assets/icons/poto-03.png")}}" style="width:100%">
  
    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  </div>
@push('scripts')
  <script>
  var slideIndex = 1;
  showDivs(slideIndex);
  
  function plusDivs(n) {
    showDivs(slideIndex += n);
  }
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
  }
  </script> --}}
{{-- @endpush --}}
@endsection
