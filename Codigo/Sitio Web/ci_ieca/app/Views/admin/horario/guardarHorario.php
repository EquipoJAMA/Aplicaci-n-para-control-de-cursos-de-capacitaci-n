<?php
    require_once '../class/Horario.php';
    include('../template/Header.php');

    $idHorario = (isset($_REQUEST['idHorario'])) ? $_REQUEST['idHorario']: null;
    if($idHorario){
        $horario = Horario::buscarPorId($idHorario);
    }else{
        $horario = new Horario();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idHorario = (isset($_REQUEST['idHorario'])) ? $_REQUEST['idHorario']: null;
        $horaInicio = (isset($_REQUEST['horaInicio'])) ? $_REQUEST['horaInicio']: null;
        $horaTermino = (isset($_REQUEST['horaTermino'])) ? $_REQUEST['horaTermino']: null;
        $dia = (isset($_REQUEST['dia'])) ? $_REQUEST['dia']: null;
        if($ins = Horario::buscarPorId($idHorario)){
            $horario = new Horario($idHorario, $horaInicio, $horaTermino, $dia);
            $msj = $horario->actualizar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarHorario.php?idHorario='.$idHorario.'"</script>';
            }else{
                header('Location: listarHorarios.php');
            }
        }else{
            $horario = new Horario($idHorario, $horaInicio, $horaTermino, $dia);
            $msj = $horario->guardar();
            if($msj != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarHorario.php"</script>';
            }else{
                header('Location: listarHorarios.php');
            }
        }
    }else{
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
<h1><?php if(isset($_REQUEST['idHorario'])){ echo 'Editar Horario'; }else{ echo "Nuevo Horario";}?></h1>
<form action="guardarHorario.php" method="POST">
    <div class="row">
    <?php if(!$idHorario){?>
    <div class="form-group col-md-4">
    <label for="">Identificador</label>
    <input class="form-control" <?php if($horario->getIdHorario()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idHorario" value="<?php echo $horario->getIdHorario()?>"/>
    </div>
    <?php }else{?>
        <input class="form-control" <?php if($horario->getIdHorario()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="idHorario" value="<?php echo $horario->getIdHorario()?>"/>
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Hora Inicio</label>
    <input class="form-control" type="time" name="horaInicio" value="<?php echo $horario->getHorarioInicio()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Hora Termino</label>
    <input class="form-control" type="time" name="horaTermino" value="<?php echo $horario->getHorarioTermino()?>">
    </div>
    <!--<div class="form-group col-md-5">
    <label for="">Dias</label>
    <input class="form-control" type="number" id="ds" onchange="traerDias()" min="0" max="7">
    </div>-->
    <div class="form-group col-md-4">
    <label for="">Dias</label>
    <select class="form-control" name="dia">
        <option value="">Selecciona</option>
        <option <?php if($horario->getDia() == "Lunes"){ echo 'Selected';}?> value="Lunes">Lunes</option>
        <option <?php if($horario->getDia() == "Martes"){ echo 'Selected';}?> value="Martes">Martes</option>
        <option <?php if($horario->getDia() == "Miercoles"){ echo 'Selected';}?> value="Miercoles">Miercoles</option>
        <option <?php if($horario->getDia() == "Jueves"){ echo 'Selected';}?> value="Jueves">Jueves</option>
        <option <?php if($horario->getDia() == "Viernes"){ echo 'Selected';}?> value="Viernes">Viernes</option>
        <option <?php if($horario->getDia() == "Sabado"){ echo 'Selected';}?> value="Sabado">Sabado</option>
        <option <?php if($horario->getDia() == "Domingo"){ echo 'Selected';}?> value="Domingo">Domingo</option>
    </select>
    </div>
    <div class="col-md-12" id="showD"></div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarHorarios.php'">Cancelar</button>
    </div>
    </div>
</form>
    </div>
</div>
</div>

    <?php }?>