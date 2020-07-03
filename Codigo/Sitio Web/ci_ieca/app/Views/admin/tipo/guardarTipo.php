<?php
    require_once '../class/Tipo.php';
    include('../template/Header.php');

    $idTipInst = (isset($_REQUEST['idTipInst'])) ? $_REQUEST['idTipInst']: null;


    if($idTipInst){
        $tipos = Tipo::buscarPorId($idTipInst);
    }else{
        $tipos = new Tipo();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idTipInst = (isset($_REQUEST['idTipInst'])) ? $_REQUEST['idTipInst']: null;
        $tipo = (isset($_REQUEST['tipo'])) ? $_REQUEST['tipo']: null;
        $descripcionTip = (isset($_REQUEST['descripcionTip'])) ? $_REQUEST['descripcionTip']: null;
        if($ins = Tipo::buscarPorId($idTipInst)){
            $tipos = new Tipo($idTipInst, $tipo, $descripcionTip);
            $msj = $tipos->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarTipo.php?idTipInst='.$idTipInst.'"</script>';
            }else{
                header('Location: listarTipos.php');
            }
        }else{
            $tipos = new Tipo($idTipInst, $tipo, $descripcionTip);
            $msj = $tipos->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarTipo.php"</script>';
            }else{
                header('Location: listarTipos.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idTipInst'])){ echo 'Editar Tipo: '.$tipos->getTipo();}else{ echo "Nuevo Tipo de instructor";}?></h1>
<form action="guardarTipo.php" method="POST">
    <div class="row">
    <?php if($tipos->getIdTipInst()){?>
        <input class="form-control" type="hidden" name="idTipInst" value="<?php echo $tipos->getIdTipInst()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Tipo</label>
    <input type="text" name="tipo" class="form-control" value="<?php echo $tipos->getTipo()?>">
    </div>
    <div class="form-group col-md-12">
    <label for="">Descripcion</label>
    <textarea class="form-control" name="descripcionTip" cols="100" rows="5"><?php echo $tipos->getDescripcionTip()?></textarea>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarTipos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>