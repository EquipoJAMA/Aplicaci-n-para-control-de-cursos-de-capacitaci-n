<?php 
require_once '../class/Cursos.php';
if(isset($_REQUEST['id'])){
    $curso = Cursos::buscarPorId($_REQUEST['id']);
    if($curso != null){
        echo '<script>if(confirm("Mensaje: \nEl ID: '.$curso->getIdCursos().' ya existe por lo que se le redireccionara al apartado de edición \n¿Esta de acuerdo?")){ window.location.href="guardarCurso.php?idCursos='.$curso->getIdCursos().'"}else{ alert("Por favor ingrese un ID que no exista"); document.getElementById("id").value="";}</script>';
    }
}

?>