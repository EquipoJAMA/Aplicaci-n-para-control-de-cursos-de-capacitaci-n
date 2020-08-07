<?php $session = session();?>
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
            <td>
                <button class="btn btn-danger" onclick="deleteSchedule(<?= $hr['idHorario']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformSchedule(<?= $hr['idHorario']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay horarios agregados</p>
    <?php endif;?>