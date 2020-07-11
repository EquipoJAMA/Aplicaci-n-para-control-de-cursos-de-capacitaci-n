<?php
    require_once '../class/Solbecas.php';
    require_once '../class/Alumnos.php';
    require_once '../class/Becas.php';
    include('../template/Header.php');

    $idSol = (isset($_REQUEST['idSol'])) ? $_REQUEST['idSol']: null;
    $alumnos = Alumnos::recuperarTodos();
    $becas = Becas::recuperarTodos();


    if($idSol){
        $sol = Solbecas::buscarPorId($idSol);
    }else{
        $sol = new Solbecas();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idSol = (isset($_REQUEST['idSol'])) ? $_REQUEST['idSol']: null;
        $solalu = (isset($_REQUEST['solalu'])) ? $_REQUEST['solalu']: null;
        $becsol = (isset($_REQUEST['becsol'])) ? $_REQUEST['becsol']: null;
        $estsol = (isset($_REQUEST['estsol'])) ? $_REQUEST['estsol']: null;
        if($ins = Solbecas::buscarPorId($idSol)){
            $sol = new Solbecas($idSol, $solalu, $becsol, $estsol);
            $msj = $sol->actualizar();
            if($msj){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarSolbeca.php?idSol='.$idSol.'"</script>';
            }else{
                header('Location: listarSolbecas.php');
            }
        }else{
            $sol = new Solbecas($idSol, $solalu, $becsol, $estsol);
            $msj = $sol->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarSolbeca.php"</script>';
            }else{
                header('Location: listarSolbecas.php');
            }
        }
            
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idBeca'])){ echo 'Editar Solicitud: '.$sol->getIdSol();}else{ echo "Nueva Solicitud";}?></h1>
<form action="guardarSolbeca.php" method="POST">
    <div class="row">
    <?php if(!$idSol){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label>
    <input class="form-control" <?php if($sol->getIdSol()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idSol" value="<?php echo $sol->getIdSol()?>"/>
    </div>
    <?php }else{?>
    <input class="form-control" <?php if($sol->getIdSol()){ echo 'type="hidden"';}?> name="idSol" value="<?php echo $sol->getIdSol()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Alumno</label>
    <select class="form-control" name="solalu">
        <option value="">Selecciona</option>
        <?php foreach($alumnos as $alu):?>
            <option <?php if($alu['curp'] == $sol->getSolalu()){ echo 'Selected';}?> value="<?php echo $alu['curp']; ?>"><?php echo $alu['nombreAlumno']." ".$alu['apellido1']." ".$alu['apellido2']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Beca</label>
    <select class="form-control" name="becsol">
        <option value="">Selecciona</option>
        <?php foreach($becas as $b):?>
            <option <?php if($b['idBeca'] == $sol->getBecsol()){ echo 'Selected';}?> value="<?php echo $b['idBeca']; ?>"><?php echo $b['nomBeca']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Estatus</label>
    <select class="form-control" name="estsol" id="">
        <option value="">Selecciona</option>
        <option <?php if($sol->getEstsol() == 'Sin autorizar'){ echo 'Selected'; } ?> value="<?php echo "Sin autorizar"; ?>">Sin autorizar</option>
        <option <?php if($sol->getEstsol() == 'Autorizado'){ echo 'Selected'; } ?> value="<?php echo "Autorizado"; ?>">Autorizado</option>
    </select>
    </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarSolbecas.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>