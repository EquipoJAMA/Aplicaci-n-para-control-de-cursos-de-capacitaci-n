<?php
    require_once '../class/Instructor.php';
    $instructor = Instructor::recuperarTodos();
    include('../template/Header.php');
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarInstructor.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($instructor)>0):?>
        <tr>
            <td>Nombre</td>
            <td>Especialidad</td>
            <td>Tipo</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($instructor as $person):?>
        <tr>
            <td><?php echo $person['nombreInstructor']." ".$person['apellidoI1']." ".$person['apellidoI2']?></td>
            <td><?php echo $person['especialidad']?></td>
            <td><?php echo $person['tipo']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarInstructor.php" method="POST"><input type="hidden" name="idInstructor" value="<?php echo $person['idInstructor']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarInstructor.php" method="GET"><input type="hidden" name="idInstructor" value="<?php echo $person['idInstructor']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay instructores agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>