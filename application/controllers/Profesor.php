<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Clase que contiene las acciones del profesor
 * @version 	: 1.0.0
 * @author      : Miguel Guagnelli
 * */
class Profesor extends CI_Controller {

    public function __construct() {
		    parent::__construct();
            $this->load->library('form_complete');
            $this->load->library('form_validation');
            $this->load->config('email');
            $this->load->model("Profesor_model", "profe");
	  }

    /*     * *********P�gina de inicio
	 * @method: void index()
	 * @author: Miguel �ngel Gonz�lez Guagnelli
	 *
	 */

    function index() {
        $data["error"] = null;
        $this->load->model("Profesor_model", "profe");
        //$sesiones = $this->profe->getSesionList();
		//$data["sesiones"] = array_reverse($sesiones, true);
		$this->template->setTitle("Registro de asistencia");
        $main_contet = $this->load->view('profesor/index.tpl.php', $data, true);
		$this->template->setMainContent($main_contet);
		$this->template->getTemplate();
	}

    /*
     * Lista de talleres para el combo-box de selección filtrado por activos e inactivos
     * @params: id tipo de sesión 1 = activo, 2 = vacio, null = todas
     * @author: David Pérez Gordillo
     * * */

    function sesiones_ajax()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model("Profesor_model", "profe");
            //$sesiones = $this->profe->getSesionList();
            //pr($this->input->post());
            $mes = $this->input->post('rist_lista_meses', true);
            $params = $this->input->post(null, true);
            $sesiones = $this->profe->getSesionList($mes, $params);
            $sesiones = array_reverse($sesiones, true);
            $i=0;
            $resultado = [];
            foreach ($sesiones as $key=>$value)
            {
                $resultado[$i]["texto"] = $value;
                $resultado[$i]["valor"] = $key;
                $i++;
            }

