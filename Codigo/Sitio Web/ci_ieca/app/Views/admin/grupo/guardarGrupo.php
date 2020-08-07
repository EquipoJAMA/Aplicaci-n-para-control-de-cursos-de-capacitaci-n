<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idGrupo'])){ echo 'Editar grupo: Num '.$grupo->getIdGrupo();}else{ echo "Nuevo grupo";}?></h1>
<form id="guardarGrupo">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador de grupo</label>
    <input class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idGrupo" value="<?php if($registro){ echo $registro[0]['idGrupo'];}?>"/>
    </div>
    <?php }else{?>
        <input class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idGrupo" value="<?php if($registro){ echo $registro[0]['idGrupo'];}?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Curso</label>
    <select class="form-control" name="cursos_idCursos">
        <option value="">Selecciona</option>
        <?php foreach($cursos as $curso):?>
            <option <?php if($registro){ if($curso['idCursos'] == $registro[0]['cursos_idCursos']){ echo 'Selected';}}?> value="<?php echo $curso['idCursos']; ?>"><?php echo $curso['nombre_curso']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Aula</label>
        <select name="aula" class="form-control">
            <option value="">Selecciona</option>
            <?php foreach($aulas as $aula):?>
            <option <?php if($registro){ if($aula['idAula'] == $registro[0]['aulas_idAula']){ echo 'Selected';}}?> value="<?php echo $aula['idAula']; ?>"><?php echo $aula['nombreAula']?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Horario</label>
    <select class="form-control" name="horario_idHorario">
        <option value="">Selecciona</option>
        <?php foreach($horarios as $horario):?>
            <option <?php if($registro){ if($horario['idHorario'] == $registro[0]['horario_idHorario']){ echo 'Selected';}}?> value="<?php echo $horario['idHorario']; ?>"><?php echo "Inicia: ".$horario['horaInicio']." Termina: ".$horario['horaTermino']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
        <label for="">Número de estudiantes admitidos:</label>
        <input type="number" class="form-control" name="cupo" min="0" max="15" value="<?php if($registro){ echo $registro[0]['cupo'];}?>">
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
    <button type="button" onclick="saveGrupo()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformGrupo()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>