<?php
    require_once '../class/Especialidad.php';
    include('../template/Header.php');
    $Especialidad = Especialidad::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarEspecialidad.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($Especialidad)>0):?>
        <tr>
            <td>Tipo</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($Especialidad as $in):?>
        <tr>
            <td><?php echo $in['especialidad']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarEspecialidad.php" method="POST"><input type="hidden" name="idEspInst" value="<?php echo $in['idEspInst']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarEspecialidad.php" method="GET"><input type="hidden" name="idEspInst" value="<?php echo $in['idEspInst']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay especialidades agregadas</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>