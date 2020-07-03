<?php
    require_once '../class/Becas.php';
    include('../template/Header.php');

    $idBeca = (isset($_REQUEST['idBeca'])) ? $_REQUEST['idBeca']: null;


    if($idBeca){
        $becas = Becas::buscarPorId($idBeca);
    }else{
        $becas = new Becas();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idBeca = (isset($_REQUEST['idBeca'])) ? $_REQUEST['idBeca']: null;
        $nombreBeca = (isset($_REQUEST['nombreBeca'])) ? $_REQUEST['nombreBeca']: null;
        $mondes = (isset($_REQUEST['mondes'])) ? $_REQUEST['mondes']: null;
        if($ins = Becas::buscarPorId($idBeca)){
            $becas = new Becas($idBeca, $nombreBeca, $mondes);
            $msj = $becas->actualizar();
            if($msj){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarBeca.php?idBeca='.$idBeca.'"</script>';
            }else{
                header('Location: listarBecas.php');
            }
        }else{
            $becas = new Becas($idBeca, $nombreBeca, $mondes);
            $msj = $becas->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarBeca.php"</script>';
            }else{
                header('Location: listarBecas.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idBeca'])){ echo 'Editar Beca: '.$becas->getNombreBeca();}else{ echo "Nueva Beca";}?></h1>
<form action="guardarBeca.php" method="POST">
    <div class="row">
    <?php if(!$idBeca){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label>
    <input class="form-control" <?php if($becas->getIdBeca()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idBeca" value="<?php echo $becas->getIdBeca()?>"/>
    </div>
    <?php }else{?>
    <input <?php if($becas->getIdBeca()){ echo 'type="hidden"';}?> name="idBeca" value="<?php echo $becas->getIdBeca()?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Nombre de la beca</label>
    <input type="text" name="nombreBeca" class="form-control" value="<?php echo $becas->getNombreBeca()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Descuento</label>
    <input type="number" name="mondes" min="0" class="form-control" value="<?php echo $becas->getMondes()?>">
    </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarBecas.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>