<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <div align="center">
            <span class="brand-text font-weight-light" style="color: #3c8dbc">
                {{-- <img src="{{asset("assets/icons/poto-03.png")}}" class="brand-image img-circle" style="opacity: 1"> --}}
                <b>Biblioteca Popular</b>
            </span>
            
        </div>
        {{-- <span class="brand-text font-weight-light" style="color: #3c8dbc">
            <img src="{{asset("assets/icons/poto-03.png")}}" class="brand-image img-circle" style="opacity: 1">
            <b>Biblioteca Popular</b>
        </span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-home"></i>
                        <p>
                           Inicio
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Inico</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-book-open"></i>
                        <p>
                           Prestamos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('movimientos.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Movimientos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-book"></i>
                        <p>
                            Libros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('libros.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Libros</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('genero_libros.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Generos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('autores.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Autores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('editorials.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Editoriales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tipo_libros.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Tipo de Libro</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-user-alt"></i>
                        <p>
                           Lectores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('lectores.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Lectores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-dolly"></i>
                        <p>
                           Proveedores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('proveedores.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Proveedores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-people-carry"></i>
                        <p>
                           Ingreso de stock
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('ingreso_libros.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Ingreso de Libros</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-minus-square"></i>
                        <p>
                           Baja de libros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('baja_libros.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Baja Libros</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-bars"></i>
                        <p>
                           Parametros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('tipo_ingresos.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Tipo de Ingreso</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('tipo_bajas.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Tipo de Bajas</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('estados.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estados</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('estado_devolucions.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estado de Devolucion</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-users"></i>
                        <p>
                           Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('usuarios.administrar')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        @can('all')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-search"></i>
                        <p>
                            Auditorias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('auditoria.index')}}" class="nav-link">
                                <i class="far fa-search nav-icon"></i>
                                <p>Ver Auditorias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-cogs"></i>
                        <p>
                           Configuracion
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="">
                        <li class="nav-item">
                            <a href="{{route('configuracion.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Configuracion</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        @endcan
        
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>