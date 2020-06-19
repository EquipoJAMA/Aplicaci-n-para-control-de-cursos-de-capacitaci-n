<?php
    require_once '../class/Instructor.php';

    $idInstructor = (isset($_REQUEST['idInstructor'])) ? $_REQUEST['idInstructor'] : null;

    if($idInstructor){
        $instructor = Instructor::buscarPorId($idInstructor);
        if($instructor->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarInstructores.php";</script>';    
        }else{
            header('Location: listarInstructores.php');
        }
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarInstructores.php";</script>';
    }
?>