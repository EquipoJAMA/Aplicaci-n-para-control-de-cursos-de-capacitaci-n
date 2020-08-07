<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idPago'])){ echo 'Editar Pago: ';}else{ echo "Nuevo Pago";}?></h1>
<form id="guardarPago">
    <div class="row">
        <input class="form-control" type="hidden" name="idPago" value="<?php if($registro){ echo $registro[0]['idPago'];}?>"/>
    <div class="form-group col-md-4">
    <label for="">Curso</label>
    <select class="form-control" name="id_cur">
        <option value="">Selecciona</option>
        <?php foreach($cursos as $curso):?>
            <option <?php if($registro){ if($curso['idCursos'] == $registro[0]['id_cur']){ echo 'Selected';}}?> value="<?php echo $curso['idCursos']; ?>"><?php echo $curso['nombre_curso']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
    <input type="number" name="pago" <?php if($registro){ echo 'readonly';}?> min="0.00" step="0.01" class="form-control" value="<?php if($registro){ echo $registro[0]['pago'];}?>">
    </div>
    <div class="form-group col-md-4">
        <label for="">Fecha de pago</label>
        <input type="date" name="fechaP" value="<?php if($registro){ echo $registro[0]['fechaP'];} ?>" class="form-control">
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estatusP" id="">
        <option value="">Selecciona</option>
        <option <?php if($registro){ if($registro[0]['estatusP'] == 'Pagado'){ echo 'Selected'; }}?> value="<?php echo "Pagado"; ?>">Pagado</option>
        <option <?php if($registro){ if($registro[0]['estatusP']  == 'No pagado'){ echo 'Selected'; }}?> value="<?php echo "No Pagado"; ?>">No Pagado</option>
    </select>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="savePago()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformPago()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>