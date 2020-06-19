<?php
    require_once '../class/Becas.php';

    $idBeca = (isset($_REQUEST['idBeca'])) ? $_REQUEST['idBeca'] : null;

    if($idBeca){
        $beca = Becas::buscarPorId($idBeca);
        if($beca->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarBecas.php";</script>';
        }else{
            header('Location: listarBecas.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarBecas.php"</script>';
    }
?>