<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="Keywords" content="libros científicos,revistas, recursos electrónicos, salud" />
        <meta name="Description" content="Recursos Electrónicos de Información en Salud del IMSS." />
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="distribution" content="global"/>
        <meta name="Robots" content="all"/>
        <title>
            <?php echo (!is_null($title)) ? "{$title}::" : "" ?>Talleres de actualización de Recursos Electrónicos de Información en Salud
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php //echo css("bootstrap.css"); ?>

        <style>
        @import url("http://educacionensalud.imss.gob.mx/sites/all/modules/accordion_blocks/accordion_init.css?q1wfy3");
        @import url("http://educacionensalud.imss.gob.mx/sites/all/libraries/superfish/css/superfish.css?q1wfy3");
        @import url("http://educacionensalud.imss.gob.mx/sites/all/libraries/superfish/css/superfish-smallscreen.css?q1wfy3");
        @import url("http://educacionensalud.imss.gob.mx/sites/all/libraries/superfish/style/space.css?q1wfy3");
        </style>
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.css" media="all">
        <style>
        @import url('https://fonts.googleapis.com/css?family=GilmerBold:200,300,400,600,700');
        @import url('https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700');
        @import url("http://educacionensalud.imss.gob.mx/sites/all/themes/ces/assets/css/custom.css?q1wfy3");
        </style>
        <?php //echo css("font-awesome.min.css"); ?>
        <?php echo css("datepicker.css"); ?>
        <?php echo css("component.css"); ?>
        <?php echo css("reis.css"); ?>
        <?php echo css("style-60.css"); ?>
        <?php echo css("font-awesome-4.1.0/css/font-awesome.min.css"); ?>

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php echo js("common/jquery-2.1.4.min.js"); ?>
        <?php echo js("common/bootstrap.min.js"); ?>
        <?php echo js("common/tooltip.js"); ?>
        <?php echo js("hover-dropdown.js"); ?>
      <!--<script type="text/javascript">
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      });
      var img_url_loader = "<?php //echo img_url_loader();  ?>";
      var site_url = "<?php //echo site_url();  ?>";
        <?php // echo $css_script; ?>
      </script>-->
        <?php echo js("jquery.flexslider.js"); ?>
        <?php echo js("bxslider/jquery.bxslider.js"); ?>
        <?php echo js("jquery.parallax-1.1.3.js"); ?>
        <?php echo js("wow.min.js"); ?>
        <?php echo js("owlcarousel/owl.carousel.js"); ?>
        <?php echo js("jquery.easing.min.js"); ?>
        <?php echo js("link-hover.js"); ?>
        <?php echo js("superfish.js"); ?>

        <script type="text/javascript">
            var img_url_loader = "<?php echo img_url_loader(); ?>";
            var site_url = "<?php echo site_url(); ?>";
