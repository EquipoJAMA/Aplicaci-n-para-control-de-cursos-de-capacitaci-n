<?php
    require_once '../class/Solbecas.php';

    $idSol = (isset($_REQUEST['idSol'])) ? $_REQUEST['idSol'] : null;

    if($idSol){
        $solb = Solbecas::buscarPorId($idSol);
        if($solb->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarSolbecas.php";</script>';
        }else{
            header('Location: listarSolbecas.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarSolbecas.php"</script>';
    }
?>