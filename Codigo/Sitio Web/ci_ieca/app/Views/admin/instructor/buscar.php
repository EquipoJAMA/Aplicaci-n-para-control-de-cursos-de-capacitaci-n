<?php 
require_once '../class/Instructor.php';
if(isset($_REQUEST['id'])){
    $instructor = Instructor::buscarPorId($_REQUEST['id']);
    if($instructor != null){
        echo '<script>if(confirm("Mensaje: \nEl ID: '.$instructor->getIdInstructor().' ya existe por lo que se le redireccionara al apartado de edición \n¿Esta de acuerdo?")){ window.location.href="guardarInstructor.php?idInstructor='.$instructor->getIdInstructor().'"}else{ alert("Por favor ingrese un ID que no exista"); document.getElementById("id").value="";}</script>';
    }
}

?>