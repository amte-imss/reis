<div style="color:#333;">
	<p>Estimado(a) <b><?php echo $usuario->usr_nombre.' '.$usuario->usr_paterno.' '.$usuario->usr_materno; ?></b>,</p>
	<p>Le agradecemos su interes en los Talleres de actualizaci&oacute;n para el uso de los recursos de informaci&oacute;n en salud, lamentamos que haya tenido que cancelar su registro al taller <b>"<?php echo $agenda[0]['a_nombre']; ?>"</b>, pero esperamos que en futuras sesiones nos pueda acompa&ntilde;ar.</p>
	<br>
	<p>* Le recordamos que debe tener en cuenta las siguientes restricciones:</p>
	<p>a) S&oacute;lo puede estar inscrito en un taller por a&ntilde;o</p>
	<p>b) S&oacute;lo es posible cancelar y reprogramar en 1 ocasi&oacute;n la fecha de su preferencia</p>
	<br>
	<p>Para cualquier duda o comentario no dude en comunicarse con nosotros.</p>
	<b>Contacto:</b> Maestra Edit Romero Hernández <br>
	<b>Correo electr&oacute;nico:</b> <a href="edit.romero@imss.gob.mx">edit.romero@imss.gob.mx</a><br>
	<b>Teléfono:</b> 5627 6900 ext. 21152<bR>
	<a href="http://innovacioneducativa.imss.gob.mx/imss_conricyt/">Sitio Web del convenio IMSS CONRICYT</a>
	<br>
	<p>ATTE: Divisi&oacute;n de Innovaci&oacute;n Educativa, IMSS</p>
</div>
<?php
if(isset($validarNumeroCancelaciones) && !empty($validarNumeroCancelaciones))
{ 
	if($validarNumeroCancelaciones['total']==1) //En caso de que solo se tenga una cancelación, se muestra un mensaje que da la opción de reagenda
	{
		echo js('registro/cancelacion_exitosa.php');
	}
} ?>