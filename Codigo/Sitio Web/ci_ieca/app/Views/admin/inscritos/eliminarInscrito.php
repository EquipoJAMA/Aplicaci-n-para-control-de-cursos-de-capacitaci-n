<?php
    require_once '../class/Inscritos.php';

    $idInscrito = (isset($_REQUEST['idInscrito'])) ? $_REQUEST['idInscrito'] : null;

    if($idInscrito){
        $inscrito = Inscritos::buscarPorId($idInscrito);
        if($inscrito->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarInscritos.php";</script>';
        }else{
            header('Location: listarInscritos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarInscritos.php"</script>';
    }
?>