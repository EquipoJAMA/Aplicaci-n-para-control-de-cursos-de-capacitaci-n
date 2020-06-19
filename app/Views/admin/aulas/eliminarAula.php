<?php
    require_once '../class/Aulas.php';

    $idAula = (isset($_REQUEST['idAula'])) ? $_REQUEST['idAula'] : null;

    if($idAula){
        $aula = Aulas::buscarPorId($idAula);
        if($aula->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarAulas.php";</script>';
        }else{
            header('Location: listarAulas.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarAulas.php"</script>';
    }
?>