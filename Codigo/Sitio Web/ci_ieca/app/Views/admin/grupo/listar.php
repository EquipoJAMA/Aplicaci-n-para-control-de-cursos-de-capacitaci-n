<?php $session = session();?>
<table class="table table-bordered table-striped table-condesed" id="id=hidden-table-info">
    <thead>
    <?php if(count($grupo)>0):?>
        <tr>
            <td>Grupo</td>
            <td>Curso</td>
            <td>Fecha Inicio</td>
            <td>Fecha Termino</td>
            <td>Estatus</td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td></td>
            <?php }?>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($grupo as $hr):?>
        <tr>
            <td><?php echo $hr['idGrupo']?></td>
            <td><?php echo $hr['nombre_curso']?></td>
            <td><?php echo $hr['fechaInicio']?></td>
            <td><?php echo $hr['fechaTermino']?></td>
            <td><?php echo $hr['estatusGr']//if($hr['estatusGr'] == 1 ){ echo "Activo";}else{ echo "Inactivo";}?></td>
            <?php if($_SESSION['privilegios'] > 1){ echo ' ';}else{?>
            <td>
                <button class="btn btn-danger" onclick="deleteGrupo(<?= $hr['idGrupo']?>);" title="Eliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <?php }?>
            <td>
                <button class="btn btn-primary" onclick="showformGrupo(<?= $hr['idGrupo']?>)" title="Actualizar">
                    <i class="fa fa-pencil"></i>
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    <?php else:?>
        <p>No hay grupos creados agregados</p>
    <?php endif;?>