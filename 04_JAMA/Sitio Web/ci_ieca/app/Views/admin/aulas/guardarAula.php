<?php
    require_once '../class/Aulas.php';
    include('../template/Header.php');

    $idAula = (isset($_REQUEST['idAula'])) ? $_REQUEST['idAula']: null;


    if($idAula){
        $aulas = Aulas::buscarPorId($idAula);
    }else{
        $aulas = new Aulas();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idAula = (isset($_REQUEST['idAula'])) ? $_REQUEST['idAula']: null;
        $nombreAula = (isset($_REQUEST['nombreAula'])) ? $_REQUEST['nombreAula']: null;
        $estatusAula = (isset($_REQUEST['estatusAula'])) ? $_REQUEST['estatusAula']: null;
        if($ins = Aulas::buscarPorId($idAula)){
            $aulas = new Aulas($idAula, $nombreAula, $estatusAula);
            $msj = $aulas->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarAula.php?idAula='.$idAula.'"</script>';
            }else{
                header('Location: listarAulas.php');
            }
        }else{
            $aulas = new Aulas($idAula, $nombreAula, $estatusAula);
            $msj = $aulas->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarAula.php"</script>';
            }else{
                header('Location: listarAulas.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idAula'])){ echo 'Editar Aula: '.$aulas->getNombreAula();}else{ echo "Nueva Aula";}?></h1>
<form action="guardarAula.php" method="POST">
    <div class="row">
    <?php if($aulas->getIdAula()){?>
        <input class="form-control" type="hidden" name="idAula" value="<?php echo $aulas->getIdAula()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Nombre del aula</label>
    <input type="text" name="nombreAula" class="form-control" value="<?php echo $aulas->getNombreAula()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estatusAula" id="">
        <option value="">Selecciona</option>
        <option <?php if($aulas->getEstatusAula() == 'Disponible'){ echo 'Selected'; } ?> value="<?php echo "Disponible"; ?>">Disponible</option>
        <option <?php if($aulas->getEstatusAula() == 'No disponible'){ echo 'Selected'; } ?> value="<?php echo "No disponible"; ?>">No disponible</option>
    </select>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarAulas.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>