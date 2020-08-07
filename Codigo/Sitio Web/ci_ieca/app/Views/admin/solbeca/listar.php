<?php $session = session();?>
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
            <td>
                <button class="btn btn-danger" onclick="deleteSolBeca(<?= $in['idSol']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformSolBeca(<?= $in['idSol']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay solicitantes agregadas</p>
    <?php endif;?>