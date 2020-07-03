<?php
include_once('template/Header.php');
?>

<section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login_title">
                                <h2>Inicia sesión en tu cuenta</h2>
                                <p>Inicia sesión para descubrir todas las ventajas que tenemos.</p>
                            </div>
                            <form class="login_form row" action="login/iniciarSesion" method="POST">
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="text" name="nick" placeholder="Nickname">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="password" name="pass" placeholder="Password">
                                </div>
                                <!--<div class="col-lg-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Mantenerme logueado</label>
                                        <div class="check"></div>
                                    </div>
                                    <h4>¿Olvidaste tu contraseña?</h4>
                                </div>-->
                                <div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" class="btn btn-success form-control">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
     </section>
     
<?php 
include('template/footer.php');
?>