<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idAut'])){ echo 'Editar Solicitud: N°'.$aut->getIdAut();}else{ echo "Nueva Solicitud";}?></h1>
<form id="guardarAutBeca">
    <div class="row">
        <input class="form-control" type="hidden" name="idAut" value="<?php if($registro){ echo $registro[0]['idaut'];}?>"/>
    <div class="form-group col-md-4">
    <label for="">Solicitud</label>
    <select class="form-control" name="sol">
        <option value="">Selecciona</option>
        <?php foreach($solb as $s):?>
            <option <?php if($registro){ if($s['idSol'] == $registro[0]['autsol']){ echo 'Selected';}}?> value="<?php echo $s['idSol']; ?>"><?php echo $s['nombreAlumno']." ".$s['apellido1']." ".$s['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
    <select class="form-control" name="pago">
        <option value="">Selecciona</option>
        <?php foreach($pagos as $b):?>
            <option <?php if($registro){ if($b['idPago'] == $registro[0]['pagosb_idPago']){ echo 'Selected';}}?> value="<?php echo $b['idPago']; ?>"><?php echo $b['pago']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Descuento</label>
    <input class="form-control" type="number" name="monpag" value="<?php if($registro){ echo $registro[0]['monpag'];}?>">
    </div>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveAutBeca()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformAutBeca()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>