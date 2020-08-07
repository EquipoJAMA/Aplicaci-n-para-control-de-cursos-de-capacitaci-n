<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($alumno)>0):?>
        <tr>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Código postal</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($alumno as $person):?>
        <tr>
            <td><?php echo $person['nombreAlumno']?></td>
            <td><?php echo $person['apellido1']?></td>
            <td><?php echo $person['apellido2']?></td>
            <td><?php echo $person['cpAl']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteAlumno('<?= $person['curp']?>');" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php } ?>
            <td>
                <button class="btn btn-primary" onclick="showformAlumno('<?= $person['curp']?>');" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay alumnos agregados</p>
    <?php endif;?>