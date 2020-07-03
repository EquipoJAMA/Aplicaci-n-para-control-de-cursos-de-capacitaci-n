<?php
    require_once '../class/Becas.php';
    include('../template/Header.php');
    $becas = Becas::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarBeca.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($becas)>0):?>
        <tr>
            <td>Nombre beca</td>
            <td>Ayuda de</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($becas as $in):?>
        <tr>
            <td><?php echo $in['nomBeca']?></td>
            <td><?php echo "$".$in['mondes']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarBeca.php" method="POST"><input type="hidden" name="idBeca" value="<?php echo $in['idBeca']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarBeca.php" method="GET"><input type="hidden" name="idBeca" value="<?php echo $in['idBeca']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay becas agregadas</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>