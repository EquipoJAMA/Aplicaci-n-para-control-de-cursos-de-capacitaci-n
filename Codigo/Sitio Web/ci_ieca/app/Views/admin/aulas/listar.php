<?php $session = session();?>
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
                <td>
                <button class="btn btn-danger" onclick="deleteAula(<?= $in['idAula']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformAula(<?= $in['idAula']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay aulas agregadas</p>
    <?php endif;?>