<div class="row">
    <?php echo js("profesor/profesor.js"); ?>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="panel panel-azul">
                <div class="breadcrumbs6">
                    <div class="container">
                        <h1 >
                            Registro de asistencias
                        </h1>
                    </div>
                </div>
                <div class="panel-body">	
                    <?php
                    if (exist_and_not_null($error))
                    {
                        ?>
                        <div class="row">
                            <div class="col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-md-10 col-sm-10 col-xs-10 alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php echo form_open('', array('id' => 'form_registro')); ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-4 text-right"><b class="rojo">*</b> Talleres programados:</label>
                            <div class="col-sm-6">
                                <div class="text-center">
                                    <?php 
                                    echo '<label>';
                                    echo $this->form_complete->create_element(
                                        array(
                                            'id' => 'rist_activo',
                                            'name' => 'rist_activo[]',
                                            'value' => '1',
                                            'type' => 'radio',
                                            'attributes' => array(
                                                'class' => 'form-control-personal radio_estatus',
                                                'data-placement' => 'bottom',
                                                'title' => 'Activo',
                                                'checked' => 'checked'
                                            )
                                        )
                                    );
                                    echo 'Activo</label> &nbsp;&nbsp; - &nbsp;&nbsp;
                                    <label>
                                    ';
                                    echo $this->form_complete->create_element(
                                        array(
                                            'id' => 'rist_activo',
                                            'name' => 'rist_activo[]',
                                            'value' => '0',
                                            'type' => 'radio',
                                            'attributes' => array(
                                                'class' => 'form-control-personal radio_estatus',
                                                'data-placement' => 'bottom',
                                                'title' => 'Inactivo',
                                            )
                                        )
                                    );
                                    echo 'Inactivo</label>';
                                    ?>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-pencil"> </span>
                                    <?php
                                    $lista_anio = array();
                                    for ($i=2016; $i <= date('Y')+1; $i++) { 
                                        $lista_anio[$i] = $i;
                                    }
                                    $lista_meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
                                
                                    echo $this->form_complete->create_element(
                                            array(
                                                'id' => 'rist_lista_anio',
                                                'type' => 'dropdown',
                                                'options' => $lista_anio,
                                                'first' => array('0' => 'Seleccione un año de inicio'),
                                                'attributes' => array(
                                                    'class' => 'form-control-personal',
                                                    'data-placement' => 'bottom',
                                                    'title' => 'Año',
                                                )
                                            )
                                    );

                                    echo $this->form_complete->create_element(
                                        array(
                                            'id' => 'rist_lista_meses',
                                            'type' => 'dropdown',
                                            'options' => $lista_meses,
                                            'first' => array('0' => 'Seleccione un mes de inicio'),
                                            'attributes' => array(
                                                'class' => 'form-control-personal',
                                                'data-placement' => 'bottom',
                                                'title' => 'Sesiones programadas',
                                            )
                                        )
                                );

                                    echo $this->form_complete->create_element(
                                            array(
                                                'id' => 'rist_sesiones',
                                                'type' => 'dropdown',
                                                'options' => '',
                                                'first' => array('0' => 'Seleccione un taller (Por fecha de inicio)'),
                                                'attributes' => array(
                                                    'class' => 'form-control-personal',
                                                    'data-placement' => 'bottom',
                                                    'title' => 'Sesiones programadas',
                                                )
                                            )
                                    );
                                    ?>                        
                                </div>
                                <?php echo form_error_format('rist_sesiones'); ?>
                            </div>
                            <div class="col-sm-2">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="row">
                        <div class="col-sm-12" id="list_usuarios"></div>									
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>