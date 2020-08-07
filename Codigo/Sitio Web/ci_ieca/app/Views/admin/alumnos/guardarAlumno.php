<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['curp'])){ echo 'Editar a '.$alumno->getNombreAlumno().' '.$alumno->getApellido1().' '.$alumno->getApellido2();}else{ echo "Nuevo Alumno";}?></h1>
<form id="guardarAlumno">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">CURP</label><span id="respuesta"></span>
    <input id="id" onchange="verificar()" class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="curp" value="<?php if($registro){ echo $registro[0]['curp'];}?>"/>
    </div>
    <?php }else{?>
        <input <?php if($registro){ echo 'type="hidden"';}?> name="curp" value="<?php if($registro){ echo $registro[0]['curp'];}?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Nombre</label>
    <input class="form-control" type="text" name="nombreAlumno" value="<?php if($registro){ echo $registro[0]['nombreAlumno'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Apellido paterno</label>
    <input class="form-control" type="text" name="apellido1" value="<?php if($registro){ echo $registro[0]['apellido1'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Apellido materno</label>
    <input class="form-control" type="text" name="apellido2" value="<?php if($registro){ echo $registro[0]['apellido2'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Numero de telefono</label>
    <input class="form-control" type="text" name="telefono" value="<?php if($registro){ echo $tel[0]['telefono'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Tipo</label>
    <select class="form-control" name="tipoTel">
        <option value="">Tipo de dispositivo</option>
        <?php foreach($telt as $i):?>
            <option <?php if($registro){ if($i['idTipTel'] == $tel[0]['tipoTel_idTipTel']){ echo 'selected'; }}?> value="<?php echo $i['idTipTel'];?>"><?php echo $i['tipoTelefono']?></option>
        <?php endforeach;?>
    </select>
    <input type="hidden" name="idTel" value="<?php if($tel){ echo $tel[0]['idTel'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Correo</label>
    <input class="form-control" type="email" name="correo" value="<?php if($registro){ echo $registro[0]['correoAl'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Código postal</label>
    <input class="form-control" type="text" name="cp" value="<?php if($registro){ echo $registro[0]['cpAl'];}?>">
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveAlumno()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformAlumno()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>