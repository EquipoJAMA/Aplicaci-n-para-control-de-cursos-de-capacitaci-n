<?php
    require_once '../class/Tipo.php';

    $idTipInst = (isset($_REQUEST['idTipInst'])) ? $_REQUEST['idTipInst'] : null;

    if($idTipInst){
        $tipo = Tipo::buscarPorId($idTipInst);
        if($tipo->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarTipos.php";</script>';
        }else{
            header('Location: listarTipos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarTipos.php"</script>';
    }
?>