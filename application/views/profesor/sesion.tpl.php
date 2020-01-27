<br>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-8" class="vertical-align: text-center">
		<p><strong><?php echo $sesiones['a_nombre']?></strong></p>
		<ul class="list-unstyled">
			<li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				<?php echo $sesiones['fecha']?>
			</li>
			<li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				Fechas de registro: <?php echo '<b>'.date('d-m-Y h:i', strtotime($sesiones['a_registro'])).'</b> a <b>'.date('d-m-Y h:i', strtotime($sesiones['a_registro_fin'])).'</b>'; ?>
			</li>
			<li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				Fechas de evaluación: <?php echo '<b>'.date('d-m-Y h:i', strtotime($sesiones['a_evaluacion_inicio'])).'</b> a <b>'.date('d-m-Y h:i', strtotime($sesiones['a_evaluacion_fin'])).'</b>'; ?>
			</li>
			<li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				<?php echo empty($sesiones['a_desc'])? 'Sin descripción' :$sesiones['a_desc']?>
			</li>
			<li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				Cupo: <b><?php echo empty($sesiones['a_cupo'])? 'Cupo no definido' :$sesiones['a_cupo']?></b>
			</li>
                        <li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				Inscritos: <b><?php echo $num_students["inscritos"] ?></b>
			</li>
                         <!--li>
				<i class="fa fa-chevron-circle-right pr-10"></i>
				Alumnos que asistieron los dos días: <?php //echo $num_students["regulares"] ?>
			</li-->
		</ul>
	</div>
	<div class="col-sm-2 text-right">
	<?php
	if(isset($students)){
		echo form_open('/profesor/sendMessages', array('id'=>'form_message', 'class'=>'form-horizontal'));
		?>
		<input type="hidden" value="<?php echo $sesiones['agenda_id'] ?>" id="session_id" name="session_id" />
		<input type="submit" name="btn_submit" value="Enviar notificación" id="btn_submit" class="btn btn-perfil  btn">
		<?php
	}
	echo form_close();
	echo form_open('/profesor/export_data', array('id'=>'form_export', 'class'=>'form-horizontal'));
	?>
		<input type="hidden" value="<?php echo $sesiones['agenda_id'] ?>" id="session_id" name="session_id" />
		<br/>
		<input style="width: 140px" name="btn_submit" value="Exportar" id="btn_export" class="btn btn-perfil  btn">
	<?php
	echo form_close();
	?>
	</div>
	<div class="col-sm-1"></div>
</div>
<div class="row">
	<div class="col-sm-1"></div>

	<div class="col-sm-1"></div>
