<?php
    require_once '../class/Solbecas.php';
    include('../template/Header.php');
    $solbecas = Solbecas::recuperarTodos();
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarSolbeca.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($solbecas)>0):?>
        <tr>
            <td>Aspirante</td>
            <td>Beca</td>
            <td>Estado de solicitud</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($solbecas as $in):?>
        <tr>
            <td><?php echo $in['nombreAlumno']." ".$in['apellido1']." ".$in['apellido2'] ?></td>
            <td><?php echo $in['nomBeca']?></td>
            <td><?php echo $in['estsol']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarSolbeca.php" method="POST"><input type="hidden" name="idSol" value="<?php echo $in['idSol']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarSolbeca.php" method="GET"><input type="hidden" name="idSol" value="<?php echo $in['idSol']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay solicitantes agregadas</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>