<?php
    require_once '../class/Solbecas.php';
    require_once '../class/AutBec.php';
    require_once '../class/Pagos.php';
    include('../template/Header.php');

    $idAut = (isset($_REQUEST['idAut'])) ? $_REQUEST['idAut']: null;
    $solb = Solbecas::recuperarTodos();
    $pagos = Pagos::recuperarTodos();


    if($idAut){
        $aut = AutBec::buscarPorId($idAut);
    }else{
        $aut = new AutBec();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idAut = (isset($_REQUEST['idAut'])) ? $_REQUEST['idAut']: null;
        $sol = (isset($_REQUEST['sol'])) ? $_REQUEST['sol']: null;
        $pago = (isset($_REQUEST['pago'])) ? $_REQUEST['pago']: null;
        $monpag = (isset($_REQUEST['monpag'])) ? $_REQUEST['monpag']: null;
        if($ins = AutBec::buscarPorId($idAut)){
            $aut = new AutBec($idAut, $sol, $pago, $monpag);
            $msj = $aut->actualizar();
            if($msj){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarAutbeca.php?idAut='.$idAut.'"</script>';
            }else{
                header('Location: listarAutbecas.php');
            }
        }else{
            $aut = new AutBec($idAut, $sol, $pago, $monpag);
            $msj = $aut->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarAutbeca.php"</script>';
            }else{
                header('Location: listarAutbecas.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idAut'])){ echo 'Editar Solicitud: N°'.$aut->getIdAut();}else{ echo "Nueva Solicitud";}?></h1>
<form action="guardarAutbeca.php" method="POST">
    <div class="row">
    <?php if($aut->getIdAut()){?>
        <input class="form-control" type="hidden" name="idAut" value="<?php echo $aut->getIdAut()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Solicitud</label>
    <select class="form-control" name="sol">
        <option value="">Selecciona</option>
        <?php foreach($solb as $s):?>
            <option <?php if($s['idSol'] == $aut->getAutSol()){ echo 'Selected';}?> value="<?php echo $s['idSol']; ?>"><?php echo $s['nombreAlumno']." ".$s['apellido1']." ".$s['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
    <select class="form-control" name="pago">
        <option value="">Selecciona</option>
        <?php foreach($pagos as $b):?>
            <option <?php if($b['idPago'] == $aut->getPagosb_idPago()){ echo 'Selected';}?> value="<?php echo $b['idPago']; ?>"><?php echo $b['pago']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Descuento</label>
    <input class="form-control" type="number" name="monpag" value="<?php echo $aut->getMonpag()?>">
    </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarAutbecas.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>