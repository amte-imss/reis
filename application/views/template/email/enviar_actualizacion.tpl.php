	<h2>Estimado(a) <b><?php echo $usuario["fullname"]?></b>.</h2>
	<p>En atención a tu registro al taller "<?php echo $agenda[0]['a_nombre']?>", te hacemos llegar la
	siguiente información que ha sido actualizada recientemente.  Por favor verifica los datos de tu
	inscripción:</p>

    <p>Fecha: <b><?php echo date("d-m-Y", strtotime($agenda[0]['a_inicio'])); ?></b></p>
	<p>Hora: <b><?php echo date("H:i",strtotime($agenda[0]['a_hr_inicio'])); ?></b> hr</p>
	<p>Duración: <b><?php echo $agenda[0]['a_duracion']; ?></b> horas</p>
	<p>Modalidad: Sesión en línea</b></p>
	<p>Descripción: <b><?php echo $agenda[0]['a_desc']; ?></b></p>

	<br>

    <?php
    if(empty($agenda[0]['a_liga']))
    {
    ?>
		<p>Para poder unirte a la sesión, se te enviará un correo con la liga de acceso antes del inicio del taller, al
		recibirla, sólo ingresa a la liga de acceso en la fecha y hora mencionadas arriba, y
		sigue las instrucciones de la plataforma.</p>

    <?php
    }
    else
    {

	?>	<p>Para poder unirte a la sesión, sólo ingresa a la siguiente liga
	<a href="<?php echo $agenda[0]['a_liga']; ?>"><?php echo (isset($agenda[0]['texto_liga']) && !empty($agenda[0]['texto_liga'])) ? $agenda[0]['texto_liga'] : $agenda[0]['a_liga']; ?></a> en la fecha y hora
	mencionadas arriba, y sigue las instrucciones de la plataforma.</p>
    <?php
    }
    if(!empty($agenda[0]['id_conferencia']))
    {
    ?>
	<p>ID conferencia: <b><?php echo $agenda[0]['id_conferencia']; ?></b></p>
	<?php } ?>
	<br>
	<p>Nos interesa conocer  tu opinión sobre la capacitación, para ello, una vez terminado el taller te
	solicitamos contestar la encuesta de satisfacción que ponemos a tu disposición: </p>
	<p><a href="http://goo.gl/forms/TJtOycBbIXLUR3pt2">http://goo.gl/forms/TJtOycBbIXLUR3pt2</a></p>

	<br>
	<p>Para cualquier duda o comentario no dude en comunicarse con nosotros.</p>
	<b>Correo electr&oacute;nico:</b> <a href="mailto:recursoselectronicosimss@gmail.com">recursoselectronicosimss@gmail.com</a><br>
	<b>Teléfono:</b> 5627 6900 ext. 21152<bR>
	<a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/">Sitio Web del convenio IMSS CONRICYT</a>
	<br>
	<p>ATTE: Divisi&oacute;n de Innovaci&oacute;n Educativa, IMSS</p>
	<br><br>
	<!--<h3><b>* Esta misma información le será enviada por correo electrónico, en caso de no recibirla en su bandeja de entrada principal recuerde revisar su bandeja de spam (correo no deseado).</b></h3>-->
<?php
// <Pre>

// var_dump($sesiones);
// var_dump($student);
// </pre>
?>
