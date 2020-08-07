<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($autbecas)>0):?>
        <tr>
            <td>Becado</td>
            <td>Pago</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <!--<td></td>-->
        </tr>
    </thead>
    <tbody>
    <?php foreach($autbecas as $in):?>
        <tr>
            <td><?php echo $in['nombreAlumno']." ".$in['apellido1']." ".$in['apellido2'] ?></td>
            <td><?php echo $in['monpag']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteAutBeca(<?= $in['idAut']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <!--<button class="btn btn-primary" onclick="showformAutBeca(<?php // $in['idAut']?>);" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>-->
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay aceptados agregadas</p>
    <?php endif;?>