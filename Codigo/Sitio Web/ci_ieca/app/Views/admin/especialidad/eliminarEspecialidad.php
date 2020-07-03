<?php
    require_once '../class/Especialidad.php';

    $idEspInst = (isset($_REQUEST['idEspInst'])) ? $_REQUEST['idEspInst'] : null;

    if($idEspInst){
        $especialidad = Especialidad::buscarPorId($idEspInst);
        if($especialidad->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarEspecialidades.php";</script>';
        }else{
            header('Location: listarEspecialidades.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarEspecialidades.php"</script>';
    }
?>