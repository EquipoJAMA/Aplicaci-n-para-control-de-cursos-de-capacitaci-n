<?php
    require_once '../class/Aulas.php';
    include('../template/Header.php');
    $aulas = Aulas::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarAula.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($aulas)>0):?>
        <tr>
            <td>Nombre Aula</td>
            <td>Estatus</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($aulas as $in):?>
        <tr>
            <td><?php echo $in['nombreAula']?></td>
            <td><?php echo $in['estatusAula']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarAula.php" method="POST"><input type="hidden" name="idAula" value="<?php echo $in['idAula']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarAula.php" method="GET"><input type="hidden" name="idAula" value="<?php echo $in['idAula']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay aulas agregadas</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>