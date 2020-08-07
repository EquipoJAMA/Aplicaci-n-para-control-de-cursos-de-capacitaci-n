<?php $session = session();?>
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
            <td>
                <button class="btn btn-danger" onclick="deleteCurso(<?= $hr['idCursos']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformCurso(<?= $hr['idCursos']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay cursos agregados</p>
    <?php endif;?>