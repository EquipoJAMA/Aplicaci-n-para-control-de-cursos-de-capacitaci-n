<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">
    <link href="../template/css/font-awesome.min.css" rel="stylesheet">

    <script src="../template/js/bootstrap.min.js"></script>
    <script src="../template/js/popper.min.js"></script>
    <script src="../template/js/bootstrap.min.js"></script>
    <script src="../template/js/jquery.min.js"></script>
    <script src="../template/js/scripts.js"></script>
    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
    <title>Ieca - BackEnd</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1371af;">
    <a class="navbar-brand nombreEmp" href="#">IECA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" routerLinkActive="active" routerLinkActive="active">
          <a class="nav-link" href="../instructor/listarInstructores.php">Instructores</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../horario/listarHorarios.php">Horarios</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../alumnos/listarAlumnos.php">Alumnos</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../cursos/listarCursos.php">Cursos</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../grupo/listarGrupos.php">Grupos</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../inscritos/listarInscritos.php">Inscritos</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../tipo/listarTipos.php">Tipo instructor</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../aulas/listarAulas.php">Aulas</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../pagos/listarPagos.php">Pagos</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../becas/listarBecas.php">Becas</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../solbeca/listarSolbecas.php">Solicitud de beca</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../autbec/listarAutbecas.php">Beneficiados</a>
        </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Beca</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../solbeca/listarSolbecas.php">Solicitud de beca</a>
        <a class="dropdown-item" href="../autbec/listarAutbecas.php">Beneficiados</a>
        <a class="dropdown-item" href="../becas/listarBecas.php">Becas</a>
      </div>
      </li>
        <!--<li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>-->
      </ul>
      <!--<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>-->
    </div>
  </nav>