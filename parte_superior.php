<?php
require 'controladores/auth.php'; // Verificar que el usuario esté logueado
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Infinity Col</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
    
    <style>
    /* Estilos para el encabezado fijo */
    .fixed-header {
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1000; /* Asegura que el encabezado esté por encima de otros elementos */
    }
    
    .fixed-header + section {
        margin-top: 80px; /* Ajusta el margen superior del contenido para evitar que se solape con el encabezado fijo */
    }
    
    /* Estilos del Sidebar */
    #accordionSidebar {
        transition: transform 0.3s ease;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100%;
        background-color: #343a40;
        z-index: 1000;
        overflow-y: auto;
        transform: translateX(-100%); /* Oculta el sidebar por defecto */
    }

    #accordionSidebar.show {
        transform: translateX(0); /* Muestra el sidebar */
    }

    #accordionSidebar.hide {
        transform: translateX(-100%); /* Oculta el sidebar */
    }

    @media (max-width: 768px) {
      #accordionSidebar {
        width: 200px;
        transform: translateX(-100%); /* Oculta el sidebar en pantallas pequeñas */
      }
      #accordionSidebar.show {
        transform: translateX(0);
      }
    }

    @media (min-width: 769px) {
      #accordionSidebar {
        position: relative;
        width: 250px;
        transform: translateX(0);
      }
    }

    .navbar-nav {
      margin: 0;
    }

    .navbar-nav .nav-link {
      color: #ffffff;
    }

    .sidebar-brand-icon {
      font-size: 2rem;
    }

    .sidebar-brand-text {
      font-size: 1.25rem;
    }

    .nav-item {
        display: flex;
        align-items: center; /* Centra verticalmente el contenido dentro de la nav-item */
    }

    .nav-link {
        display: flex;
        align-items: center; /* Centra verticalmente el icono y el texto */
        justify-content: flex-start; /* Alinea los elementos al inicio (izquierda) */
        padding: 0.75rem 1.25rem; /* Ajusta el espaciado alrededor del contenido */
        text-decoration: none;
        color: #ffffff; /* Color del texto */
    }

    .nav__icon {
        font-size: 1.5rem; /* Tamaño del icono */
        margin-right: 1rem; /* Espaciado entre el icono y el texto */
    }

    .nav-text {
        font-size: 1rem; /* Tamaño del texto */
    }

    /* Estilos para el dropdown del usuario */
    .dropdown-menu {
      min-width: 200px;
    }

    .dropdown-menu .dropdown-item {
      font-size: 0.875rem;
    }

    /* Ajuste para los menús desplegables */
    .collapse {
        position: relative; /* Asegura que el contenedor de colapso se posicione correctamente */
    }

    .collapse-inner {
        padding: 0;
        margin-left: 0;
        margin-right: 0;
    }

    /* Mueve los elementos de colapso fuera del contenedor del sidebar */
    .collapse.show {
        position: absolute;
        top: 0;
        left: 100%; /* Posiciona el colapso fuera del contenedor del sidebar */
        width: 250px; /* Ajusta el ancho según sea necesario */
        z-index: 1001; /* Asegura que el contenido del colapso esté por encima del sidebar */
        background-color: #ffffff; /* Fondo blanco para el colapso */
        border: 1px solid #ddd; /* Borde para el colapso */
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2); /* Sombra para el colapso */
    }

    .collapse-item {
        padding: 0.75rem 1.25rem;
        color: #333;
        text-decoration: none;
    }

    .collapse-item:hover {
        background-color: #f8f9fa;
    }
    
    
    
    
    /* Estilos para el menú colapsable flotante */
    .collapse-floating {
        position: absolute;
        top: 100%; /* Coloca el menú justo debajo del enlace */
        left: 0; /* Alinea el menú con el enlace */
        width: 200px; /* Ajusta el ancho según sea necesario */
        z-index: 1000; /* Asegura que el menú esté por encima de otros elementos */
        background-color: #ffffff; /* Fondo blanco para el menú */
        border: 1px solid #ddd; /* Borde para el menú */
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2); /* Sombra para el menú */
        display: none; /* Oculta el menú por defecto */
        visibility: hidden; /* Oculta el menú por defecto */
        opacity: 0; /* Oculta el menú por defecto */
        transition: opacity 0.3s ease, visibility 0.3s ease; /* Transiciones para mostrar/ocultar */
    }
    
    /* Mostrar el menú cuando el elemento está activo */
    .nav-item.active .collapse-floating {
        display: block;
        visibility: visible;
        opacity: 1;
    }
    
    
    
    
    /* Asegura que el logo de la barra lateral esté visible en dispositivos móviles */
    @media (max-width: 768px) {
        .sidebar-brand {
            display: flex; /* Asegura que el logo se muestre */
        }
    
        .sidebar-brand-icon {
            font-size: 1.5rem; /* Ajusta el tamaño del ícono en pantallas pequeñas */
        }
    
        .sidebar-brand-text {
            font-size: 1rem; /* Ajusta el tamaño del texto en pantallas pequeñas */
        }
    }
    
    /* Cambia el color del texto del usuario en pantallas pequeñas */
    @media (max-width: 768px) {
        .usuario {
            color: #007bff; /* Cambia el color del texto a azul, por ejemplo */
        }
    }
    
    /* Para asegurar que el nombre del usuario sea visible en pantallas grandes */
    @media (min-width: 769px) {
        .usuario {
            color: #333; /* Ajusta el color del texto para pantallas grandes */
        }
    }
    
    
    
    
  </style>
    
    
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <br>

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="material-icons nav__icon">storefront</i>
        </div>
        <div class="sidebar-brand-text mx-3">INFINITY <sup>col</sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Usuario Info -->
      <div class="container text-center mt-3 mb-3">
        <img class="img-profile rounded-circle mb-2" src="imagen/admin.png" alt="Foto de Perfil" style="width: 60px; height: 60px;">
        <p class="usuario">Bienvenido <br> Alejandro Paramo</p>
      </div>      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Items -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
            <i class="material-icons nav__icon">home</i>
            <span>Inicio</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="recargas.php">
            <i class="material-icons nav__icon">account_balance</i>
            <span>Recargas</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="consultar.php">
            <i class="material-icons nav__icon">search</i>
            <span>Consultar</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="registrar_plataformas.php">
            <i class="material-icons nav__icon">search</i>
            <span>Registrar Plataforma Completa</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="consultar.php">
            <i class="material-icons nav__icon">search</i>
            <span>Ver Plaforma Registradas</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="crear_perfiles.php">
            <i class="material-icons nav__icon">search</i>
            <span>Registrar Perfiles</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="consultar.php">
            <i class="material-icons nav__icon">search</i>
            <span>Ver Perfiles Registrados</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="consultar.php">
            <i class="material-icons nav__icon">search</i>
            <span>Consultar</span></a>
        </li>
      <!-- Add more items as needed -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading">
          ☆INFINITY COLOMBIA☆
      </div>

        <!-- Collapse Menu Items 
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePerfilesVencimiento" aria-expanded="false" aria-controls="collapsePerfilesVencimiento">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gestión de vencimiento</span>
          </a>
          <div id="collapsePerfilesVencimiento" class="collapse" aria-labelledby="headingPerfilesVencimiento" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">☆INFINITY COLOMBIA☆</h6>
              <a class="collapse-item" href="plataformas_x_vencer.php">Plataformas por Vencer</a>
              <a class="collapse-item" href="perfiles_x_vencer.php">Perfiles por Vencer</a>
              <a class="collapse-item" href="perfiles_x_fecha-vencimiento.php">Ver todas las plataformas vencidas x mes</a>
            </div>
          </div>
        </li>

        <!-- Additional collapsible menus 
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePlataformas" aria-expanded="false" aria-controls="collapsePlataformas">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gestionar Plataformas</span>
          </a>
          <div id="collapsePlataformas" class="collapse" aria-labelledby="headingPlataformas" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">☆INFINITY COLOMBIA☆</h6>
              <a class="collapse-item" href="registrar_plataformas.php">Registrar Plataformas</a>
              <a class="collapse-item" href="ver_plataformas.php">Ver Plataformas</a>
            </div>
          </div>
        </li>
        
        <!-- Nav Item - Pages Collapse Menu 
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse collapse-floating" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.php">Buttons</a>
                    <a class="collapse-item" href="cards.php">Cards</a>
                </div>
            </div>
        </li>

      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
      
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-header">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Search Dropdown (Visible Only on Small Screens) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto navbar-search w-100">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Alerts Dropdown -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Alertas</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Agosto 10, 2024</div>
                    <span class="font-weight-bold">Nuevo archivo subido</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Agosto 7, 2024</div>
                    $290.29 depositados
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Agosto 2, 2024</div>
                    Alerta de seguridad - Actualización necesaria
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
              </div>
            </li>

            <!-- User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alejandro Paramo</span>
                <img class="img-profile rounded-circle" src="imagen/admin.png" alt="Foto de Perfil">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Actividad
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->