<?php
    require_once '../class/Horario.php';
    $horario = Horario::recuperarTodos();
    include('../template/Header.php');
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarHorario.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($horario)>0):?>
        <tr>
            <td>Horario Inicio</td>
            <td>Horario Termino</td>
            <td>dia</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($horario as $hr):?>
        <tr>
            <td><?php echo $hr['horaInicio']?></td>
            <td><?php echo $hr['horaTermino']?></td>
            <td><?php echo $hr['dias']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarHorario.php" method="POST"><input type="hidden" name="idHorario" value="<?php echo $hr['idHorario']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarHorario.php" method="GET"><input type="hidden" name="idHorario" value="<?php echo $hr['idHorario']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay horarios agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>