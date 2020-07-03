<?php
    require_once '../class/Alumnos.php';
    include('../template/Header.php');
    $alumno = Alumnos::recuperarTodos();
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarAlumno.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($alumno)>0):?>
        <tr>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Código postal</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($alumno as $person):?>
        <tr>
            <td><?php echo $person['nombreAlumno']?></td>
            <td><?php echo $person['apellido1']?></td>
            <td><?php echo $person['apellido2']?></td>
            <td><?php echo $person['cpAl']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarAlumno.php" method="POST"><input type="hidden" name="curp" value="<?php echo $person['curp']?>"><button  class="btn btn-danger">Eliminar</button></form></td>
            <?php } ?>
            <td><form action="guardarAlumno.php" method="GET"><input type="hidden" name="curp" value="<?php echo $person['curp']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay alumnos agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>