<?php $session = session();
if(!isset($_SESSION['privilegios'])){
  $session->destroy();
  echo '<script> window.location.href="Login";</script>';
} else if($_SESSION['privilegios'] > 3){
  echo '<script> window.location.href="Login";</script>';
  $session->destroy();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>IECA CPANEL</title>

  <!-- Favicons -->
  <link href="<?=base_url('vendor/template/images/logo_ieca.png')?>" rel="icon">
  <link href="<?=base_url('vendor/template/img/apple-touch-icon.png')?>" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('vendor/template/lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <!--external css-->
  <link href="<?=base_url('vendor/template/lib/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/template/css/zabuto_calendar.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/template/lib/gritter/css/jquery.gritter.css')?>" />
  <!-- Custom styles for this vendor/template -->
  <link href="<?=base_url('vendor/template/css/style.css')?>" rel="stylesheet">
  <link href="<?=base_url('vendor/template/css/style-responsive.css')?>" rel="stylesheet">
  <script src="<?=base_url('vendor/template/lib/chart-master/Chart.js')?>"></script>
    <!--Mis importaciones-->
  <script src="<?=base_url('vendor/template/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('vendor/template/js/popper.min.js')?>"></script>
  <script src="<?=base_url('vendor/template/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('vendor/template/js/bootstrap-confirmation.js')?>"></script>
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Barra de navegación"></div>
      </div>
      <!--logo start-->
      <a href="" class="logo"><img class="" src="<?=base_url('vendor/template/images/logo_ieca.png')?>" width="50" height="50"><b>IECA<span>Tarandacuao</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li title="Cerrar sesion"><a class="logout" href="HomeAdmin/logout"><i class="fa fa-sign-out"></i></a></li>
        </ul>
        <!--<ul class="nav pull-right top-menu">
          <li title="y"><a class="logout" href="../index.php" style="background-color: blue;"><i class="fa fa-eye"></i></a></li>
        </ul>-->         
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <!--<p class="centered"><a href="usuarios/miPerfil.php"><img src="usuarios/<?php if(isset($_SESSION['urlAvatar'])){ echo $_SESSION['urlAvatar'];}?>" class="img-circle" width="80"></a></p>-->
          <h5 class="centered" style="color: black;"><?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre'];}?></h5>
          <li class="mt">
            <a class="active" href="HomeAdmin">
              <i class="fa fa-dashboard"></i>
              <span>Escritorio</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="usuarios/index.php">
              <i class="fa fa-folder"></i>
              <span>Cursos</span>
              </a>
            <ul class="sub">
              <li><a href="Cursoss">Cursos</a></li>
              <li><a href="Grupos">Grupos</a></li>
              <li><a href="Horarios">Horarios</a></li>
              <li><a href="Aulas">Aulas</a></li>
              <li><a href="Inscritos">Inscritos</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="clientes/index.php">
              <i class="fa fa-group"></i>
              <span>Instructores</span>
              </a>
              <ul class="sub">
              <li><a href="Instructores">Instructores</a></li>
              <li><a href="TipoInstructor">Tipos</a></li>
              <li><a href="EspecialidadInstructor">Especialidades</a></li>
            </ul>
          </li>
            <li class="sub-menu">
              <a href="Alumnos">
                <i class="fa fa-user"></i>
                <span>Alumnos</span>
                </a>
            </li>
            <!--<ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="Pagos">
              <i class="fa fa-book"></i>
              <span>Pagos</span>
              </a>
            <!--<ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>-->
          </li>
          <li class="sub-menu">
            <a href="destinos/index.php">
              <i class="fa fa-credit-card"></i>
              <span>Becas</span>
              </a>
            <ul class="sub">
              <li><a href="Beca">Becas</a></li>
              <li><a href="SolBecas">Solicitudes</a></li>
              <li><a href="AutBecas">Beneficiarios</a></li>
              <!--<li><a href="contactform.html">Contact Form</a></li>-->
            </ul>
          </li>
          <!--<li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>-->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>