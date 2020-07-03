<?php
    require_once '../class/Tipo.php';
    include('../template/Header.php');
    $tipo = Tipo::recuperarTodos();

?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarTipo.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($tipo)>0):?>
        <tr>
            <td>Tipo</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($tipo as $in):?>
        <tr>
            <td><?php echo $in['tipo']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarTipo.php" method="POST"><input type="hidden" name="idTipInst" value="<?php echo $in['idTipInst']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarTipo.php" method="GET"><input type="hidden" name="idTipInst" value="<?php echo $in['idTipInst']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay tipos de instructores agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>