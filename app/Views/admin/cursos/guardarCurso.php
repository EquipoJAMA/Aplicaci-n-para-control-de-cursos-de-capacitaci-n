<?php
    require_once '../class/Cursos.php';
    require_once '../class/Instructor.php';
    include('../template/Header.php');

    $idCursos = (isset($_REQUEST['idCursos'])) ? $_REQUEST['idCursos']: null;
    $instructores = Instructor::recuperarTodos();

    if($idCursos){
        $curso = Cursos::buscarPorID($idCursos);
    }else{
        $curso = new Cursos();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rutaDestino="";
        if($_FILES['url']['type'] == 'image/jpeg' || $_FILES['url']['type'] == 'image/png' || $_FILES['url']['type'] == 'image/jpg'){
            $rutaServer = 'uploads';
            $imgName = $_FILES['url']['name'];
            $rutaTmp = $_FILES['url']['tmp_name'];
            $rImgN = explode('.',$imgName);
            $rutaDestino = $rutaServer."/".$rImgN[0].date('dmyhis').".".$rImgN[1];
            move_uploaded_file($rutaTmp, $rutaDestino);
        }
        $idCursos = (isset($_REQUEST['id'])) ? $_REQUEST['id']: null;
        $nombre_curso = (isset($_REQUEST['nombre_curso'])) ? $_REQUEST['nombre_curso']: null;
        $fechaInicio = (isset($_REQUEST['fechaInicio'])) ? $_REQUEST['fechaInicio']: null;
        $fechaTermino = (isset($_REQUEST['fechaTermino'])) ? $_REQUEST['fechaTermino']: null;
        $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion']: null;
        $costo = (isset($_REQUEST['costo'])) ? $_REQUEST['costo']: null;
        $ins_idInstructor = (isset($_REQUEST['ins_idInstructor'])) ? $_REQUEST['ins_idInstructor']: null;
        if($ins = Cursos::buscarPorId($idCursos)){
            if($rutaDestino){
                $curso = unlink($ins->getImgCurso());
            }else{
                $rutaDestino = $ins->getImgCurso();
            }
            $curso = new Cursos($idCursos, $nombre_curso, $rutaDestino, $fechaInicio, $fechaTermino, $descripcion, $costo, $ins_idInstructor);
            $msj = $curso->actualizar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarCurso.php?idCursos='.$idCursos.'"</script>';
            }else{
                header('Location: listarCursos.php');
            }
        }else{
            $curso = new Cursos($idCursos, $nombre_curso, $rutaDestino, $fechaInicio, $fechaTermino, $descripcion, $costo, $ins_idInstructor);
            $msj = $curso->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarCurso.php"</script>';
            }else{
                header('Location: listarCursos.php');
            }
        }
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idCursos'])){ echo 'Editar curso de '.$curso->getNombre_Curso();}else{ echo "Nuevo curso";}?></h1>
<form action="guardarCurso.php" method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="form-group col-md-12">
        <div>
            <div id="preview" style="max-width: 120px; max-height: 200px; line-height: 20px;">
                <img src="<?php echo $curso->getImgCurso() ?>" height="200" width="325" alt=" " /><!--<input type="file" name="url" value="<?php //echo $producto->getUrl() ?>">-->
            </div>
            <div>
                <span class="btn btn-primary"> 
                    <input type="file" id="file" onchange="showimg()" name="url" value="<?php echo $curso->getImgCurso() ?>">
                </span>
                </div>
        </div>
    </div>
    <?php if(!$idCursos){?>
    <div class="form-group col-md-4">
    <label for="">Identificador de curso</label><span id="respuesta"></span>
    <input id="id" onchange="verificar()" class="form-control" <?php if($curso->getIdCursos()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="id" value="<?php echo $curso->getIdCursos()?>"/>
    </div>
    <?php }else{?>
    <input class="form-control" <?php if($curso->getIdCursos()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="id" value="<?php echo $curso->getIdCursos()?>"/>
    <?php } ?>
    <div class="form-group col-md-4">
    <label for="">Nombre del curso</label>
    <input class="form-control" type="text" name="nombre_curso" value="<?php echo $curso->getNombre_Curso()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de Inicio</label>
    <input class="form-control" type="date" name="fechaInicio" value="<?php echo $curso->getFechaInicio()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Fecha de termino</label>
    <input class="form-control" type="date" name="fechaTermino" value="<?php echo $curso->getFechaTermino()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Instructor</label>
    <select class="form-control" class="form-group" name="ins_idInstructor">
        <option value="">Selecciona</option>
        <?php foreach($instructores as $instructor):?>
            <option <?php if($instructor['idInstructor'] == $curso->getIns_idInstructor()){ echo 'Selected';}?> value="<?php echo $instructor['idInstructor']; ?>"><?php echo $instructor['nombreInstructor']." ".$instructor['apellidoI1']." ".$instructor['apellidoI2']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Costo</label>
    <input class="form-control" type="number" min="0.00" step="0.01" name="costo" value="<?php echo $curso->getCosto()?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcion" cols="100" rows="5"><?php echo $curso->getDescripcion()?></textarea>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarCursos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>
<script>
    
</script>

    <?php }?>