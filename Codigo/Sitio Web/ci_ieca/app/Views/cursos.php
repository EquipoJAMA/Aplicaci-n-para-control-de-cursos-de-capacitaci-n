<?php 
include_once('template/header.php');
?>
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12" style="margin-top: 2%;">
        <!--<div class="col-sm-12" style="margin-top: 2%;">
            <h1>Cursos IECA</h1>
        </div>-->
        </div>
        <?php foreach($cursos as $i):?>
        <div class="col-sm-4">
        <div style="background-color: #237fbc; color: white; text-align: center;"><h4 style="position: relative; top: 200%;"><?= $i['nombre_curso']?></h4></div>
            <img src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="rounded mx-auto d-block" style="max-width: 100%; max-height: 100%; width: 600px; height: 250px;">
            <div class="col-sm-12" style="background-color: #237fbc; color: white; text-align: center;"><h5>Descripción:</h5><p><?php echo $i['descripcion']?></p></div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php 
include('template/footer.php');
?>