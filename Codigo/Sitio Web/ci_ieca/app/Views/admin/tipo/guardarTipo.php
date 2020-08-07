<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idTipInst'])){ echo 'Editar Tipo: '.$tipos->getTipo();}else{ echo "Nuevo Tipo de instructor";}?></h1>
<form id="guardarTipoInstructor">
    <div class="row">
    <?php //if($tipos->getIdTipInst()){?>
        <input class="form-control" type="hidden" name="idTipInst" value="<?php if($registro){echo $registro[0]['idTipInst'];}?>"/>
    <?php //}?>
    <div class="form-group col-md-4">
    <label for="">Tipo</label>
    <input type="text" name="tipo" class="form-control" value="<?php if($registro){echo $registro[0]['tipo'];}?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcionTip" cols="100" rows="5"><?php if($registro){echo $registro[0]['descripcionTip'];}?></textarea>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveTypeInstructor()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformTypeInstructor()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>