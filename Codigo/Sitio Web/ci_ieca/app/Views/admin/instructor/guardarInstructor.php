<?php
    require_once '../class/Instructor.php';
    require_once '../class/Tipo.php';
    require_once '../class/Especialidad.php';
    require_once '../class/Telefono.php';
    require_once '../class/Tipotel.php';
    include('../template/Header.php');

    $idInstructor = (isset($_REQUEST['idInstructor'])) ? $_REQUEST['idInstructor']: null;
    $t = Tipo::recuperarTodos();
    $e = Especialidad::recuperarTodos();
    $telt = Tipotel::recuperarTodos();
    if($idInstructor){
        $instructor = Instructor::buscarPorId($idInstructor);
        if($instructor){
            $tel = Telefono::buscarPorId($instructor->getTelefonoIns_idTel());
        }
    }else{
        $instructor = new Instructor();
        $tel = new Telefono();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idInstructor = (isset($_REQUEST['idInstructor'])) ? $_REQUEST['idInstructor']: null;
        $nombreInstructor = (isset($_REQUEST['nombreInstructor'])) ? $_REQUEST['nombreInstructor']: null;
        $apellidoP = (isset($_REQUEST['apellidoI1'])) ? $_REQUEST['apellidoI1']: null;
        $apellidoM = (isset($_REQUEST['apellidoI2'])) ? $_REQUEST['apellidoI2']: null;
        $especialidad = (isset($_REQUEST['especialidad'])) ? $_REQUEST['especialidad']: null;
        $tipo = (isset($_REQUEST['tipo'])) ? $_REQUEST['tipo']: null;
        $telefono = (isset($_REQUEST['telefono'])) ? $_REQUEST['telefono']: null;
        $tipoTel = (isset($_REQUEST['tipoTel'])) ? $_REQUEST['tipoTel']: null;
        if($ins = Instructor::buscarPorId($idInstructor)){
            $insTel = new Telefono($tipoTel, $telefono, $tel->getIdTel());
            $msj2 = $insTel->guardar();
            if(!$msj2){
                $instructor = new Instructor($idInstructor, $especialidad, $tipo, $tel->getIdTel(), $nombreInstructor, $apellidoP, $apellidoM);
                $msj = $instructor->actualizar();
                if($msj){
                    echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarInstructor.php?idInstructor='.$idInstructor.'"</script>';
                }else{
                    header('Location: listarInstructores.php');
                }
            }else{
                echo '<script>alert("Mensaje de error: \n'.$msj2.'\nProcura llenar todos los campos"); window.location.href="guardarInstructor.php?idInstructor='.$idInstructor.'"</script>';
            }
        }else{
            $insTel = new Telefono($tipoTel, $telefono);
            $msj2 = $insTel->guardar();
            if(!$msj2){
                $instructor = new Instructor($idInstructor, $especialidad, $tipo, null, $nombreInstructor, $apellidoP, $apellidoM);
                $msj = $instructor->guardar();
                if($msj){
                    echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarInstructor.php"</script>';
                }else{
                    header('Location: listarInstructores.php');
                }
            }else{
                echo '<script>alert("Mensaje de error: \n'.$msj2.'\nProcura llenar todos los campos"); window.location.href="guardarInstructor.php"</script>';
            }
        }
    }else{
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h1><?php if(isset($_REQUEST['idInstructor'])){ echo 'Editar a '.$instructor->getNombreInstructor();}else{ echo "Nuevo Instructor";}?></h1>
<form action="guardarInstructor.php" method="POST">
    <div class="row">
    <?php if(!$idInstructor){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label><span id="respuesta"></span>
    <input id="id" onchange="verificar()" class="form-control" <?php if($instructor->getIdInstructor()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idInstructor" value="<?php echo $instructor->getIdInstructor()?>"/>
    </div>
    <?php }else{?>
    <input <?php if($instructor->getIdInstructor()){ echo 'type="hidden"';}?> name="idInstructor" value="<?php echo $instructor->getIdInstructor()?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombreInstructor" value="<?php echo $instructor->getNombreInstructor()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Apellido paterno</label>
    <input class="form-control" type="text" name="apellidoI1" value="<?php echo $instructor->getApellidoI1()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Apellido materno</label>
    <input class="form-control" type="text" name="apellidoI2" value="<?php echo $instructor->getApellidoI2()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Numero de telefono</label>
    <input class="form-control" type="text" name="telefono" value="<?php echo $tel->getTelefono()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nombre">Tipo</label>
    <select class="form-control" name="tipoTel">
        <option value="">Selecciona</option>
        <?php foreach($telt as $i):?>
            <option <?php if($i['idTipTel'] == $tel->getTipoTel_idTel()){ echo 'selected'; }?> value="<?php echo $i['idTipTel'];?>"><?php echo $i['tipoTelefono']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">especialidad</label>
    <select class="form-control" name="especialidad">
        <option value="">Selecciona</option>
        <?php foreach($e as $i):?>
            <option value="<?php echo $i['idEspInst'];?>" <?php if($i['idEspInst'] == $instructor->getEspecialidadIns_idEspInst()){ echo 'Selected';} ?>><?php echo $i['especialidad']?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label for="">Tipo de instructor</label>
    <select class="form-control" name="tipo">
        <option value="">Selecciona</option>
        <?php foreach($t as $i):?>
            <option <?php if($instructor->getTipoIns_idTipInst() == $i['idTipInst']){ echo 'Selected';}?> value="<?php echo $i['idTipInst'] ?>"><?php echo $i['tipo'] ?></option>
        <?php endforeach;?>
    </select>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarInstructores.php'">Cancelar</button>
    </div>
    </div>
</form>
</div>
</div>
</div>

    <?php }?>