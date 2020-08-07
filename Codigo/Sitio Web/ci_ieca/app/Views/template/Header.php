<?php $session = session();
if(isset($_SESSION['privilegios'])){
  echo '<script> window.location.href="HomeAdmin";</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?= base_url('vendor/template/images/GTO.jpg'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css2/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/twbs/fontawesome/css/all.css'); ?>">
    <script src="<?= base_url('vendor/twbs/fontawesome/js/all.js'); ?>"></script>
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/twbs/bootstrap/assets/js/vendor/popper.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/twbs/bootstrap/assets/js/vendor/jquery-slim.min.js'); ?>"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <style>
      .textCursos{
        position: absolute; top:1; left:0; z-index: -1; padding: 20px; margin: 0;
      }
      .textCursos > p{
        size: 100%;
      }
      .imgCurso > img{
        max-width: 100%; max-height: 100%; width: 600px; height: 250px; size:cover; cursor: pointer;
      }
      hr{
        background-color: #a0a0a0;width:50%;text-align:left;margin-left:0;
      }
      .fechasCursos{
        background-color: #e6b518; color: white; text-align: center; text-shadow: 2px 2px 2px black;
      }
    @media only screen and (max-width: 750px) {
      #apoyoT{
          font-size: 110%;
        }
      #textAp{
          font-size: 73%;
        }
      .textCursos{
          font-size: 73%;
          position: absolute; top:1; left:0; z-index: -1; padding: 20px; margin: 0;
        }
      .imgCurso{
        margin-top: 2%;
      }
      .nombreCurso{
        background-color: #e6b518; 
        color: white; 
        margin-bottom: -2%; 
        -webkit-border-top-right-radius: 60px; 
        -moz-border-radius-topright: 60px; 
        border-top-right-radius: 60px;
        text-shadow: 2px 2px 2px black;
      }
      .nombreCurso > h5{
        padding-bottom: 2%;
      }
    }
    
    @media only screen and (min-width: 750px) {
      #textAp{
          font-size: 100%;
          margin-left: 25%; 
          margin-right: 25%;
        }
      .textCursos{
          font-size: 73%;
          overflow-y: scroll;
          overflow-y: hidden;
          overflow-x: hidden;
          position: absolute; top:1; left:0; z-index: -1; padding: 20px; margin: 0;
        }
      .nombreCurso{
        background-color: #e6b518; 
        color: white; 
        margin-bottom: -2%; 
        -webkit-border-top-right-radius: 60px; 
        -moz-border-radius-topright: 60px; 
        border-top-right-radius: 60px;
        text-shadow: 2px 2px 2px black;
      }
      .nombreCurso > h5{
        padding-bottom: 2%;
      }
    }
    </style>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title style="color: white;">IECA</title>
</head>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="index.php"><img src="<?= base_url("vendor/template/images/logo_ieca.png")?>" style="max-width: 100%; max-width: 100%; height: 62px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="conocenos">Conocenos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="apoyos">Apoyos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cursos">Cursos</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <!--<li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>-->
      <li class="nav-item dropdown">
        <a style="cursor: pointer;" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="login">Iniciar sesión</a>
          <!--<a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>-->
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

<body>
<div style="background-color: #F1F1F1;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-2 d-flex align-items-center" style="color: white;">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-uppercase text-md-left mb-4 mb-md-0">
        <h5 class="mb-0" style="color: black;"><i class="fas <?= $faicon; ?>" style="color: black;"></i><?= $titulo; ?></h5>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>
 <div class="container">
