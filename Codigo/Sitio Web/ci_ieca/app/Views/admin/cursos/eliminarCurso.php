<?php
    require_once '../class/Cursos.php';

    $idCursos = (isset($_REQUEST['idCursos'])) ? $_REQUEST['idCursos'] : null;

    if($idCursos){
        $curso = Cursos::buscarPorId($idCursos);
        unlink($curso->getImgCurso());
        if($curso->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarCursos.php";</script>';
        }else{
            header('Location: listarCursos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarCursos.php"</script>';
    }
?>