<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($inscritos)>0):?>
        <tr>
            <td>Grupo</td>
            <td>Alumno</td>
            <td>Pago</td>
            <td>Estatus</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($inscritos as $in):?>
        <tr>
            <td><?php echo $in['nombre_curso']?></td>
            <td><?php echo $in['nombreAlumno']." ".$in['apellido1']." ".$in['apellido2']?></td>
            <td><?php echo $in['pago']?></td>
            <td><?php echo $in['estatusP']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteInscrito(<?= $in['idInscrito']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformInscrito(<?= $in['idInscrito']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay inscritos creados agregados</p>
    <?php endif;?>