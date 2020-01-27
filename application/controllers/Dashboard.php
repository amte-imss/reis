<?php   defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que gestiona EL DASHBOARD
 * @version 	: 1.0.0
 * @autor 		: Pablo José D.
 */

class Dashboard extends CI_Controller {
    /**
     * Carga de clases para el acceso a base de datos y obtencion de las variables de session
	 * @access 		: public
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model', 'ds_model');
        $this->load->model('Registro_model', 'mod_registro');
    }
    
    /**
     * Método que carga el formulario de búsqueda y el listado de publicaciones.
     * @autor 		: Jesús Díaz P.
	 * @modified 	: 
	 * @access 		: public
     */
    public function index()	{
        $this->config->load('general');
        $estado_agenda = $this->config->item('estado_agenda');
        $estado_taller = $this->config->item('estado_taller');
        //$matricula = $this->session->userdata('matricula');
        $datos['sesiones_programadas'] = $this->mod_registro->getSesion(array('conditions' => 'a_estado = ' . $estado_agenda['ACTIVO']['id'] . ' AND a_tipo=1', 'order' => array('field' => 'a_inicio', 'type' => 'DESC'), 'fields'=>'agenda_id, a_nombre, a_registro, a_evaluacion_inicio, a_evaluacion_fin, a_cupo, a_desc, a_estado, a_tipo, a_hr_inicio, a_hr_fin, a_registro_fin, a_duracion, a_liga, id_conferencia, texto_liga, (select min(a_agenda_fecha) from rist_agenda_fecha af where af.agenda_id = a.agenda_id) a_inicio, (select max(a_agenda_fecha) from rist_agenda_fecha af where af.agenda_id = a.agenda_id) a_fin, (select count(*) from rist_taller t where t.agenda_id = a.agenda_id and t.t_estado = true) inscritos, (select count(distinct asistencia.taller_id) from rist_asistencia asistencia inner join rist_taller t1 on t1.taller_id = asistencia.taller_id where t1.agenda_id = a.agenda_id and t1.t_estado = true) asistencia')); //buscamos las sesiones programadas
        $datos['sesiones_programadas_distancia'] = $this->mod_registro->getSesion(array('conditions' => 'a_estado = ' . $estado_agenda['ACTIVO']['id'] . ' AND a_tipo=2', 'order' => array('field' => 'a_inicio', 'type' => 'DESC'), 'fields'=>'a.*, (select count(*) from rist_taller t where t.agenda_id = a.agenda_id and t.t_estado = true) inscritos, (select count(distinct asistencia.taller_id) from rist_asistencia asistencia inner join rist_taller t1 on t1.taller_id = asistencia.taller_id where t1.agenda_id = a.agenda_id and t1.t_estado = true) asistencia')); //buscamos las sesiones programadas a distancia

        $this->template->setMainContent($this->load->view('dashboard/dashboard', $datos, TRUE));
        $this->template->getTemplate();
	}

}
