<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idBeca'])){ echo 'Editar Solicitud: '.$sol->getIdSol();}else{ echo "Nueva Solicitud";}?></h1>
<form id="guardarSolBeca">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label>
    <input class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idSol" value="<?php if($registro){ echo $registro[0]['idSol'];}?>"/>
    </div>
    <?php }else{?>
    <input class="form-control" <?php if($registro){ echo 'type="hidden"';}?> name="idSol" value="<?php if($registro){ echo $registro[0]['idSol'];}?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Alumno</label>
    <select class="form-control" name="solalu">
        <option value="">Selecciona</option>
        <?php foreach($alumnos as $alu):?>
            <option <?php if($registro){ if($alu['curp'] == $registro[0]['solalu']){ echo 'Selected';}}?> value="<?php echo $alu['curp']; ?>"><?php echo $alu['nombreAlumno']." ".$alu['apellido1']." ".$alu['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Beca</label>
    <select class="form-control" name="becsol">
        <option value="">Selecciona</option>
        <?php foreach($becas as $b):?>
            <option <?php if($registro){ if($b['idBeca'] == $registro[0]['becsol']){ echo 'Selected';}}?> value="<?php echo $b['idBeca']; ?>"><?php echo $b['nomBeca']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estsol" id="">
        <option value="">Selecciona</option>
        <option <?php if($registro){ if($registro[0]['estsol'] == 'Sin autorizar'){ echo 'Selected'; }}?> value="<?php echo "Sin autorizar"; ?>">Sin autorizar</option>
        <option <?php if($registro){ if($registro[0]['estsol'] == 'Autorizado'){ echo 'Selected'; }}?> value="<?php echo "Autorizado"; ?>">Autorizado</option>
    </select>
    </div>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveSolBeca()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformSolBeca()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>