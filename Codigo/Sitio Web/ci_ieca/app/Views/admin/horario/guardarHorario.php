<?php
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idHorario'])){ echo 'Editar Horario'; }else{ echo "Nuevo Horario";}?></h1>
<form id="guardarHorario">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label><span id="respuesta"></span>
    <input id="id" onchange="//verificar()" class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idInstructor" value="<?php if($registro){echo $registro[0]['idHorario'];}?>"/>
    </div>
    <?php }else{?>
    <input type="hidden" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idInstructor" value="<?php if($registro){echo $registro[0]['idHorario'];}?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Hora Inicio</label>
    <input class="form-control" type="time" name="horaInicio" value="<?php if($registro){ echo $registro[0]['horaInicio'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Hora Termino</label>
    <input class="form-control" type="time" name="horaTermino" value="<?php if($registro){ echo $registro[0]['horaInicio'];}?>">
    </div>
    <!--<div class="form-group col-md-5">
    <label for="">Dias</label>
    <input class="form-control" type="number" id="ds" onchange="traerDias()" min="0" max="7">
    </div>-->
    <div class="form-group col-md-4">
    <label for="">Dias</label>
    <select class="form-control" name="dia">
        <option value="">Selecciona</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Lunes"){ echo 'Selected';}}?> value="Lunes">Lunes</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Martes"){ echo 'Selected';}}?> value="Martes">Martes</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Miercoles"){ echo 'Selected';}}?> value="Miercoles">Miercoles</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Jueves"){ echo 'Selected';}}?> value="Jueves">Jueves</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Viernes"){ echo 'Selected';}}?> value="Viernes">Viernes</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Sabado"){ echo 'Selected';}}?> value="Sabado">Sabado</option>
        <option <?php if($registro){if($registro[0]['dias'] == "Domingo"){ echo 'Selected';}}?> value="Domingo">Domingo</option>
    </select>
    </div>
    <div class="col-md-12" id="showD"></div>
    <div class="col-md-12">
    <button type="button" onclick="saveSchedule()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformSchedule()">Cancelar</button>
    </div>
    </div>
</form>
    </div>
</div>
</div>