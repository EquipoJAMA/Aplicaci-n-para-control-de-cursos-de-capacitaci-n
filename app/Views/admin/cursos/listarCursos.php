<?php
    require_once '../class/Cursos.php';
    include('../template/Header.php');
    $curso = Cursos::recuperarTodos();
?>
<section id="main-content">
    <div class="row">
    <div class="col-md-12">
    <form action="guardarCurso.php"><button class="btn btn-success">Nuevo</button></form>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($curso)>0):?>
        <tr>
            <td>Nombre Curso</td>
            <td>Fecha Inicio</td>
            <td>Fecha Termino</td>
            <td>Costo</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($curso as $hr):?>
        <tr>
            <td><?php echo $hr['nombre_curso']?></td>
            <td><?php echo $hr['fechaInicio']?></td>
            <td><?php echo $hr['fechaTermino']?></td>
            <td><?php echo $hr['costo']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td><form action="eliminarCurso.php" method="POST"><input type="hidden" name="idCursos" value="<?php echo $hr['idCursos']?>"><button class="btn btn-danger">Eliminar</button></form></td>
            <?php }?>
            <td><form action="guardarCurso.php" method="GET"><input type="hidden" name="idCursos" value="<?php echo $hr['idCursos']?>"><button class="btn btn-primary">Actualizar</button></form></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay cursos agregados</p>
    <?php endif;?>
    </div>
    </div>
</section>
</body>
</html>