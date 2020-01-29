<style type="text/css">

@media (min-width: 1200px){
  .container {
    width: 1225px;
    /* padding-left: 44px; */
  }
}
.home{
  margin-left: 30px !important;
  padding-top: 15px;
  padding-right: 11px;
}
</style>
<div class="menu_primario">
<div class="container">
    <nav class="navbar navbar-default1" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header home">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <!--span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span-->
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <!--<a class="navbar-brand" href="index.html">Inicio</a>-->
            <!--a class="navbar-bran" style="font-size: 16px; color: #fff;" href="<?php //echo site_url() ?>"><span class="glyphicon glyphicon-home"> </span> Inicio</a-->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding:0px;">
            <ul class="nav navbar-nav pull-right">
                <?php
                $usuario_logueado = $this->session->userdata('usuario_logeado');
                $tipo_admin = $this->session->userdata('tipo_admin'); //Tipo de usuario almacenado en sesión
                $tipo_admin_config = $this->config->item('rol_admin'); //Identificador de administrador
                //pr($tipo_admin);
                if (exist_and_not_null($usuario_logueado)) { ///Validar si usuario inicio sesión
                    if ($tipo_admin == $tipo_admin_config['SUPERADMIN']['id']) { ///Administrador
                        ?>
                        <li>
                            <a href="http://educacionensalud.imss.gob.mx/es/presentaci%C3%B3n">Ir al sitio</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url(); ?>">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Talleres&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('registro'); ?>">Registro talleres presenciales</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('registro/registrosagenda'); ?>">Registro sesiones en línea</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogos'); ?>">Agenda talleres presenciales</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogosdistancia'); ?>">Agenda sesiones en línea</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('profesor'); ?>">Asistencia</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('buscador'); ?>">Buscador</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('usuarios'); ?>">Lista usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('talleres'); ?>">Lista registro a talleres</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('asistencia'); ?>">Lista asistencias</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuarios/admin'); ?>">Admin</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogos/categorias'); ?>">Categoría</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogos/departamentos'); ?>">Departamentos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogos/delegaciones'); ?>">Delegación</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo site_url('login/cerrar_session'); ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
                        </li>
                    <?php } elseif ($tipo_admin == $tipo_admin_config['ADMIN']['id']) { ///Administrador  ?>
                        <li>
                            <a href="http://educacionensalud.imss.gob.mx/es/presentaci%C3%B3n">Ir al sitio</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url(); ?>">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Talleres&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('registro'); ?>">Registro talleres presenciales</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('registro/registrosagenda'); ?>">Registro sesiones en línea</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogos'); ?>">Agenda talleres presenciales</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('catalogosdistancia'); ?>">Agenda sesiones en línea</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('profesor'); ?>">Asistencia</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('buscador'); ?>">Buscador</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo site_url('login/cerrar_session'); ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
                        </li>
                    <?php } else { //Docente  ?>
                        <li>
                            <a href="http://educacionensalud.imss.gob.mx/es/presentaci%C3%B3n">Ir al sitio</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url(); ?>">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Talleres&nbsp;<i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('registro'); ?>">Registro</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('profesor'); ?>">Asistencia</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo site_url('login/cerrar_session'); ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
                        </li>
                    <?php }
                } else { ///Usuario sin sesión
                    ?>
                    <!--li>
                        <a href="http://educacionensalud.imss.gob.mx/es/presentaci%C3%B3n">Ir al sitio</a>
                    </li>
                    <li class="dropdown">
                        <a  href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/presentacion.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inicio <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/presentacion.html">Presentación</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/convenio.html">Convenio IMSS-Conricyt</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/beneficios.html">Beneficios</a></li>
                        </ul>

                    <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formas de acceso <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/acceso.html">Acceso remoto</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/institucional.html">Red institucional</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/externa.html">Red externa</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recursos de información <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/recursos.html">Recursos disponibles por editorial</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Re_prueba.html">Recursos prueba</a>
                    </li>

                    <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recursos abiertos <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/aplicaciones.html">Aplicaciones</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/recursos_abiertos.html" >Recursos abiertos</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Capacitación <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/materiales.html">Materiales de apoyo</a></li>
                            <li><a href="http://<?php //echo $_SERVER['HTTP_HOST']; ?>/rist/index.php/calendario">Sesiones de actualización en línea</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/videotutoriales.html">Videotutoriales</a></li>
                            <li><a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/galeria.html">Galería de imágenes</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="http://innovacioneducativa.imss.gob.mx/es/buzon" target="_blank">Buzón</a>
                    </li>

                    <li>
                        <a href="#">Contacto</a>
                    </li-->
                    <li id="menu-238-1" class="first odd sf-item-1 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es" class="sf-depth-1">Inicio</a></li>
                    <li id="menu-728-1" class="active-trail middle even sf-item-2 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/coordinaci%C3%B3n-de-educaci%C3%B3n-en-salud" title="" class="sf-depth-1 active">Conócenos</a></li>
                    <li id="menu-1917-1" class="middle odd sf-item-3 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/normatividad" class="sf-depth-1">Normatividad</a></li>
                    <li id="menu-1231-1" class="middle even sf-item-4 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/faq" title="" class="sf-depth-1">Preguntas frecuentes</a></li>
                    <li id="menu-955-1" class="middle odd sf-item-5 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/contacto" title="" class="sf-depth-1">Contacto</a></li>
                    <li id="menu-2572-1" class="middle even sf-item-6 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/buzon" title="" class="sf-depth-1">Buzón</a></li>
                    <li id="menu-1233-1" class="last odd sf-item-7 sf-depth-1 sf-no-children"><a href="http://educacionensalud.imss.gob.mx/es/directorio-ces" title="" class="sf-depth-1">Directorio CES</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div></div>
<div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="myModalLabel">Contacto</h2>
            </div>
            <div class="modal-body">
                <div class="media">
                    <div class="pull-left">
                      <!-- <img class="img-responsive thumbnail" src="img/mesa.png"> -->
<?php echo img("mesa.png", array("class" => "img-responsive thumbnail")); ?>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mesa de ayuda</h3>
                        <p>No dude en ponerse en contacto con nosotros.</p>
                        <p><i class="fa fa-phone"></i>
                            <abbr title="Phone">Tel</abbr>: 56 27 69 00 <strong> Exts.</strong> 21146, 21147 y 21148 </p>
                        <p><i class="fa fa-arrow-circle-right"></i>
                            <abbr title="red">Red</abbr>: 865021146, 865021147, 865021148</p>
                        <p><i class="fa fa-envelope-o"></i>
                            <abbr title="Email">Email</abbr>: <a href="mailto:acceso.edumed@imss.gob.mx">acceso.edumed@imss.gob.mx</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i>
                            <abbr title="Hours">Horario</abbr>: lunes - viernes: 8:00 AM a 16:00 Hrs</p>
                    </div>
                </div>
            </div><!--cierra modal-body-->

            <div class="modal-body">
                <div class="media">
                    <div class="pull-left">
                      <!-- <img class="img-responsive thumbnail" src="img/disponibilidad.png"> -->
<?php echo img("disponibilidad.png", array("class" => "img-responsive thumbnail")); ?>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Disponibilidad de Recursos</h3>
                        <p><strong>Lic. Verónica Sánchez Castillo </strong></p>
                        <p>División de Innovación Educativa </p>
                        <p><i class="fa fa-phone"></i>
                            <abbr title="Phone">Tel</abbr>:  (55) 5627 6900   <strong> Exts.</strong> 21250</p>
                        <p><i class="fa fa-envelope-o"></i>
                            <abbr title="Email">Email</abbr>: <a href="mailto:veronica.sanchezc@imss.gob.mx">veronica.sanchezc@imss.gob.mx</a>
                        </p>
                        <p><i class="fa fa-envelope-o"></i>
                            <abbr title="Email">Email</abbr>: <a href="mailto:imss.recursoselectronicos@gmail.com">imss.recursoselectronicos@gmail.com</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i>
                            <abbr title="Hours">Horario</abbr>: lunes - viernes: 8:00 AM a 16:00 Hrs</p>
                    </div>
                </div>
            </div><!--cierra modal-body-->
            <div class="modal-body">
                <div class="media">
                    <div class="pull-left">
                      <!-- <img class="img-responsive thumbnail" src="img/capa.png"> -->
<?php echo img("capa.png", array("class" => "img-responsive thumbnail")); ?>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Capacitación</h3>
                        <p><strong>&nbsp;</strong> </p>
                        <p>División de Innovación Educativa </p>
                        <p><i class="fa fa-phone"></i>
                            <abbr title="Phone">Tel</abbr>:  (55) 5627 6900   <strong> Exts.</strong> 21152</p>
                        <p><i class="fa fa-envelope-o"></i>
                            <abbr title="Email">Email</abbr>: <a href="mailto:recursoselectronicosimss@gmail.com">recursoselectronicosimss@gmail.com</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i>
                            <abbr title="Hours">Horario</abbr>: lunes - viernes: 8:00 AM a 16:00 Hrs</p>
                    </div>
                </div>
            </div><!--cierra modal-body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
