<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idEspInst'])){ echo 'Editar Especialidad: '.$especialidades->getEspecialidad();}else{ echo "Nueva Especialidad de instructor";}?></h1>
<form id="guardarEspecialidad">
    <div class="row">
    <?php //if($especialidades->getIdEspInst()){?>
        <input class="form-control" type="hidden" name="idEspInst" value="<?php if($registro){echo $registro[0]['idEspInst'];}?>"/>
    <?php //}?>
    <div class="form-group col-md-4">
    <label for="">Especialidad</label>
    <input type="text" name="especialidad" class="form-control" value="<?php if($registro){echo $registro[0]['especialidad'];}?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcionEsp" cols="100" rows="5"><?php if($registro){echo $registro[0]['descripcionEsp'];}?></textarea>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveSpecialtyInstructor()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformSpecialtyInstructor()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>