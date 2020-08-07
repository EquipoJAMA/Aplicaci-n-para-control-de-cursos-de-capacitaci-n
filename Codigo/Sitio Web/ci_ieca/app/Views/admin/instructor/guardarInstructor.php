<?php
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idInstructor'])){ echo 'Editar a '.$instructor->getNombreInstructor();}else{ echo "Nuevo Instructor";}?></h1>
<form id="guardarInstructor">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label><span id="respuesta"></span>
    <input id="id" onchange="//verificar()" class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idInstructor" value="<?php if($registro){echo $registro[0]['idInstructor'];}?>"/>
    </div>
    <?php }else{?>
    <input <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idInstructor" value="<?php if($registro){echo $registro[0]['idInstructor'];}?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombreInstructor" value="<?php if($registro){echo $registro[0]['nombreInstructor'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Apellido paterno</label>
    <input class="form-control" type="text" name="apellidoI1" value="<?php if($registro){echo $registro[0]['apellidoI1'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Apellido materno</label>
    <input class="form-control" type="text" name="apellidoI2" value="<?php if($registro){echo $registro[0]['apellidoI2'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Numero de telefono</label>
    <input class="form-control" type="text" name="telefono" value="<?php if($registro){echo $registro[0]['telefono'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Tipo de dispositivo</label>
    <select class="form-control" name="tipoTel">
        <option value="">Selecciona</option>
        <?php foreach($telt as $i):?>
            <option <?php if($i['idTipTel'] == $tel[0]['tipoTel_idTipTel']){ echo 'selected'; }?> value="<?=$i['idTipTel'];?>"><?=$i['tipoTelefono']?></option>
        <?php endforeach;?>
    </select>
    <input type="hidden" name="idTel" value="<?php if($tel){ echo $tel[0]['idTel'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">especialidad</label>
    <select class="form-control" name="especialidad">
        <option value="">Selecciona</option>
        <?php foreach($e as $i):?>
            <option value="<?=$i['idEspInst'];?>" <?php if($i['idEspInst'] == $registro[0]['especialidadIns_idEspInst']){ echo 'Selected';} ?>><?=$i['especialidad']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Tipo de instructor</label>
    <select class="form-control" name="tipo">
        <option value="">Selecciona</option>
        <?php foreach($t as $i):?>
            <option <?php if($registro[0]['tipoIns_idTipInst'] == $i['idTipInst']){ echo 'Selected';}?> value="<?=$i['idTipInst'] ?>"><?=$i['tipo'] ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveInstructor()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformInstructor()">Cancelar</button>
    </div>
    </div>
</form>
</div>
</div>
</div>