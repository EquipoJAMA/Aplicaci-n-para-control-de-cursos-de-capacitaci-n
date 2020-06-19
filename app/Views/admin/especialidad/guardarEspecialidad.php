<?php
    require_once '../class/Especialidad.php';
    include('../template/Header.php');

    $idEspInst = (isset($_REQUEST['idEspInst'])) ? $_REQUEST['idEspInst']: null;


    if($idEspInst){
        $especialidades = Especialidad::buscarPorId($idEspInst);
    }else{
        $especialidades = new Especialidad();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idEspInst = (isset($_REQUEST['idEspInst'])) ? $_REQUEST['idEspInst']: null;
        $especialidad = (isset($_REQUEST['especialidad'])) ? $_REQUEST['especialidad']: null;
        $descripcionEsp = (isset($_REQUEST['descripcionEsp'])) ? $_REQUEST['descripcionEsp']: null;
        if($ins = Especialidad::buscarPorId($idEspInst)){
            $especialidades = new Especialidad($idEspInst, $especialidad, $descripcionEsp);
            $msj = $especialidades->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarEspecialidad.php?idEspInst='.$idEspInst.'"</script>';
            }else{
                header('Location: listarEspecialidades.php');
            }
        }else{
            $especialidades = new Especialidad($idEspInst, $especialidad, $descripcionEsp);
            $msj = $especialidades->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarEspecialidad.php"</script>';
            }else{
                header('Location: listarEspecialidades.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idEspInst'])){ echo 'Editar Especialidad: '.$especialidades->getEspecialidad();}else{ echo "Nueva Especialidad de instructor";}?></h1>
<form action="guardarEspecialidad.php" method="POST">
    <div class="row">
    <?php if($especialidades->getIdEspInst()){?>
        <input class="form-control" type="hidden" name="idEspInst" value="<?php echo $especialidades->getIdEspInst()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Especialidad</label>
    <input type="text" name="especialidad" class="form-control" value="<?php echo $especialidades->getEspecialidad()?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcionEsp" cols="100" rows="5"><?php echo $especialidades->getDescripcionEsp()?></textarea>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarEspecialidades.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>