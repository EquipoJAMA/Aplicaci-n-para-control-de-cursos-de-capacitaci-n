<?php
    require_once '../class/Grupo.php';
    require_once '../class/Cursos.php';
    require_once '../class/Horario.php';
    require_once '../class/Aulas.php';
    include('../template/Header.php');

    $idGrupo = (isset($_REQUEST['idGrupo'])) ? $_REQUEST['idGrupo']: null;
    $cursos = Cursos::recuperarTodos();
    $horarios = Horario::recuperarTodos();
    $aulas = Aulas::recuperarTodos();

    if($idGrupo){
        $grupo = Grupo::buscarPorId($idGrupo);
    }else{
        $grupo = new Grupo();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idGrupo = (isset($_REQUEST['idGrupo'])) ? $_REQUEST['idGrupo']: null;
        $cursos_idCursos = (isset($_REQUEST['cursos_idCursos'])) ? $_REQUEST['cursos_idCursos']: null;
        $horario_idHorario = (isset($_REQUEST['horario_idHorario'])) ? $_REQUEST['horario_idHorario']: null;
        $aula = (isset($_REQUEST['aula'])) ? $_REQUEST['aula']: null;
        $estatus = (isset($_REQUEST['estatus'])) ? $_REQUEST['estatus']: null;
        $cupo = (isset($_REQUEST['cupo'])) ? $_REQUEST['cupo']: null;
        if($ins = Grupo::buscarPorId($idGrupo)){
            $grupo = new Grupo($idGrupo, $cursos_idCursos, $aula, $horario_idHorario, $estatus, $cupo);
            $msj = $grupo->actualizar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarGrupo.php?idGrupo='.$idGrupo.'"</script>';
            }else{
                header('Location: listarGrupos.php');
            }
        }else{
            $grupo = new Grupo($idGrupo, $cursos_idCursos, $aula, $horario_idHorario, $estatus, $cupo);
            $msj = $grupo->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarGrupo.php"</script>';
            }else{
                header('Location: listarGrupos.php');
            }
        }
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idGrupo'])){ echo 'Editar grupo: Num '.$grupo->getIdGrupo();}else{ echo "Nuevo grupo";}?></h1>
<form action="guardarGrupo.php" method="POST">
    <div class="row">
    <?php if(!$idGrupo){?>
    <div class="form-group col-md-4">
    <label for="">Identificador de grupo</label>
    <input class="form-control" <?php if($grupo->getIdGrupo()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idGrupo" value="<?php echo $grupo->getIdGrupo()?>"/>
    </div>
    <?php }else{?>
        <input class="form-control" <?php if($grupo->getIdGrupo()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idGrupo" value="<?php echo $grupo->getIdGrupo()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Curso</label>
    <select class="form-control" name="cursos_idCursos">
        <option value="">Selecciona</option>
        <?php foreach($cursos as $curso):?>
            <option <?php if($curso['idCursos'] == $grupo->getCursos_IdCursos()){ echo 'Selected';}?> value="<?php echo $curso['idCursos']; ?>"><?php echo $curso['nombre_curso']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Aula</label>
        <select name="aula" class="form-control">
            <option value="">Selecciona</option>
            <?php foreach($aulas as $aula):?>
            <option <?php if($aula['idAula'] == $grupo->getAulas_idAula()){ echo 'Selected';}?> value="<?php echo $aula['idAula']; ?>"><?php echo $aula['nombreAula']?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Horario</label>
    <select class="form-control" name="horario_idHorario">
        <option value="">Selecciona</option>
        <?php foreach($horarios as $horario):?>
            <option <?php if($horario['idHorario'] == $grupo->getHorario_IdHorario()){ echo 'Selected';}?> value="<?php echo $horario['idHorario']; ?>"><?php echo "Inicia: ".$horario['horaInicio']." Termina: ".$horario['horaTermino']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
        <label for="">Número de estudiantes admitidos:</label>
        <input type="number" class="form-control" name="cupo" min="0" max="15" value="<?php echo $grupo->getCupo()?>">
    </div>
    <!--<div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estatus">
        <option value="">Selecciona</option>
        <option <?php //if($grupo->getEstatus() == "Activo"){ echo 'Selected';}?> value="1">Activo</option>
        <option <?php //if($grupo->getEstatus() == "Inactivo"){ echo 'Selected';}?> value="2">Inactivo</option>
    </select>
    </div>
    <div>
        <p>Numero de estudiantes en el grupo: <h1><?php //echo $grupo->getCupo()?></p></h1>
    </div>-->
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarGrupos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>