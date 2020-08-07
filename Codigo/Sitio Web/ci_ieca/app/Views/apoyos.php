<?php 
include('template/header.php');
?>
<div class="col-sm-12">
    <div class="row"> 
        <!--<div class="col-sm-12" style="margin-top: 2%;">
            <h1>Conoce nuestros apoyos</h1>
        </div>-->
        <div class="col-sm-12" style="text-align: center; margin-top: 2%;">
            <img src="<?= base_url('vendor/template/images/imagen.jpg'); ?>" style="max-width: 100%; max-height: 100%; size: cover;">
        </div>
        <div class="col-sm-12" style="margin-top: 2%; text-align: center;">
            <h2 id="apoyoT" style="position: relative; top: -250%; z-index: 2; text-shadow:0px 0px 2px #fff,
                0px 0px 4px #d6d6d6; color: white; animation: sombreadoAnimado 1s ease-out;">Becas IECA para talentos</h2>
        </div>
        <div class="col-sm-12 row px-5 d-flex align-items-center" style="text-align: center;">
        <?php if($becas || $autbec){?>
        <table class="table table-hover table-sm table-bordered table-striped table-condensed">
            <thead class="thead-dark">
                <tr>
        <?php if($becas){ ?><td>Becas</td><?php }?> 
        <?php if($autbec){ ?><td>Beneficiarios</td> <?php }?> 
                </tr>
            </thead>
            <tbody>
                <tr>
            <?php if($becas){ foreach($becas as $b):?>
                    <td><?= $b['nomBeca']; ?></td>
            <?php endforeach; } if($autbec){ foreach($autbec  as $i):?>
                    <td><?= $i['nombreAlumno']." ".$i['apellido1']." ".$i['apellido2']; ?></td>
            <?php endforeach; } ?>
                </tr>
            </tbody>
        </table>
        </div>
        <?php } ?>
        <div id="divAp" class="col-sm-12 div-imagen" style="margin-top: 2%; text-align: center;">
        <div id="textAp" class="col-sm-6 row px-5 d-flex align-items-center justify-content: center" style="text-align: center; ">
            <p>"Cristian Rodríguez Muñoz, director del Instituto Estatal de Capacitación (IECA) 
                plantel Irapuato y Luis Gerardo Hernández, director general de Economía y Turismo 
                de este municipio, entregaron constancias a 650 personas que se capacitaron en alguna 
                de las 53 especialidades enfocadas al sector empresarial y social abiertas al público en general"</p>
        </div>
            <img class="desvanecer" src="<?= base_url('vendor/template/images/imagen4.jpg'); ?>" style="max-width: 100%; max-height: 100%; height: 450px; size: cover;">
        </div>
    </div>
</div>
<?php 
include('template/footer.php');
?>