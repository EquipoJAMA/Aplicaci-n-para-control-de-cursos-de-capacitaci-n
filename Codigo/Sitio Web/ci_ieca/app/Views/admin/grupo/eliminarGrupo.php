<?php
    require_once '../class/Grupo.php';

    $idGrupo = (isset($_REQUEST['idGrupo'])) ? $_REQUEST['idGrupo'] : null;

    if($idGrupo){
        $grupo = Grupo::buscarPorId($idGrupo);
        if($grupo->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarGrupos.php";</script>';
        }else{
            header('Location: listarGrupos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarGrupos.php"</script>';
    }
?>