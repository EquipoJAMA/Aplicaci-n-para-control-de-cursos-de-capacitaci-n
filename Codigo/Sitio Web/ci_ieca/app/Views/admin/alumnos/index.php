<?php include(APPPATH.'Views/templateAdmin/header.php') ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-sm-12 main-chart">
            <div class="border-head">
                <h3 id="title">Alumnos</h3>
            </div>
            <section>
                <button id="btnForm" class="btn btn-success" onclick="showformAlumno()" style="cursor: pointer;"><i id="faIconF" class="fa fa-plus"></i></button>
                <section>
                    <div style="background-color: white;" id="form"></div>
                </section>
                <div id="table" class="content-panel table table-responsive">
                    <div class="form-group col-sm-12">
                        <form action="form-horizontal" method="POST" name="search_form" id="search_form">
                            <div class="form-group col-sm-1" style="margin-right: -5rem;">
                                <label class="control-label col-sm-1" for="search"><i class="fa fa-search"></i></label>
                            </div>    
							<div class="col-sm-6">
							    <input class="form-control" size="50" type="search" name="search" id="search" placeholder="Ingrese su busqueda" onkeyup="searchAlumnos();">
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
        listAlumnos();
    });
</script>
<?php include(APPPATH.'Views/templateAdmin/footer.php') ?>