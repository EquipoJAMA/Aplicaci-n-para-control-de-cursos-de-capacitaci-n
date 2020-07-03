<?php
    require_once '../class/Grupo.php';
    include('../template/Header.php');
    $grupo = Grupo::recuperarTodos();
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarGrupo.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($grupo)>0):?>
        <tr>
            <td>Grupo</td>
            <td>Curso</td>
            <td>Fecha Inicio</td>
            <td>Fecha Termino</td>
            <td>Estatus</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($grupo as $hr):?>
        <tr>
            <td><?php echo $hr['idGrupo']?></td>
            <td><?php echo $hr['nombre_curso']?></td>
            <td><?php echo $hr['fechaInicio']?></td>
            <td><?php echo $hr['fechaTermino']?></td>
            <td><?php if($hr['estatusGr'] == 1 ){ echo "Activo";}else{ echo "Inactivo";}?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarGrupo.php" method="POST"><input type="hidden" name="idGrupo" value="<?php echo $hr['idGrupo']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarGrupo.php" method="GET"><input type="hidden" name="idGrupo" value="<?php echo $hr['idGrupo']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay grupos creados agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>