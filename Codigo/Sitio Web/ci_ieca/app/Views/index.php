<?php
include_once('template/header.php');
?>
<div class="col-sm-12" style="margin-top: 2%;">
    <div class="row">
            <div class="col-sm-12">
        <div id="carouselCursos" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php if($cursos){ $i = sizeof($cursos); for($c = 0; $i > $c; $c++){?>
            <li data-target="#carouselCursos" data-slide-to="<?=$c;?>" class="<?php if($c == 0){ echo 'active'; }?>"></li>
            <?php } }else{?>
            <li data-target="#carouselCursos" data-slide-to="0" class="active"></li>
            <?php }?>
            <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
        </ol>
        <div class="carousel-inner">
            <?php if($cursos){ $i=0; $o=0; foreach($cursos as $curso){ if($curso['fechaInicio'] < date('Y-m-d')){ $o++; if($o == count($cursos)){?> 
                <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url("vendor/template/images/logotransparenciagob.png"); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
            </div>
            </div>
                <?php }}else{?>
            <div class="carousel-item <?php if($i == 0){ echo 'active';}?>">
            <img class="d-block w-100" src="<?= base_url("vendor/template/".$curso['imgCurso']); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><? $curso['nombre_curso']; ?></h5>
                <p style="position: relative; top: -250%; left: 40%; z-index: 2; text-shadow:0px 0px 2px #fff,
                0px 0px 4px #d6d6d6; color: white;  animation: sombreadoAnimado 1s ease-out;">Del <?= date('d/m/Y', strtotime($curso['fechaInicio'])); ?>, Al <?= date('d/m/Y', strtotime($curso['fechaTermino'])); ?></p>
            </div>
            </div>
            <?php $i++; }}}else{?>
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url("vendor/template/images/logotransparenciagob.png"); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
            </div>
            </div>
            <?php }?>
        </div>
        <a class="carousel-control-prev" href="#carouselCursos" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselCursos" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
        
        <div class="col-sm-6" style="margin-top: 2%;">
        <img src="<?= base_url('vendor/template/images/GTO.jpg'); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 800px;">
        </div>
        <div class="col-sm-6" style="margin-top: 2%;">
        <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicator" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url('vendor/template/images/IMAGEN2.jpg'); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('vendor/template/images/imagen3.png'); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('vendor/template/images/3.jpg'); ?>" style="max-width: 100%; max-height: 100%; height: 210px; width: 100px; size: cover;" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>

    </div>
</div>
<?php 
include('template/footer.php');
?>