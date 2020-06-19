<?php 
require_once '../class/Alumnos.php';
if(isset($_REQUEST['id'])){
    $alumno = Alumnos::buscarPorCurp($_REQUEST['id']);
    if($alumno != null){
        echo '<script>if(confirm("Mensaje: \nEl CURP: '.$alumno->getCurp().' ya existe por lo que se le redireccionara al apartado de edición \n¿Esta de acuerdo?")){ window.location.href="guardarAlumno.php?curp='.$alumno->getCurp().'"}else{ alert("Por favor ingrese un CURP que no exista"); document.getElementById("id").value="";}</script>';
    }
}

?>