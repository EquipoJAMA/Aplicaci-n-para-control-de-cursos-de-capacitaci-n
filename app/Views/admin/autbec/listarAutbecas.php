<?php
    require_once '../class/AutBec.php';
    include('../template/Header.php');
    $autbecas = AutBec::recuperarTodos();
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarAutbeca.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($autbecas)>0):?>
        <tr>
            <td>Becado</td>
            <td>Pago</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($autbecas as $in):?>
        <tr>
            <td><?php echo $in['nombreAlumno']." ".$in['apellido1']." ".$in['apellido2'] ?></td>
            <td><?php echo $in['monpag']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarAutbeca.php" method="POST"><input type="hidden" name="idAut" value="<?php echo $in['idAut']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarAutbeca.php" method="GET"><input type="hidden" name="idAut" value="<?php echo $in['idAut']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay aceptados agregadas</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>