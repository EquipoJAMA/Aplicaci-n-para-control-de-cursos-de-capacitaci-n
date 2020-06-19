<?php
    require_once '../class/Horario.php';

    $idHorario = (isset($_REQUEST['idHorario'])) ? $_REQUEST['idHorario'] : null;

    if($idHorario){
        $horario = Horario::buscarPorId($idHorario);
        if($horario->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarHorarios.php";</script>';
        }else{
            header('Location: listarHorarios.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarHorarios.php"</script>';
    }
?>