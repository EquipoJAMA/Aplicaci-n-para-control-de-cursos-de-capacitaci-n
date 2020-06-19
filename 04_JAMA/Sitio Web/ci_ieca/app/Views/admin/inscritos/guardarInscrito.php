<?php
    require_once '../class/Inscritos.php';
    require_once '../class/Grupo.php';
    require_once '../class/Alumnos.php';
    require_once '../class/Pagos.php';
    include('../template/Header.php');

    $idInscrito = (isset($_REQUEST['idInscrito'])) ? $_REQUEST['idInscrito']: null;
    $alumnos = Alumnos::recuperarTodos();
    $grupo = Grupo::recuperarTodos();
    $pagos = Pagos::recuperarTodos();

    if($idInscrito){
        $inscrito = Inscritos::buscarPorId($idInscrito);
    }else{
        $inscrito = new Inscritos();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idInscrito = (isset($_REQUEST['idInscrito'])) ? $_REQUEST['idInscrito']: null;
        $grupo_idGrupo = (isset($_REQUEST['grupo_idGrupo'])) ? $_REQUEST['grupo_idGrupo']: null;
        $alumnos_curp = (isset($_REQUEST['alumnos_curp'])) ? $_REQUEST['alumnos_curp']: null;
        $pago = (isset($_REQUEST['pago'])) ? $_REQUEST['pago']: null;
        if($ins = Inscritos::buscarPorId($idInscrito)){
            $inscrito = new Inscritos($idInscrito, $grupo_idGrupo, $alumnos_curp, $pago);
            $msj = $inscrito->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarInscrito.php?idInscrito='.$idInscrito.'"</script>';
            }else{
                header('Location: listarInscritos.php');
            }
        }else{
            $inscrito = new Inscritos($idInscrito, $grupo_idGrupo, $alumnos_curp, $pago);
            $msj = $inscrito->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarInscrito.php"</script>';
            }else{
                header('Location: listarInscritos.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idInscrito'])){ echo 'Editar inscrito: '.$inscrito->getIdInscrito();}else{ echo "Nuevo Inscrito";}?></h1>
<form action="guardarInscrito.php" method="POST">
    <div class="row">
        <input class="form-control" type="hidden" name="idInscrito" value="<?php echo $inscrito->getIdInscrito()?>"/>
    <div class="form-group col-md-4">
    <label for="">Grupo</label>
    <select class="form-control" name="grupo_idGrupo">
        <option value="">Selecciona</option>
        <?php foreach($grupo as $ins):?>
            <option <?php if($ins['idGrupo'] == $inscrito->getGrupo_IdGrupo()){ echo 'Selected';}?> value="<?php echo $ins['idGrupo']; ?>"><?php echo $ins['nombre_curso']." Num. Grupo: ".$ins['idGrupo']; ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Alumno</label>
    <select class="form-control" name="alumnos_curp">
        <option value="">Selecciona</option>
        <?php foreach($alumnos as $alu):?>
            <option <?php if($alu['curp'] == $inscrito->getAlumnos_Curp()){ echo 'Selected';}?> value="<?php echo $alu['curp']; ?>"><?php echo $alu['nombreAlumno']." ".$alu['apellido1']." ".$alu['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Pago</label>
        <select name="pago" id="" class="form-control">
            <option value="">Selecciona</option>
            <?php foreach($pagos as $p):?>
            <option <?php if($p['idPago'] == $inscrito->getPagos_idPago()){ echo 'Selected'; } ?> value="<?php echo $p['idPago']?>"><?php echo $p['pago'] ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarInscritos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>