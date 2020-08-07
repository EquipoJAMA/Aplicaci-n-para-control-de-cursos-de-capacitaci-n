<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
    <h1><?php //if(isset($_REQUEST['idAula'])){ echo 'Editar Aula: '.$aulas->getNombreAula();}else{ echo "Nueva Aula";}?></h1>
    <form id="guardarAula">
    <div class="row">
    <?php //if($aulas->getIdAula()){?>
        <input class="form-control" type="hidden" name="idAula" value="<?php if($registro){echo $registro[0]['idAula'];}?>"/>
    <?php //}?>
    <div class="form-group col-md-4">
    <label for="">Nombre del aula</label>
    <input type="text" name="nombreAula" class="form-control" value="<?php if($registro){echo $registro[0]['nombreAula'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estatusAula" id="">
        <option value="">Selecciona</option>
        <option <?php if($registro){if($registro[0]['estatusAula'] == 'Disponible'){ echo 'Selected'; }}?> value="<?php echo "Disponible"; ?>">Disponible</option>
        <option <?php if($registro){if($registro[0]['estatusAula'] == 'No disponible'){ echo 'Selected'; }}?> value="<?php echo "No disponible"; ?>">No disponible</option>
    </select>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveAula()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformAula()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>