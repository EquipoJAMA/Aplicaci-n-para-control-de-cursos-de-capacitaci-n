<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idInscrito'])){ echo 'Editar inscrito: '.$inscrito->getIdInscrito();}else{ echo "Nuevo Inscrito";}?></h1>
<form id="guardarInscrito">
    <div class="row">
    <input class="form-control" type="hidden" name="idInscrito" value="<?php if($registro){echo $registro[0]['idInscrito'];}?>"/>
    <div class="form-group col-md-4">
    <label for="">Grupo</label>
    <select class="form-control" name="grupo_idGrupo">
        <option value="">Selecciona</option>
        <?php foreach($grupo as $ins):?>
            <option <?php if($registro){ if($ins['idGrupo'] == $registro[0]['grupo_idGrupo']){ echo 'Selected';}}?> value="<?php echo $ins['idGrupo']; ?>"><?php echo $ins['nombre_curso']." Num. Grupo: ".$ins['idGrupo']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Alumno</label>
    <select class="form-control" name="alumnos_curp">
        <option value="">Selecciona</option>
        <?php foreach($alumnos as $alu):?>
            <option <?php if($registro){ if($alu['curp'] == $registro[0]['alumnos_curp']){ echo 'Selected';}}?> value="<?php echo $alu['curp']; ?>"><?php echo $alu['nombreAlumno']." ".$alu['apellido1']." ".$alu['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
        <select name="pago" id="" class="form-control">
            <option value="">Selecciona</option>
            <?php foreach($pagos as $p):?>
            <option <?php if($pagos){ if($p['idPago'] == $registro[0]['pagos_idPago']){ echo 'Selected'; }}?> value="<?php echo $p['idPago']?>"><?php echo $p['pago'] ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveInscrito()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformInscrito()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>