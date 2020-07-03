<?php
session_start();
  if(!isset($_SESSION['privilegios'])){

    header('Location: ../../index.php');

  } else if($_SESSION['privilegios'] > 3){

    header('Location: ../../index.php');
        exit;

  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../template/images/GTO.jpg">
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">
    <link href="../template/css/font-awesome.min.css" rel="stylesheet">
    <script src="../template/js/bootstrap.min.js"></script>
    <script src="../template/js/popper.min.js"></script>
    <script src="../template/bootstrap.min.js"></script>
    <script src="../template/js/jquery.min.js"></script>
    <script src="../template/js/scripts.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>IECA - BackEnd</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1371af;">
    <a class="navbar-brand nombreEmp" href="#">IECA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" >
          <a class="nav-link" href="../alumnos/listarAlumnos.php">Alumnos</a>
        </li>
        <?php if($_SESSION['privilegios'] <=  2){?>
        <li class="nav-item" >
          <a class="nav-link" href="../pagos/listarPagos.php">Pagos</a>
        </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Instructores</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../instructor/listarInstructores.php">Instructores</a>
        <a class="dropdown-item" href="../tipo/listarTipos.php">Tipos</a>
        <a class="dropdown-item" href="../especialidad/listarEspecialidades.php">Especialidades</a>
      </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cursos</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../cursos/listarCursos.php">Cursos</a>
        <a class="dropdown-item" href="../grupo/listarGrupos.php">Grupos</a>
        <a class="dropdown-item" href="../horario/listarHorarios.php">Horarios</a>
        <a class="dropdown-item" href="../aulas/listarAulas.php">Aulas</a>
        <a class="dropdown-item" href="../inscritos/listarInscritos.php">Inscritos</a>
      </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Beca</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../solbeca/listarSolbecas.php">Solicitud de beca</a>
        <a class="dropdown-item" href="../autbec/listarAutbecas.php">Beneficiarios</a>
        <a class="dropdown-item" href="../becas/listarBecas.php">Becas</a>
      </div>
      </li>
      <?php }else{?>
      <li class="nav-item" >
          <a class="nav-link" href="../solbeca/listarSolbecas.php">Solicitud de beca</a>
      </li>
      <?php }?>
        <!--<li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>-->
      </ul>
      <form action="../../lib/logout.php" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="hidden" placeholder="" aria-label="">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Log Out</button>
      </form>
    </div>
  </nav>