<?php
    require_once '../class/Alumnos.php';
    require_once '../class/Telefono.php';
    require_once '../class/Tipotel.php';
    include('../template/Header.php');

    $curp = (isset($_REQUEST['curp'])) ? $_REQUEST['curp']: null;
    $telt = Tipotel::recuperarTodos();
    if($curp){
        $alumno = Alumnos::buscarPorCurp($curp);
        if($alumno){
            $tel = Telefono::buscarPorId($alumno->getTelefonoAl_idTel());
        }
    }else{
        $alumno = new Alumnos();
        $tel = new Telefono();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $curp = (isset($_REQUEST['curp'])) ? $_REQUEST['curp']: null;
        $telefono = (isset($_REQUEST['telefono'])) ? $_REQUEST['telefono']: null;
        $tipoTel = (isset($_REQUEST['tipoTel'])) ? $_REQUEST['tipoTel']: null;
        $nombreAlumno = (isset($_REQUEST['nombreAlumno'])) ? $_REQUEST['nombreAlumno']: null;
        $apellido1 = (isset($_REQUEST['apellido1'])) ? $_REQUEST['apellido1']: null;
        $apellido2 = (isset($_REQUEST['apellido2'])) ? $_REQUEST['apellido2']: null;
        $correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo']: null;
        $cp = (isset($_REQUEST['cp'])) ? $_REQUEST['cp']: null;
        if($ins = Alumnos::buscarPorCurp($curp)){
            $alTel = new Telefono($tipoTel, $telefono, $tel->getIdTel());
            $msj2 = $alTel->guardar();
            if(!$msj2){
                $alumno = new Alumnos($curp, $tel->getIdTel(), $nombreAlumno, $apellido1, $apellido2, $correo, $cp);
                $msj = $alumno->actualizar();
                if($msj){
                    echo '<script>alert("Mensaje de error: \n'.$msj.'\nProcura llenar todos los campos"); window.location.href="guardarAlumno.php?curp='.$curp.'"</script>';
                }else{
                    header('Location: listarAlumnos.php');
                }
            }else{
                echo '<script>alert("Mensaje de error: \n'.$msj2.'\nProcura llenar todos los campos"); window.location.href="guardarAlumno.php?curp='.$curp.'"</script>';
            }
        }else{
            $alTel = new Telefono($tipoTel, $telefono);
            $msj2 = $alTel->guardar();
            if(!$msj2){
                $alumno = new Alumnos($curp, null, $nombreAlumno, $apellido1, $apellido2, $correo, $cp);
                $msj = $alumno->guardar();
                if($msj){
                    echo '<script>alert("Mensaje de error: \n'.$msj.' \nProcura llenar todos los campos"); window.location.href="guardarAlumno.php"</script>';;
                }else{
                    header('Location: listarAlumnos.php');
                }
            }else{
                echo '<script>alert("Mensaje de error: \n'.$msj2.' \nProcura llenar todos los campos"); window.location.href="guardarAlumno.php"</script>';;
            }
            //$msj = $alumno->guardar();
            //$msj2 = $alTel->guardar();
            /*if($msj != "" || $msj2 != ""){
                echo '<script>alert("Mensaje de error: \n'.$msj.' \nProcura llenar todos los campos"); window.location.href="guardarAlumno.php"</script>';;
            }else{
            header('Location: listarAlumnos.php');
            }*/
        }
    }else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<h1><?php if(isset($_REQUEST['curp'])){ echo 'Editar a '.$alumno->getNombreAlumno().' '.$alumno->getApellido1().' '.$alumno->getApellido2();}else{ echo "Nuevo Alumno";}?></h1>
<form action="guardarAlumno.php" method="POST">
    <div class="row">
    <?php if(!$curp){?>
    <div class="form-group col-md-4">
    <label for="">CURP</label><span id="respuesta"></span>
    <input id="id" onchange="verificar()" class="form-control" <?php if($alumno->getcurp()){ echo 'type="hidden"';}else{ echo 'type="text"';}?> name="curp" value="<?php echo $alumno->getcurp()?>"/>
    </div>
    <?php }else{?>
        <input <?php if($alumno->getCurp()){ echo 'type="hidden"';}?> name="curp" value="<?php echo $alumno->getCurp()?>">
    <?php }?>
    <div class="form-group col-md-4">
    <label for="">Nombre</label>
    <input class="form-control" type="text" name="nombreAlumno" value="<?php echo $alumno->getNombreAlumno()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Apellido paterno</label>
    <input class="form-control" type="text" name="apellido1" value="<?php echo $alumno->getApellido1()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Apellido materno</label>
    <input class="form-control" type="text" name="apellido2" value="<?php echo $alumno->getApellido2()?>">
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
    <label for="">Correo</label>
    <input class="form-control" type="email" name="correo" value="<?php echo $alumno->getCorreo()?>">
    </div>
    <div class="form-group col-md-4">
    <label for="">Código postal</label>
    <input class="form-control" type="text" name="cp" value="<?php echo $alumno->getcpAl()?>">
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='listarAlumnos.php'">Cancelar</button>
    </div>
    </div>
</form>
        </div>
    </div>
</div>

    <?php }?>