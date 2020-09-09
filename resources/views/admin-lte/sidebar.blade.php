<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light" style="color: #3c8dbc">
            <img src="" class=""
                style="opacity: 1">
            <b>Biblioteca Popular</b>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-tasks"></i>
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
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-tasks"></i>
                        <p>
                           Proveedores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
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
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>