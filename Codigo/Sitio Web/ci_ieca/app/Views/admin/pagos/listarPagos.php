<?php
    require_once '../class/Pagos.php';
    include('../template/Header.php');
    $pagos = Pagos::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarPago.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($pagos)>0):?>
        <tr>
            <td>Curso</td>
            <td>Nombre</td>
            <td>Fecha de pago</td>
            <td>Estatus del pago</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($pagos as $in):?>
        <tr>
            <td><img height="100" width="200" src="<?php echo "../cursos/".$in['imgcurso']?>" alt=""></td>
            <td><?php echo $in['nombre_curso']?></td>
            <td><?php echo $in['fechaP']?></td>
            <td><?php echo $in['estatusP']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarPago.php" method="POST"><input type="hidden" name="idPago" value="<?php echo $in['idPago']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarPago.php" method="GET"><input type="hidden" name="idPago" value="<?php echo $in['idPago']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay pagos agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>