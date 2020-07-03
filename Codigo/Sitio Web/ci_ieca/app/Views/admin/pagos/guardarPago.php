<?php
    require_once '../class/Pagos.php';
    require_once '../class/Cursos.php';
    include('../template/Header.php');

    $idPago = (isset($_REQUEST['idPago'])) ? $_REQUEST['idPago']: null;
    $cursos = Cursos::recuperarTodos();

    if($idPago){
        $pagos = Pagos::buscarPorId($idPago);
    }else{
        $pagos = new Pagos();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idPago = (isset($_REQUEST['idPago'])) ? $_REQUEST['idPago']: null;
        $idCurso = (isset($_REQUEST['id_cur'])) ? $_REQUEST['id_cur']: null;
        $pago = (isset($_REQUEST['pago'])) ? $_REQUEST['pago']: null;
        $fechaP = (isset($_REQUEST['fechaP'])) ? $_REQUEST['fechaP']: null;
        $estatusP = (isset($_REQUEST['estatusP'])) ? $_REQUEST['estatusP']: null;
        if($ins = Pagos::buscarPorId($idPago)){
            $pagos = new Pagos($idPago, $idCurso, $pago, $fechaP, $estatusP);
            $msj = $pagos->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarPago.php?idPago='.$idPago.'"</script>';
            }else{
                header('Location: listarPagos.php');
            }
        }else{
            $pagos = new Pagos($idPago, $idCurso, $pago, $fechaP, $estatusP);
            $msj = $pagos->guardar();
            var_dump($msj);
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarPago.php"</script>';
            }else{
                header('Location: listarPagos.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idPago'])){ echo 'Editar Pago: ';}else{ echo "Nuevo Pago";}?></h1>
<form action="guardarPago.php" method="POST">
    <div class="row">
    <?php if($pagos->getIdPago()){?>
        <input class="form-control" type="hidden" name="idPago" value="<?php echo $pagos->getIdPago()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Curso</label>
    <select class="form-control" name="id_cur">
        <option value="">Selecciona</option>
        <?php foreach($cursos as $curso):?>
            <option <?php if($curso['idCursos'] == $pagos->getId_Cur()){ echo 'Selected';}?> value="<?php echo $curso['idCursos']; ?>"><?php echo $curso['nombre_curso']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
        <label for="">Fecha de pago</label>
        <input type="date" name="fechaP" value="<?php echo $pagos->getFechaP() ?>" class="form-control">
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
    <input type="number" name="pago" min="0.00" step="0.01" class="form-control" value="<?php echo $pagos->getPago()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estatusP" id="">
        <option value="">Selecciona</option>
        <option <?php if($pagos->getEstatusP() == 'Pagado'){ echo 'Selected'; } ?> value="<?php echo "Pagado"; ?>">Pagado</option>
        <option <?php if($pagos->getEstatusP() == 'No pagado'){ echo 'Selected'; } ?> value="<?php echo "No Pagado"; ?>">No Pagado</option>
    </select>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarPagos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>