<?php echo $css_script; ?>
        </script>
        <?php echo js("common/bootstrap-datepicker.js"); ?>
        <?php echo js("common/general.js"); ?>
        <?php echo js("general.js"); ?>


    </head>

    <body>

        <div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarMainCollapse">
                    <span class="sr-only">Interruptor de Navegación</span><!--span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span-->
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <a class="logos" style="width: 8rem; margin-top: -2%; margin-bottom: -2%; margin-left: -15%;" href="https://www.gob.mx/" target="_blank">
                    <img src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.png" alt="logo gobierno de méxico" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarMainCollapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="https://www.gob.mx/tramites" title="Trámites">Trámites</a></li>
                    <li><a href="https://www.gob.mx/gobierno" title="Gobierno">Gobierno</a></li>
                    <li><a href="https://www.gob.mx/busqueda"><img src="https://framework-gb.cdn.gob.mx/landing/img/lupa.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!--div class="container top">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-4 cabeza text-center">
                <?php echo anchor("http://www.presidencia.gob.mx/", img("presidencia.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
                    <?php echo anchor("http://www.conricyt.mx/", img("conricyt.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
                <?php echo anchor("http://edumed.imss.gob.mx/2010/", img("CES.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 cabeza">
                    <?php echo anchor("http://www.imss.gob.mx/", img("imss.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 cabeza"></div>
                        <a href="https://www.facebook.com/IMSS-Recursos-electr%C3%B3nicos-543427042484576/?fref=ts" target="_blank"><i class="fa fa-facebook-square fa-2x" style="color:#3a5795;"> </i></a> <a href="https://twitter.com/ImssElectr" target="_blank"><i class="fa fa-twitter-square fa-2x" style="color:#1da1f2;"> </i></a>
                 </div>
            </div>

            <div class="fb-like"></div>
        </div-->
        <!--header ends-->

        <!-- navegación -->
<?php
if (!is_null($menu)) {
    $menu = null;
}
echo $this->load->view("template/navbar.tpl.php", $menu, true);
// pr($this->session->userdata());
if ($this->session->has_userdata("usuario_logeado")) {
    // [matricula] => 311091403
    // [nombre] => MIGUEL ANGEL
    // [apaterno] => GONZALEZ
    // [amaterno] => GUAGNELLI
    ?>
            <div class="container">
                <div class="row text-right">
                    <div class="col-md-12 col-sm-12 col-xs-12 username">
                        <b>	<?php
            printf("Bienvenido: %s %s %s", $this->session->userdata("nombre"), $this->session->userdata("apaterno"), $this->session->userdata("amaterno"));
            ?>
                        </b>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<br> <br>";
        }
        ?>
        <!-- /.navegación -->
        <?php if (!is_null($main_title)) { ?>
            <header class="mastheadI">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="tituloI">
                                <?php echo $main_title ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
        <?php } ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" >
<?php if ($this->session->flashdata('success')) { ?>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="alert alert-success">
    <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } elseif ($this->session->flashdata('error')) {
    ?>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="alert alert-danger">
    <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } elseif ($this->session->flashdata('warning')) {
    ?>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="alert alert-error">
    <?php echo $this->session->flashdata('warning'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php
}
if (!is_null($main_content)) {
    echo $main_content;
}
?>
                </div>
            </div>
        </div>


        <!--div class="footer-wrap">
            <div class="container">
                <footer class="">
                    <div class="row">
                        <div class="col-lg-5">
                            <p>MESA DE AYUDA<br>
                                Teléfono : 56 27 69 00 Extensiones: 21146, 21147 y 21148<br>
                                Informes : <a href="mailto:recursoselectronicosimss@gmail.com">recursoselectronicosimss@gmail.com</a><br>
                                Horario: lunes - viernes: 8:00 AM a 16:00 hrs</p>
                        </div>
                        <div class="col-lg-7">
                            <p>PROBLEMAS CON EL ACCESO REMOTO<br>
                                Soporte CONRICYT<br>
                                <a href="mailto:soporte.conricyt@gmail.com">soporte.conricyt@gmail.com</a><br>
                                Consorcio Nacional de Recursos de Información Científica y Tecnológica CONRICYT<br>
                                Av. Insurgentes Sur 1582, Crédito Constructor, 03940<br>
                                Ciudad de México (55) 53 22 77 00 Ext. 4610 </p>
                            <p>Copyright &copy; IMSS 2014. Este sitio se visualiza mejor a partir de resoluciones 1024 px con Explorer 11 / Firefox 33.0 / Chrome 38.0</p>
                        </div>
                </footer>
            </div>
        </div-->
        <section class="elementor-section elementor-top-section elementor-element">
            <div class="elementor-background-overlay"></div>
            <div class="elementor-content">
                <div class="container">
                    <div class="title-desc text-justify">En 2014 la Coordinación de Educación en Salud, a través de la División de Innovación Educativa suscribió un convenio de colaboración entre el Instituto Mexicano del Seguro Social y el Consejo Nacional de Ciencia y Tecnología (CONACYT) por medio del Consorcio Nacional de Recursos de Información Científica y Tecnológica (CONRICYT) www.conricyt.mx
                        <br><br>Este convenio se derivó de la demanda en cobertura de necesidades de información, a partir de su implementación proporciona el acceso a diferentes fuentes de información especializadas en formato electrónico, colecciones de publicaciones científicas, libros electrónicos a texto completo, bases de datos bibliográficas y bases de datos para apoyar la toma de decisiones clínicas; todos ellos con una amplia diversidad temática, destinados a todo el personal del IMSS en de las unidades médicas de primer, segundo y tercer nivel de atención, a las unidades de Información del Sistema Bibliotecario del IMSS (SIBIMSS), las Unidades y Centros de Investigación en Salud, las Escuelas de Enfermería, los Centros de Investigación Educativa y Formación Docente (CIEFD) así como de Nivel Central.
                    </div>
                </div>
            </div>
        </section>
        <div style="clear:both;"></div><br>

<!-- Inicio de Pie de página -->
<footer class="panel-footer" id="pie">
    <section id="f-header" class="container-fluid">
        <div class="container">
            <div class="region region-separator3">
                <section id="block-block-2" class="block block-block contextual-links-region clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12" id="sn-title"><h4 style="text-align: center;">&nbsp;</h4></div>
                </section>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="f-CES" class="col-xs-12 col-sm-6 col-md-3">
            <div class="region region-footer-t1">
                <section id="block-block-41" class="block block-block contextual-links-region clearfix">
                    <p><img alt="" src="http://educacionensalud.imss.gob.mx/ces_wp/wp-content/uploads/2021/04/gob_logo_blanco.png" style="width: 229px; height: 76px;"></p>
                </section>
            </div>
        </section>
        <section id="f-menu" class="col-xs-12 col-sm-6 col-md-3">
            <div class="region region-footer-t2">
                <section id="block-block-33" class="block block-block contextual-links-region clearfix">
                    <p><span style="font-size:16px;"><span style="color:#ffffff; font-weight: bold;">Enlaces</span></span></p>
                    <p><span style="font-size:14px;">
                        <a href="https://www.gob.mx/participa"><span style="color:#ffffff;">Participa</span></a><br>
                        <a href="https://www.gob.mx/publicaciones"><span style="color:#ffffff;">Publicaciones Oficiales</span></a><br>
                        <a href="http://www.ordenjuridico.gob.mx/"><span style="color:#ffffff;">Marco Jurídico</span></a><br>
                        <a href="https://consultapublicamx.inai.org.mx/vut-web/"><span style="color:#ffffff;">Plataforma Nacional de Transparencia</span></a>
                    </span></p>
                </section>
            </div>
        </section>
        <section id="f-contact" class="col-xs-12 col-sm-12 col-md-3">
            <div class="fborder">
                <div class="region region-footer-t3">
                    <section id="block-block-1" class="block block-block contextual-links-region clearfix">
                        <div class="center-block block-contact withadress">
                            <address class="faddress">
                                <p><span style="color:#ffffff;"><span style="font-size:16px; font-weight: bold;">¿Qué es gob.mx?</span></span></p>
                                <p><span style="font-size:14px;"><span style="color:#ffffff;">Es el portal único de trámites, información y participación ciudadana.&nbsp;</span><ins><a href="https://www.gob.mx/que-es-gobmx"><span style="color:#ffffff;">Leer más</span></a></ins></span></p>
                                <p><span style="font-size:14px;"><a href="https://datos.gob.mx/"><span style="color:#ffffff;">Portal de datos abiertos</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/accesibilidad"><span style="color:#ffffff;">Declaración de accesibilidad</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/privacidadintegral"><span style="color:#ffffff;">Aviso de privacidad integral</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/privacidadsimplificado"><span style="color:#ffffff;">Aviso de privacidad simplificado</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/terminos"><span style="color:#ffffff;">Términos y condiciones</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion"><span style="color:#ffffff;">Política de seguridad</span></a></span></p>
                                <p><span style="font-size:14px;"><a href="https://www.gob.mx/sitemap"><span style="color:#ffffff;">Mapa del sitio</span></a></span></p>
                            </address>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section id="f-contact" class="col-xs-12 col-sm-12 col-md-3">
            <div class="fborder">
                <div class="region region-footer-t4">
                    <section id="block-block-42" class="block block-block contextual-links-region clearfix">
                        <p><span style="color:#ffffff;"><span style="font-size:16px; font-weight: bold;">Otros trámites</span></span></p>
                        <p><span style="color:#ffffff;"><span style="font-size:14px;">Mesa de ayuda: dudas e información</span></span></p>
                        <p><span style="color:#ffffff;"><span style="font-size:14px;"><a href="mailto:gobmx@funcionpublica.gob.mx">gobmx@funcionpublica.gob.mx</a></span></span></p>
                        <p><span style="color:#ffffff;"><span style="font-size:14px;">Denuncia contra servidores públicos</span></span></p>
                        <p><span style="color:#ffffff;"><span style="font-size:14px;">Síguenos en:</span></span></p>
                        <p><span style="font-size:14px;"><br><a href="https://www.facebook.com/gobmexico/"><img alt="" src="http://educacionensalud.imss.gob.mx/ces_wp/wp-content/uploads/2021/09/facebook.png" style="width: 24px; height: 24px;"></a><a href="https://twitter.com/GobiernoMX"><img alt="" src="http://educacionensalud.imss.gob.mx/ces_wp/wp-content/uploads/2021/09/twitter.png" style="width: 24px; height: 24px;"></a></span></p>
                    </section>
                </div>
            </div>
        </section>
    </div>
</footer>
<!-- Fin de Pie de página -->
    </body>
</html>
