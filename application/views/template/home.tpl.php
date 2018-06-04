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
        <?php echo css("bootstrap.css"); ?>
        <?php echo css("font-awesome.min.css"); ?>
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


<div class="network-bar"> 
            <a class="jama-network" href="/" title="Recursos Electrónicos de Información en Salud">Recursos Electrónicos de Información Salud</a>
            </div>
        <!-- Header starts-->
        <!-- <div class="container top">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3  col-xs-4 cabeza text-center">
        <?php
        echo anchor("http://www.presidencia.gob.mx/", img("presidencia.png", array("class" => "img-responsive")
                ), 'target="_blank"');
        ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
        <?php
        echo anchor("http://www.conricyt.mx/", img("conricyt.png", array("class" => "img-responsive")
                ), 'target="_blank"');
        ?>

                </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
        <?php
        echo anchor("http://edumed.imss.gob.mx/2010/", img("CES.png", array("class" => "img-responsive")
                ), 'target="_blank"');
        ?>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 cabeza">
        <?php
        echo anchor("http://www.imss.gob.mx/", img("imss.png", array("class" => "img-responsive")
                ), 'target="_blank"');
        ?>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 cabeza"></div>
                  <a href="http://acceso.conricyt.mx/auth/registration.php?profile=new" target="_blank"><button type="button" class="btn btn-primary"> Registra tu acceso remoto</button></a>
                  <a href="https://www.facebook.com/IMSS-Recursos-electr%C3%B3nicos-543427042484576/?fref=ts" target="_blank"><i class="fa fa-facebook-square fa-2x" style="color:#3a5795;"> </i></a> <a href="https://twitter.com/ImssElectr" target="_blank"><i class="fa fa-twitter-square fa-2x" style="color:#1da1f2;"> </i></a>
            </div>

            <div class="fb-like"></div>
        </div>
    </div> -->
        <div class="container top">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3  col-xs-4 cabeza text-center">
                  <!-- <a href="http://www.presidencia.gob.mx/" target="_blank"><img class="img-responsive" src="img/presidencia.png"></a> -->
<?php echo anchor("http://www.presidencia.gob.mx/", img("presidencia.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
                  <!-- <a href="http://www.conricyt.mx/" target="_blank"><img class="img-responsive" src="img/conricyt.png"></a> -->
<?php echo anchor("http://www.conricyt.mx/", img("conricyt.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 cabeza">
                  <!-- <a href="http://edumed.imss.gob.mx/2010/" target="_blank"><img class="img-responsive" src="img/CES.png"></a> -->
<?php echo anchor("http://edumed.imss.gob.mx/2010/", img("CES.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 cabeza">
                  <!-- <a href="http://www.imss.gob.mx/" target="_blank"><img class="img-responsive" src="img/imss.png"></a> -->
                    <?php echo anchor("http://www.imss.gob.mx/", img("imss.png", array("class" => "img-responsive")), 'target="_blank"'); ?>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 cabeza"></div>
                        <a href="https://www.facebook.com/IMSS-Recursos-electr%C3%B3nicos-543427042484576/?fref=ts" target="_blank"><i class="fa fa-facebook-square fa-2x" style="color:#3a5795;"> </i></a> <a href="https://twitter.com/ImssElectr" target="_blank"><i class="fa fa-twitter-square fa-2x" style="color:#1da1f2;"> </i></a>
                 </div>
            </div>

            <div class="fb-like"></div>
        </div>
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
            <?php }
        ?>

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


        <div class="footer-wrap">
            <div class="container">

                <hr>

                <!-- Footer -->
                <footer class="">
                    <div class="row">
                        <div class="col-lg-5">
                            <p>MESA DE AYUDA<br>

                                Teléfono : 56 27 69 00 Exts. 21146, 21147 y 21148<br>

                                Red: 865021146, 865021147, 865021148<br>

                                Correo electrónico : <a href="mailto:acceso.edumed@imss.gob.mx">acceso.edumed@imss.gob.mx</a><br>

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

        </div>
    </body>
</html>
