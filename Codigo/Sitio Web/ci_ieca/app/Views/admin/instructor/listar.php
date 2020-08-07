<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($instructor)>0):?>
        <tr>
            <td>Nombre</td>
            <td>Especialidad</td>
            <td>Tipo</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($instructor as $person):?>
        <tr>
            <td><?php echo $person['nombreInstructor']." ".$person['apellidoI1']." ".$person['apellidoI2']?></td>
            <td><?php echo $person['especialidad']?></td>
            <td><?php echo $person['tipo']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteInstructor(<?= $person['idInstructor']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformInstructor(<?= $person['idInstructor']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay instructores agregados</p>
    <?php endif;?>