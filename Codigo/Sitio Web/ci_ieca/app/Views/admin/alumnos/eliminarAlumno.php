<?php
    require_once '../class/Alumnos.php';

    $curp = (isset($_REQUEST['curp'])) ? $_REQUEST['curp'] : null;

    if($curp){
        $alumno = Alumnos::buscarPorCurp($curp);
        if($alumno->eliminar() == false){
            echo '<script>alert("No se puede eliminar porque este registro esta enlazado a otra tabla"); window.location.href="listarAlumnos.php";</script>';
        }else{
            header('Location: listarAlumnos.php');
        }
        
    }else{
        echo '<script>alert("Algo salio mal"); window.location.href="listarAlumnos.php"</script>';
    }
?>