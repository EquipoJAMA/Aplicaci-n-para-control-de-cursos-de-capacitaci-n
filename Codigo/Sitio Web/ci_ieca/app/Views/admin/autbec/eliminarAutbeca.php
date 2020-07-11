<?php
    require_once '../class/AutBec.php';

    $idAut = (isset($_REQUEST['idAut'])) ? $_REQUEST['idAut'] : null;

    if($idAut){
        $aut = AutBec::buscarPorId($idAut);
        if($aut->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarAutbecas.php";</script>';
        }else{
            header('Location: listarAutbecas.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarAutbecas.php"</script>';
    }
?>