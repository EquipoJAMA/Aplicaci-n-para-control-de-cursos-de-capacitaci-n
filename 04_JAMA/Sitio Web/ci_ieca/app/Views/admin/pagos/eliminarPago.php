<?php
    require_once '../class/Pagos.php';

    $idPago = (isset($_REQUEST['idPago'])) ? $_REQUEST['idPago'] : null;

    if($idPago){
        $pagos = Pagos::buscarPorId($idPago);
        if($pagos->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarPagos.php";</script>';
        }else{
            header('Location: listarPagos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarPagos.php"</script>';
    }
?>