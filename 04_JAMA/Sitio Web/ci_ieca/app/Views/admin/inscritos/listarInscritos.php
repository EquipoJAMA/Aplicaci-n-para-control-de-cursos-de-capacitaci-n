<?php
    require_once '../class/Inscritos.php';
    include('../template/Header.php');
    $inscritos = Inscritos::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarInscrito.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($inscritos)>0):?>
        <tr>
            <td>Grupo</td>
            <td>Alumno</td>
            <td>Pago</td>
            <td>Estatus</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($inscritos as $in):?>
        <tr>
            <td><?php echo $in['nombre_curso']?></td>
            <td><?php echo $in['nombreAlumno']." ".$in['apellido1']." ".$in['apellido2']?></td>
            <td><?php echo $in['pago']?></td>
            <td><?php echo $in['estatusP']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarInscrito.php" method="POST"><input type="hidden" name="idInscrito" value="<?php echo $in['idInscrito']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarInscrito.php" method="GET"><input type="hidden" name="idInscrito" value="<?php echo $in['idInscrito']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay inscritos creados agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>