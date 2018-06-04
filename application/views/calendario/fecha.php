<div class="row">

    <div class="col-md-3">
        <p class="lead">Recursos disponibles por editorial</p>
        <div class="list-group">
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/recursos.html" class="list-group-item">Recursos Electrónicos de información en Salud, REIS</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/JAMA.html" class="list-group-item">American Medical Association</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Ebsco.html" class="list-group-item">EBSCO México Inc., S.A. de C. V.</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Elsevier.html" class="list-group-item">Elsevier</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/England.html" class="list-group-item">The New England Journal of Medicine</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Lippincott.html" class="list-group-item">Lippincott Williams &amp; Wilkins (LWW) </a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Oxford.html" class="list-group-item">Oxford University Press</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Springer.html" class="list-group-item">Springer</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Science.html" class="list-group-item">Web of Science</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Vidal.html" class="list-group-item">Vidal Vademecum</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Wiley.html" class="list-group-item">Wiley</a>
            <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/Wolters.html" class="list-group-item">Wolters Kluwer Health</a>
        </div>

        <div><a href=""><?php echo img("anuncio_cuadrado.gif",array("class"=>"img-responsive")); ?></a></div><p>&nbsp;</p>
    </div>

    <div class="col-md-9">
        <div class="breadcrumbs6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <h1>
                            Sesiones en línea
                        </h1>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <ol class="breadcrumb pull-right">
                            <li>
                                <a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/index.html">
                                    Inicio
                                </a>
                            </li>
                            <li class="active">
                                Sesiones en línea
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="property gray2-bg">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9  wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;" data-wow-animation-name="fadeInLeft">
                        <!--<img src="img/GIF-300x250.gif" class="img-responsive">-->
                    <h1>Actualización para el aprovechamiento de recursos electrónicos de información en salud</h1>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-lg-3"><h3>SEDE</h3><p>En línea</p></div>
                    <div class="col-lg-3"><h4>Informes:</h4>
                        <p>Maestra Edit Romero Hernández<br>
                            Teléfono: 5627 6900, extensión 21152<br>
                            <em>email:</em> edit.romero@imss.gob.mx</p>
                    </div>
                    <div class="col-lg-3"> <h4>Requisitos Técnicos:</h4>
                        <p>Actualizar adobe conect<br>
                            Tener diadema con audífonos
                        </p><br>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>


            <div class="ui-60">

                <?php
                //pr($calendario);
                $meses = array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');

                //echo date("d-m-Y");
                //echo date("H:i", );
                ?>
                <div class="container">

                    <?php
                    $par = 1; // declaramos una variable para controlar el clearfix

                    foreach ($calendario as $fecha) {
                        $dia_actual = date("Y-m-d H:i:s");
                        $fecha_termino = strtotime($fecha['a_registro_fin']);
                        $mes = date("m", strtotime($fecha['a_inicio']));
                        $dia = date("d", strtotime($fecha['a_inicio']));
                        //pr($dia_actual);
                        $nombre = $fecha['a_nombre'];
                        $hinicio = date("H:i", strtotime($fecha['a_hr_inicio']));
                        $hfin = date("H:i", strtotime($fecha['a_hr_fin']));
                        $duracion = number_format($fecha['a_duracion']);
                        $liga = $fecha['a_liga'];
                        $status = $fecha['a_estado'];
                        $liga = site_url('registro/registrodistancia/' . $fecha['agenda_id']);
                        $circle = 'bg-grey';
                        $boton = '<a href="' . $liga . '" target="_blank" class="btn btn-black" disabled="disabled">Cerrado</a>';
                        if ($fecha_termino >= strtotime($dia_actual) && $fecha['a_estado'] == 1) {
                            $boton = '<a href="' . $liga . '" target="_blank" class="btn btn-info">Registrar</a>';
                            $circle = 'bg-green';
                        }
                        //<i class="fa fa-desktop orange"></i></h3>
                        ?><div class="col-md-4">
                            <!-- Pricing item -->
                            <div class="ui-item clearfix">
                                <a href="#" class="ui-price <?php echo $circle; ?> circle"> <?php echo $dia; ?> </a>
                                <div class="ui-plan">
                                    <!-- Plan name -->
                                    <h3><?php echo $meses[$mes]; ?>
                                        <!-- Plan details -->
                                        <h3><?php echo $nombre; ?> </h3>
                                        <p>HORA: <?php echo $hinicio; ?> - <?php echo $hfin; ?>  hr</p>
                                        <!--<div class="col-lg-12 col-md-12 col-sm-12"><?php echo $fecha['a_desc']; ?></div>-->
                                        <p>DURACIÓN: <?php echo $duracion; ?> hr</p>
                                        <?php echo $boton; ?>
                                </div>
                            </div>
                            <!-- Pricing item -->
                        </div>

                        <?php
                        if ($par % 2 == 0) {
                            echo '<div class="clearfix"></div>';
                        }
                        $par++;
                    }
                    ?>

                </div>
                <!-- Pricing item -->
            </div>
        </div>
    </div>
</div>
