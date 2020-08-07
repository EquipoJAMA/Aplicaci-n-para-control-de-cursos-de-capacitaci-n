<?php 
include_once('template/header.php');
?>
<div class="col-sm-12">
    <div class="row">
        <!--<div class="col-sm-12" style="margin-top: 2%;">
        <div class="col-sm-12" style="margin-top: 2%;">
            <h1>Cursos IECA</h1>
        </div>
        </div>-->
        <?php
        if(count($cursos)){
            $e=[]; $f=[]; $m=[]; $a=[]; $my=[]; $j=[]; $jl=[]; $ag=[]; $s=[]; $o=[]; $n=[]; $d=[];
            for($i = 0; count($cursos) > $i; $i++){ 
                if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "01"){ 
                    $e[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "02"){
                    $f[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "03"){
                    $m[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "04"){
                    $a[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "05"){
                    $my[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "06"){
                    $j[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "07"){
                    $jl[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "08"){
                    $ag[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "09"){
                    $s[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "10"){
                    $o[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "011"){
                    $n[]=$cursos[$i];
                }else if(date("m",strtotime($cursos[$i]['fechaInicio'])) == "012"){
                    $d[]=$cursos[$i];
                }
            } 
        if($e){ ?>
        <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Enenero</h4>
            <hr>
        </div>
        <?php foreach($e as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($f){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Febrero</h4>
            <hr>
        </div>
        <?php foreach($f as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($m){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Marzo</h4>
            <hr>
        </div>
        <?php foreach($m as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($a){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Abril</h4>
            <hr>
        </div>
        <?php foreach($a as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($my){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Mayo</h4>
            <hr>
        </div>
        <?php foreach($my as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($j){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Junio</h4>
            <hr>
        </div>
        <?php foreach($j as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($jl){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Julio</h4>
            <hr>
        </div>
        <?php foreach($jl as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($ag){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Agosto</h4>
            <hr>
        </div>
        <?php foreach($ag as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($s){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Septiembre</h4>
            <hr>
        </div>
        <?php foreach($s as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($o){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Octubre</h4>
            <hr>
        </div>
        <?php foreach($o as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($n){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Noviembre</h4>
            <hr>
        </div>
        <?php foreach($n as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}} if($d){?>
            <div class="col-sm-12" style="margin-top: 2%;">
            <h4>Cursos en Diciembre</h4>
            <hr>
        </div>
        <?php foreach($d as $i){ if($i['fechaInicio'] < date('Y-m-d')){ }else{?>
        <div class="col-sm-4">
        <div class="col-sm-12 nombreCurso">
            <h5><?= $i['nombre_curso']?></h5>
        </div>
        <div class="div-image imgCurso">
        <div class="col-sm-12 textCursos">
            <p><?= $i['descripcion']?></p>
        </div>
            <img  src="<?= base_url("vendor/template/".$i['imgCurso']) ?>" class="desvanecer rounded mx-auto d-block">
        </div>
        <div class="col-sm-12 fechasCursos">
            <p><?= "Del ".date("d/m/Y", strtotime($i['fechaInicio']))." Al ".date("d/m/Y", strtotime($i['fechaTermino']))?></p>
        </div>
        </div>
        <?php }}}}?>
    </div>
</div>
<?php 
include('template/footer.php');
?>