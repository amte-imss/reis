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
          <th class="text-center"><?php echo date("d-m-Y", strtotime($sesiones['a_inicio'])); ?></th>
          <th class="text-center"><?php echo date("d-m-Y", strtotime($sesiones['a_fin'])); ?></th>
        </tr>
      </thead>
      <tbody>
      <?php
      foreach($students as $student){
        $data = "taller_id:{$student['taller_id']},sesion_id:{$sesiones['agenda_id']},";
      ?>
        <tr>
          <td><?php echo $student["usr_matricula"]?></td>
          <td><?php echo $student["fullname"]?></td>
          <td><?php echo $student["nom_delegacion"]?></td>
          <td><?php echo $student["nom_categoria"]?></td>
          <td><?php echo $student["cve_depto_adscripcion"]." - " . $student["nom_depto_adscripcion"]?></td>
          <td id="dayI_<?php echo $student['taller_id']?>" class="text-center">
            <?php
              if(!empty($student['asistencias']['I'])){
                if($student['asistencias']['I']["as_fecha"]==date("Y-m-d",strtotime($sesiones['a_inicio'])) ){
            ?>
                  <p>Si</p>
            <?php
                }else{
                    if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) == strtotime(date("Y-m-d"))){
            ?>
                        <input type="checkbox"
                          name="<?php echo "ck_I_".$student["taller_id"]?>"
                          id="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
                          value="<?php echo "ck_".$sesion["tipo"]."_".$student["taller_id"]?>"
                          class="asistencia"
                          data-taller="<?php echo $student["taller_id"]?>"
                          data-sesion="<?php echo $sesiones["agenda_id"]?>"
                          data-tipo="<?php echo "I"?>"
                          />
            <?php
                    }else{
                      if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
                          echo "A&uacute;n no es el día agendado para esta sesión.";
                      }else{
            ?>
                          <p>No</p>
            <?php
                      }
                    }
                }
              }else{
                if(strtotime(date("Y-m-d",strtotime($sesiones['a_inicio']))) == strtotime(date("Y-m-d"))){
            ?>
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
            <?php
                }else{
                    if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
                        echo "A&uacute;n no es el día agendado para esta sesión.";
                    }else{
            ?>
                        <p>No</p>
            <?php
                    }
                }
              }
            ?>
          </td>
          <td id="dayF_<?php echo $student['taller_id']?>" class="text-center">
            <?php
              if(!empty($student['asistencias']['F'])){
                if($student['asistencias']['F']["as_fecha"]==date("Y-m-d",strtotime($sesiones['a_fin'])) ){
            ?>
                    <p>Si</p>
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
                          data-tipo="<?php echo "F"?>"
                          />
            <?php
                    }else{
                      if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
                          echo "A&uacute;n no es el día agendado para esta sesión.";
                      }else{
            ?>
                          <p>No</p>
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
                      data-tipo="I"
                      onclick="saveAttandance('#<?php echo "finicio_".$student["taller_id"]?>');"
                      />
            <?php
                }else{
                    if(strtotime(date("Y-m-d",strtotime($sesiones['a_fin']))) > strtotime(date("Y-m-d"))){
                        echo "A&uacute;n no es el día agendado para esta sesión.";
                    }else{
            ?>
                        <p>No</p>
            <?php
                    }
                }
              }
            ?>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
  </div>
<?php
}
?>
