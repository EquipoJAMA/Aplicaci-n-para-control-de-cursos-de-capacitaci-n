<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($becas)>0):?>
        <tr>
            <td>Beca</td>
            <td>Ayuda de</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($becas as $in):?>
        <tr>
            <td><?php echo $in['nomBeca']?></td>
            <td><?php echo "$".$in['mondes']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteBeca(<?= $in['idBeca']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformBeca(<?= $in['idBeca']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay becas agregadas</p>
    <?php endif;?>