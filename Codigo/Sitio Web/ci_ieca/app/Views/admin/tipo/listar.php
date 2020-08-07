<?php
$session = session();
?>
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
            <td>
                <button class="btn btn-danger" onclick="deleteTypeInstructor(<?= $in['idTipInst']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformTypeInstructor(<?= $in['idTipInst']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay tipos de instructores agregados</p>
    <?php endif;?>