<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($pagos)>0):?>
        <tr>
            <td>Curso</td>
            <td>Nombre</td>
            <td>Fecha de pago</td>
            <td>Estatus del pago</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($pagos as $in):?>
        <tr>
            <td><img height="100" width="200" src="<?php echo base_url('vendor/template/'.$in['imgcurso']);?>" alt=""></td>
            <td><?php echo $in['nombre_curso']?></td>
            <td><?php echo $in['fechaP']?></td>
            <td><?php echo $in['estatusP']?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deletePago(<?= $in['idPago']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformPago(<?= $in['idPago']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay pagos agregados</p>
    <?php endif;?>