</div>
<div class="row">
	<div class="col-sm-12">
	<?php
	if(isset($students)){
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Matr&iacute;cula</th>
						<th>Nombre</th>
						<th>Delegaci&oacute;n</th>
						<th>Categor&iacute;a</th>
						<th>Adscripci&oacute;n</th>
						<?php 
						//pr($sesiones['fechas']);
						$fechas = explode(',',$sesiones['fechas']);
						foreach ($fechas as $key_fecha => $fecha) {
							//pr($fecha);
							echo '<th>'.date('d-m-Y',strtotime(explode('|',$fecha)[1])).'</th>';
						} ?>
						<!--th class="text-center"><?php //echo date("d-m-Y", strtotime($sesiones['a_inicio'])); ?></th>
						<th class="text-center"><?php //echo date("d-m-Y", strtotime($sesiones['a_fin'])); ?></th-->
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($students as $student){
					//pr($student);
					//$data = "taller_id:{$student['taller_id']},sesion_id:{$sesiones['agenda_id']},";
					?>
					<tr>
						<td><?php echo $student["usr_matricula"]?></td>
						<td><?php echo $student["fullname"]?></td>
						<td><?php echo $student["nom_delegacion"]?></td>
						<td><?php echo $student["nom_categoria"]?></td>
						<td><?php echo $student["cve_depto_adscripcion"]." - " . $student["nom_depto_adscripcion"]?></td>
						<?php foreach ($fechas as $key_fecha => $fecha) {
							//pr($student['asistencias']);
							//pr($fecha);
							$taller = explode('|',$fecha);
							echo '<th id="row_'.$taller[0].'_'.$student["taller_id"].'" class="text-center"><input type="checkbox"
								name="t_'.$taller[0].'_'.$student["taller_id"].'"
								id="t_'.$taller[0].'_'.$student["taller_id"].'"
								value="'.$taller[0].'"
								class="asistencia"
								data-taller="'.$student["taller_id"].'"
								data-agendafecha="'.$taller[0].'"
								'.((in_array($taller[0], explode(',',$student['asistencias']))) ? 'checked' : '').'
								onclick="saveAttandance(\'#t_'.$taller[0].'_'.$student["taller_id"].'\');"
								/></th>';
								//data-sesion="'.$sesiones["agenda_id"].'"
						} ?>
						<!--td id="dayI_<?php //echo $student['taller_id']?>" class="text-center">
							<?php
								/*if(!empty($student['asistencias']['I'])){
									if($student['asistencias']['I']["as_fecha"]==date("Y-m-d",strtotime($sesiones['a_inicio'])) ){ ?>
										<i class="fa fa-check pr-10"></i>
									<?php } else {
										if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) == strtotime(date("Y-m-d"))){ ?>
											<input type="checkbox"
												name="<?php echo "ck_I_".$student["taller_id"]?>"
												id="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
												value="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
												class="asistencia"
												data-taller="<?php echo $student["taller_id"]?>"
												data-sesion="<?php echo $sesiones["agenda_id"]?>"
												data-tipo="I"
													/>
										<?php } else {
											if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
													echo "A&uacute;n no es el día agendado para esta sesión.";
											} else { ?>
													<i class="fa fa-times pr-10"></i>
											<?php }
										}
									}
								} else {
									if(strtotime(date("Y-m-d",strtotime($sesiones['a_inicio']))) == strtotime(date("Y-m-d"))){ ?>
										<input type="checkbox"
											name="<?php echo "finicio_".$student["taller_id"]?>"
											id="<?php echo "finicio_".$student["taller_id"]?>"
											value="<?php echo "finicio_".$student["taller_id"]?>"
											class="asistencia"
											data-taller="<?php echo $student["taller_id"]?>"
											data-sesion="<?php echo $sesiones["agenda_id"]?>"
											data-tipo="I"
											onclick="saveAttandance('#<?php echo "finicio_".$student["taller_id"]?>');"
											/>
									<?php } else {
										if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
												echo "A&uacute;n no es el día agendado para esta sesión.";
										} else { ?>
											<i class="fa fa-times pr-10"></i>
										<?php }
									}
								}*/
							?>
						</td>
						<td id="dayF_<?php //echo $student['taller_id']?>" class="text-center">
							<?php
								/*if(!empty($student['asistencias']['F'])){
									if($student['asistencias']['F']["as_fecha"]==date("Y-m-d",strtotime($sesiones['a_fin'])) ){
									?>
											<i class="fa fa-check pr-10"></i>
									<?php
									}else{
											if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) == strtotime(date("Y-m-d"))){
									?>
													<input type="checkbox"
														name="<?php echo "ck_F_".$student["taller_id"]?>"
														id="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
														value="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
														class="asistencia"
														data-taller="<?php echo $student["taller_id"]?>"
														data-sesion="<?php echo $sesiones["agenda_id"]?>"
														data-tipo="F"
														/>
									<?php
											}else{
												if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
														echo "A&uacute;n no es el día agendado para esta sesión.";
												}else{
									?>
														<i class="fa fa-times pr-10"></i>
									<?php
												}
											}
									}
								}else{
									if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) == strtotime(date("Y-m-d"))){
									?>
											<input type="checkbox"
												name="<?php echo "finicio_".$student["taller_id"]?>"
												id="<?php echo "finicio_".$student["taller_id"]?>"
												value="<?php echo "finicio_".$student["taller_id"]?>"
												class="asistencia"
												data-taller="<?php echo $student["taller_id"]?>"
												data-sesion="<?php echo $sesiones["agenda_id"]?>"
												data-tipo="F"
												onclick="saveAttandance('#<?php echo "finicio_".$student["taller_id"]?>');"
												/>
									<?php
									}else{
										if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
												echo "A&uacute;n no es el día agendado para esta sesión.";
										}else{
										?>
												<i class="fa fa-times pr-10"></i>
										<?php
										}
									}
								} */
							?>
						</td-->
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
		<?php
	} else {
		?>
		<h3 class="text-center">A&uacute;n no hay estudiantes registrados</h3>
		<?php
	}
	?>
	</div>
</div>
<?php echo js("profesor/exportar.js"); ?>