            echo json_encode($resultado);
            exit();
        } else
        {
            redirect(site_url());
        }
    }

    /*     * *********Lista de Talleres
	 * Funci�n que cgenera el listado de cursos/talleres/sesiones programadas
	 * @method: sesi�n
	 * @author: Miguel �ngel Gonz�lez Guagnelli
	 */
    function sesion() {
        if ($this->input->is_ajax_request()) {
            $resultado = array('resultado' => FALSE, 'error' => '', 'data' => '');
            $this->load->model("Profesor_model", "profe");
            $sesion_id = $this->input->post("campo");
            $datos["sesiones"] = $this->profe->getSesion($sesion_id);
            $datos["students"] = $this->profe->getStudents($sesion_id);
            $datos["num_students"]["inscritos"] = $this->profe->getCountInscritos($sesion_id); //obtiene el número de alumnos inscritos
            //$datos["num_students"]["regulares"] = $this->profe->getCountRegulares($sesion_id); //obtiene el número de alumnos regulares
            //pr($datos);
            if (is_null($datos["sesiones"]) || is_null($datos["students"])) {
                $resultado['error'] = "No se han encontrado usuarios registrados, seleccione otro taller por favor.";
            } else {
				$resultado['resultado'] = true;
                $arrayOtro = [];
                //pr($datos);
                /*foreach ($datos["students"] as $clave => $valor) {
                    $asistenciasI = $this->profe->getAsistencias($valor["taller_id"]);
                    //pr($asistenciasI);
                    $datos["students"][$clave]['asistencias'] = $asistenciasI;
                    $asistenciasF = $this->profe->getAsistencias($valor["taller_id"], "F");
                    $datos["students"][$clave]['asistencias']["F"] = $asistenciasF;
                    $asistenciasM = $this->profe->getAsistencias($valor["taller_id"], "M");
                    $datos["students"][$clave]['asistencias']["M"][] = $asistenciasM;
                }*/
                $resultado['data'] = $this->load->view('/profesor/sesion.tpl.php', $datos, TRUE); //cargar vista
			}
            // pr($resultado);
            // echo "ok world ";
            echo json_encode($resultado);
            exit();
		} else {
			redirect(site_url());
		}
	}

	/***********Lista de asistencia
	 * Funci�n genera la lista de asitencia
	 * @method: void attendance()
	 * @author: Miguel �ngel Gonz�lez Guagnelli
	 */
    public function attendance() {
        if ($this->input->is_ajax_request()) {
            $fields = $this->input->post(NULL, TRUE);
            $datos['fields'] = $fields;
            // pr($fields);
            $this->load->model("Profesor_model", "profe");
			$datos["sesion"] = $this->profe->getSesion($fields["sesion_id"]);
			$datos["sesion"]["tipo"] = $fields["tipo"];
			$datos["sesion"]["taller_id"] = $fields["taller_id"];
            $datos["asistencia"] = $this->profe->getAsistencias($fields["taller_id"], $fields["tipo"]);
            $resultado['error'] = '';
			$resultado['resultado'] = true;
			// $resultado['data'] = "";
            $resultado['data'] = $this->load->view('/profesor/attendance_field.tpl.php', $datos, TRUE); //cargar vista

			echo json_encode($resultado);
			exit();
        } else {
			redirect(site_url());
		}
	}

	/***********Registro de asistencia
	 * Funci�n que permite al profesor registrar la asistencia de un asistente
	 * @method: void save_attendance()
	 * @author: Miguel �ngel Gonz�lez Guagnelli
	 */
    public function save_attendance() {
        if ($this->input->is_ajax_request()) {
            $fields = $this->input->post(NULL, TRUE);

            $this->load->model("Profesor_model", "profe");

			//$datos["sesion"] = $this->profe->getSesion($fields["sesion_id"]);

			$resultado = array('resultado'=>FALSE, 'msg'=>'Error inesperado contactar con el administrador.', 'data'=>'');
            /*$tipo = "";
            if($fields["tipo"] == "I"){
                $tipo = "a_inicio";
            }else if($fields["tipo"] == "F"){
                $tipo = "a_fin";
            }*/
            //$tipo = array("I"=>"a_inicio","F"=>"a_fin")[$fields["tipo"]];
            //pr($datos['sesion']);
            //pr($resultado);
            /*if (strtotime(date("Y-m-d", strtotime($datos["sesion"][$tipo]))) != strtotime(date("Y-m-d"))) {
                $resultado['error'] = "Not today men, keep waiting 'tll the big day";
				// $resultado['error']='Hoy es '.date("Y-m-d").' no coincide con la fecha programa para la sesi�n '. $sesion['a_inicio'].', favor de verificarlo con el responsable del programa.';
            } else { */
				//$datos["sesion"]["tipo"] = $fields["tipo"];
                //$datos["sesion"]["taller_id"] = $fields["taller_id"];
                //$datos["sesion"]["agenda_fecha_id"] = $fields["agendafecha"];

                //si la fecha de hoy es igual a la dse la sesi�n
                if($fields["check"] == 1){
                    $tosave = array(
                        "as_asistencia" => 1,
                        //"as_fecha" => date("Y-m-d"),
                        "taller_id" => $fields["taller_id"],
                        "agenda_fecha_id" => $fields["agendafecha"]
                    );
                    $tosave = $this->profe->saveAsistencias($tosave);
                } else {
                    $tosave = array(
                        "taller_id" => $fields["taller_id"],
                        "agenda_fecha_id" => $fields["agendafecha"]
                    );
                    $tosave = $this->profe->deleteAsistencias($tosave);
                }
                if (is_array($tosave) || $tosave == true) {
                    $datos["asistencia"] = $tosave;
                    $resultado['msg'] = 'Asistencia actualizada';
                    $resultado['resultado'] = true;
                    $datos['fields'] = $fields;
					// $resultado['data'] = "ok";//cargar vista
                } else {
                    $resultado['msg'] = "Ocurrio un error durante la actualización. Contactar con el administrador.";
                }
                $resultado['data'] = $this->load->view('/profesor/attendance_field.tpl.php', $datos, TRUE); //cargar vista
			//}
			echo json_encode($resultado);
			exit();
        } else {
			redirect(site_url());
		}
	}

    /*     * *********Env�o de notificaci�n de evaluaciones
	 * Funci�n env�o de notificaciones a los usuarios que acreditaron el taller
	 * @method: void sendMessages()
	 * @author: Miguel �ngel Gonz�lez Guagnelli
	 */

    public function sendMessages() {
        $sesion_id = $this->input->post("session_id");
        $this->load->model("Profesor_model","profe");
        $datos["sesiones"] = $this->profe->getSesion($sesion_id);


        $this->load->library('My_phpmailer');

        //$mail->IsSMTP(); // establecemos que utilizaremos SMTP
        //$mail->Host = "172.16.23.18";

        $mailStatus = $this->my_phpmailer->phpmailerclass();

		$students = $this->profe->getStudents($sesion_id);

        $notificaciones = $errores = $asistenciasCompletas = array();
        
        foreach ($students as $id => $student) {
            $mail = $this->my_phpmailer->phpmailerclass();
            //unset($student["asistencias"]);
            $datos["student"] = $student;
            //$asistI = $this->profe->getAsistencias($student["taller_id"]);
            //$asistF = $this->profe->getAsistencias($student["taller_id"], "F");
            // echo $student["usr_matricula"], "|agenda:$sesion_id" ;
            /*pr($asistI);
                pr($asistF);
                pr(strtotime($asistF["as_fecha"]));
                pr(strtotime(date("Y-m-d", strtotime($datos["sesiones"]['a_fin']))));
            if (strtotime(date("Y-m-d", strtotime($datos["sesiones"]['a_inicio']))) == strtotime($asistI["as_fecha"]) &&
            strtotime(date("Y-m-d", strtotime($datos["sesiones"]['a_fin']))) == strtotime($asistF["as_fecha"])) { ///Env�o de correo a usuarios que hallan tomado las 2 sesiones */
            //if (strtotime(date("Y-m-d", strtotime($datos["sesiones"]['a_fin']))) == strtotime($asistF["as_fecha"])) { ///Env�o de correo a usuarios que hallan tomado las 2 sesiones
            //if(isset($asistF) && !empty($asistF)) { //Se verifica que tenga la asistencia en la sesión final
            if(!is_null($student["asistencias"]) && !empty($student["asistencias"])) {
                $email = $this->load->view('profesor/mail_evaluation.tpl.php', $datos, true);
                $mail->addAddress($student["usr_correo"], $student["fullname"]);
                $mail->addBCC('eoz19059@gmail.com');
                $mail->Subject = 'Evaluación de los talleres :: Talleres IMSS';
                $mail->msgHTML(utf8_decode($email));
                        //$mail->AltBody = 'Mensaje de prueba';
                //$this->session->set_flashdata('success', $email);
                    if (!$mail->send()) {
                        $errores[] = $student;
                        //pr($mail->ErrorInfo);
                    }
                //
                $asistenciasCompletas[$student["usr_matricula"]] = true;
                $notificaciones[$id] = $student;
                //pr($student["usr_correo"].', '.$student["fullname"]);
            }
            //unset($asistI);
            //unset($asistF);
            unset($datos["student"]);
        }
        //pr($datos["sesiones"]);
        //pr($students);
        //exit();
        if (!empty($errores)) {
            $htmlError = "<p>Por alg&uacute;n control interno no se env&iacute;o correo a los siguientes usuarios:</p>";
            foreach ($errores as $keyE => $valueE) {
                $htmlError .= "- " . $valueE['fullname'] . "<br>";
            }
            $this->session->set_flashdata('success', $htmlError . "<br>Por favor verifique con el administrador.");
        }

        $emailStatus = $this->load->view('profesor/mail_lista_asistentes.tpl.php', $datos, true);
        //$mailStatus->addAddress('zurgcom@gmail.com'); //pruebas chris
        $mailStatus->addAddress('ingrid.soto@imss.gob.mx');
        //$mailStatus->addAddress('jesusz.unam@gmail.com');
        $mailStatus->addBCC('jesusz.unam@gmail.com');
        $mailStatus->Subject = 'Lista de asistentes al taller :: Talleres IMSS';
        $mailStatus->msgHTML(utf8_decode($emailStatus));

        $datos["students"] = $students;
        $datos["asistenciasCompletas"] = $asistenciasCompletas;

        $this->load->helper('file');
        $tabla = $this->load->view('profesor/tabla_inscritos.tpl.php', $datos, TRUE);
        $pathTabla = './xls/listado'.rand(0, 10000).'.xls';
        write_file($pathTabla, $tabla);

        $mailStatus->addAttachment($pathTabla, 'Lista Inscritos.xls');

        $datos["mail_lista_asistencia"] = $mailStatus->send();

        if (file_exists($pathTabla)) {
            unlink($pathTabla);
        }

        $datos["notificaciones"] = $notificaciones;

        $template = $this->load->view('profesor/notificaciones.tpl.php', $datos, true);
        $this->template->setMainContent($template);
        $this->template->getTemplate();
	}

    /**
     * Función que exporta los datos de la asistencia
     * de las sesiones
     * @author Cheko
     * @date 6/06/2018
     *
     */
    public function export_data(){
		if(!is_null($this->input->post())){ //Se verifica que se haya recibido información por método post
            $datos_busqueda = $this->input->post(null, TRUE); //Datos del formulario se envían para generar la consulta

            $datos_busqueda['export'] = TRUE;
            $sesion_id = $this->input->post("session_id");

            $datos["sesiones"] = $this->profe->getSesion($sesion_id);
            $datos["students"] = $this->profe->getStudents($sesion_id);
            $datos["num_students"]["inscritos"] = $this->profe->getCountInscritos($sesion_id); //obtiene el número de alumnos inscritos
            $datos["num_students"]["regulares"] = $this->profe->getCountRegulares($sesion_id); //obtiene el número de alumnos regulares

            //pr($datos);
            if (is_null($datos["sesiones"])) {

            } else {
                foreach ($datos["students"] as $clave => $valor) {
                    $asistencias = $this->profe->getAsistencias($valor["taller_id"]);
                    $datos["students"][$clave]['asistencias'] = $asistencias;
                    /*$asistenciasF = $this->profe->getAsistencias($valor["taller_id"], "F");
                    $datos["students"][$clave]['asistencias']["F"] = $asistenciasF;*/
                }
            }

			if($datos["sesiones"] > 0){
				$filename="Export_".date("d-m-Y_H-i-s").".xls";
				header("Content-Type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=$filename");
				header("Pragma: no-cache");
                header("Expires: 0");
            
                echo $this->load->view('/profesor/resultado_sesion.php', $datos, TRUE); //cargar vista
			} else {
				echo data_not_exist('No han sido encontrados datos con los criterios seleccionados. <script> $("#btn_export").hide(); </script>'); //Mostrar mensaje de datos no existentes
			}
		}
	}
}
