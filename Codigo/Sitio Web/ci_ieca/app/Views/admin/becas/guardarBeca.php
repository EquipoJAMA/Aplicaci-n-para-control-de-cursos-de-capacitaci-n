<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idBeca'])){ echo 'Editar Beca: '.$becas->getNombreBeca();}else{ echo "Nueva Beca";}?></h1>
<form id="guardarBeca">
    <div class="row">
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label>
    <input class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idBeca" value="<?php if($registro){echo $registro[0]['idBeca'];}?>"/>
    </div>
    <?php }else{?>
    <input <?php if($registro){ echo 'type="hidden"';}?> name="idBeca" value="<?php if($registro){echo $registro[0]['idBeca'];}?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Nombre de la beca</label>
    <input type="text" name="nombreBeca" class="form-control" value="<?php if($registro){echo $registro[0]['nomBeca'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Descuento</label>
    <input type="number" name="mondes" min="0" class="form-control" value="<?php if($registro){echo $registro[0]['mondes'];}?>">
    </div>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveBeca()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformBeca()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>