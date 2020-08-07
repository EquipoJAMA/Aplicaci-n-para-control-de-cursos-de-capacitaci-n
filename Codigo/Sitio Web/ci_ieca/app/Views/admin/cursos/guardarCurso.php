<?php
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php //if(isset($_REQUEST['idCursos'])){ echo 'Editar curso de '.$curso->getNombre_Curso();}else{ echo "Nuevo curso";}?></h1>
<form id="guardarCurso" enctype="multipart/form-data">
    <div class="row">
    <div class="form-group col-md-12">
        <div>
            <div id="preview" style="max-width: 120px; max-height: 200px; line-height: 20px;">
                <img id="show" src="<?php if($registro){echo base_url('vendor/template/'.$registro[0]['imgCurso']); }?>" height="200" width="325" alt=" " /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
            </div>
            <div>
                <span class="btn btn-primary"> 
                    <input type="file" id="file" onchange="showimg()" name="url" value="<?php if($registro){echo base_url('vendor/template/'.$registro[0]['imgCurso']); }?>">
                </span>
                </div>
        </div>
    </div>
    <?php if(!$registro){?>
    <div class="form-group col-md-4">
    <label for="">Identificador de curso</label><span id="respuesta"></span>
    <input id="id" onchange="//verificar()" class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="id" value="<?php if($registro){ echo $registro[0]['idCursos'];}?>"/>
    </div>
    <?php }else{?>
    <input class="form-control" <?php if($registro){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="id" value="<?php if($registro){ echo $registro[0]['idCursos'];}?>"/>
    <?php } ?>
    <div class="form-group col-md-4">
    <label for="">Nombre del curso</label>
    <input class="form-control" type="text" name="nombre_curso" value="<?php if($registro){ echo $registro[0]['nombre_curso'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de Inicio</label>
    <input class="form-control" type="date" name="fechaInicio" value="<?php if($registro){ echo $registro[0]['fechaInicio'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de termino</label>
    <input class="form-control" type="date" name="fechaTermino" value="<?php if($registro){ echo $registro[0]['fechaTermino'];}?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Instructor</label>
    <select class="form-control" class="form-group" name="ins_idInstructor">
        <option value="">Selecciona</option>
        <?php foreach($instructores as $instructor):?>
            <option <?php if($registro){if($instructor['idInstructor'] == $registro[0]['ins_idInstructor']){ echo 'Selected';}}?> value="<?php echo $instructor['idInstructor']; ?>"><?php echo $instructor['nombreInstructor']." ".$instructor['apellidoI1']." ".$instructor['apellidoI2']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Costo</label>
    <input class="form-control" type="number" min="0.00" step="0.01" name="costo" value="<?php if($registro){ echo $registro[0]['costo'];}?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcion" cols="100" rows="5"><?php if($registro){ echo $registro[0]['descripcion'];}?></textarea>
    </div>
    <div class="col-md-12">
    <button type="button" onclick="saveCurso()" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="showformCurso()">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>
<script>
    
</script>