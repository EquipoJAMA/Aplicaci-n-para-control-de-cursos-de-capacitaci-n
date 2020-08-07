<?php include(APPPATH.'Views/templateAdmin/header.php') ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-sm-12 main-chart">
            <div class="border-head">
                <h3 id="title">Instructores</h3>
            </div>
            <section>
                <button id="btnForm" class="btn btn-success" onclick="showformInstructor()" style="cursor: pointer;"><i id="faIconF" class="fa fa-plus"></i></button>
                <section>
                    <div style="background-color: white;" id="form"></div>
                </section>
                <div id="table" class="content-panel table table-responsive">
                    <div class="form-group col-sm-12">
                        <form action="form-horizontal" method="POST" name="search_form" id="search_form">
                            <div class="form-group col-sm-1" style="margin-right: -5rem;">
                                <label class="control-label col-sm-1" for="search"><i class="fa fa-search"></i></label>
                            </div>    
							<div class="col-sm-4">
							    <input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="searchInstructor();">
                            </div>
                            <div class="col-sm-1"  style="margin-right: -5rem;">
                                <label class="control-label col-sm-1"><i class="fa fa-vcard"></i></label>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="esp" onchange="searchInstructor();">
                                    <option value="">Selecciona Especialidad</option>
                                    <?php if($especialidad){ foreach($especialidad as $es){ ?>
                                        <option value="<?= $es['especialidad']; ?>"><?= $es['especialidad']; ?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="tip" onchange="searchInstructor();">
                                    <option value="">Selecciona Tipo</option>
                                    <?php if($tipo){ foreach($tipo as $tip){ ?>
                                        <option value="<?= $tip['tipo']; ?>"><?= $tip['tipo']; ?></option>
                                    <?php }}?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div id="en_lista"></div>
                </div>
            </section>
            </div>
        </div>
    </section>
</section>
<script>
    $(document).ready(function(){
        listInstructor();
    });
</script>
<?php include(APPPATH.'Views/templateAdmin/footer.php') ?>