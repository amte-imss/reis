<?php
/*$tipo_campo = array("I"=>"a_inicio","F"=>"a_fin")[$sesion["tipo"]];
if(!empty($asistencia)){
// pr($asistencia);
	if($asistencia["as_fecha"]==date("Y-m-d",strtotime($sesion[$tipo_campo])) ){
	?>
		<i class="fa fa-check pr-10"></i>
	<?php
}elseif(strtotime(date("Y-m-d",strtotime($sesion['a_fin']))) == strtotime(date("Y-m-d"))){
	?>
		<input type="checkbox"
			name="<?php echo "ck_".$sesion["tipo"]."_".$sesion["taller_id"]?>"
			id="<?php echo "ck_".$sesion["tipo"]."_".$sesion["taller_id"]?>"
			value="<?php echo "ck_".$sesion["tipo"]."_".$sesion["taller_id"]?>"
			class="asistencia"
			data-taller="<?php echo $sesion["taller_id"]?>"
			data-sesion="<?php echo $sesion["agenda_id"]?>"
			data-tipo="<?php echo $sesion["tipo"]?>"
			/>
	<?php
}elseif(strtotime(date("Y-m-d",strtotime($sesion['a_fin']))) > strtotime(date("Y-m-d"))){
		echo "A&uacute;n no es el día agendado para esta sesión.";
	}else{
	?>
		<i class="fa fa-times pr-10"></i>
	<?php
	}
}else{
	if(strtotime(date("Y-m-d",strtotime($sesion[$tipo_campo]))) == strtotime(date("Y-m-d"))){
	?>
		<input type="checkbox"
			name="<?php echo "finicio_".$sesion["taller_id"]?>"
			id="<?php echo "finicio_".$sesion["taller_id"]?>"
			value="<?php echo "finicio_".$sesion["taller_id"]?>"
			class="asistencia"
			data-taller="<?php echo $sesion["taller_id"]?>"
			data-sesion="<?php echo $sesion["agenda_id"]?>"
			data-tipo="<?php echo $sesion["tipo"]?>"
			onclick="saveAttandance('#<?php echo "finicio_".$sesion["taller_id"]?>');"
			/>
	<?php
}elseif(strtotime(date("Y-m-d",strtotime($sesion['a_fin']))) > strtotime(date("Y-m-d"))){
		echo "A&uacute;n no es el día agendado para esta sesión.";
	}else{
	?>
		<i class="fa fa-times pr-10"></i>
	<?php
	}
}*/

echo '<input type="checkbox"
	name="t_'.$fields["agendafecha"].'_'.$fields["taller_id"].'"
	id="t_'.$fields["agendafecha"].'_'.$fields["taller_id"].'"
	value="'.$fields["agendafecha"].'"
	class="asistencia"
	data-taller="'.$fields["taller_id"].'"
	data-agendafecha="'.$fields["agendafecha"].'"
	'.(($fields["check"] == 1) ? 'checked' : '').'
	onclick="saveAttandance(\'#t_'.$fields["agendafecha"].'_'.$fields["taller_id"].'\');"
	/>';
?>