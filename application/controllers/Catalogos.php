<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
        $this->load->library('form_validation');
        $this->load->library('subquery');
	}

    public function _example_output($output = null) {
        $salida = $this->load->view('agenda/agenda.php', $output);
		//$this->template->setMainContent($salida);
		//$this->template->getTemplate();
	}

    function index() {
	    $crud = new grocery_CRUD();
//            $fecha_valida_unix = time() + ( 60 * 60 * 24);
//            $fecha_valida = date('Y-m-d', $fecha_valida_unix);
	    $crud->set_table('rist_agenda')
                ->where('a_tipo', '1')
//                ->where('a_estado','1')
//                ->where('a_inicio >', $fecha_valida)
	            ->set_subject('Taller')
                ->columns('a_nombre', 'a_registro', 'a_registro_fin', 'result_inicial', 'result_final', 'a_evaluacion_inicio', 'a_evaluacion_fin', 'a_cupo', 'a_estado')
                ->display_as('a_nombre', 'Nombre del taller')
                ->display_as('a_registro', 'Fecha inicial de registro')
                ->display_as('a_registro_fin', 'Fecha final de registro')
                ->display_as('result_inicial', 'Fecha inicial de taller')
                ->display_as('result_final', 'Fecha final de taller')
                ->display_as('result_fechas_view', 'Fechas de sesiones del taller')
                //->display_as('a_inicio', 'Fecha inicial de taller')
                //->display_as('a_fin', 'Fecha final de taller')
                ->display_as('a_evaluacion_inicio', 'Fecha inicial de evaluación')
                ->display_as('a_evaluacion_fin', 'Fecha final de evaluación')
                ->display_as('a_cupo', 'Cupo máximo')
                ->display_as('a_estado', 'Estado')
                ->display_as('a_desc', 'Descripción');

        $crud->set_primary_key('agenda_id');

        $crud->fields('a_nombre', 'a_registro', 'a_registro_fin', 'result_fechas_view', 'a_evaluacion_inicio', 'a_evaluacion_fin', 'a_cupo', 'a_desc', 'a_estado', 'a_tipo');
        
        $crud->required_fields('a_nombre', 'a_registro', 'a_registro_fin', 'a_inicio', 'a_fin', 'a_evaluacion_inicio', 'a_evaluacion_fin', 'a_cupo', 'a_estado');

        $crud->set_rules('a_cupo', '"Cupo"', 'integer|trim|max_length[3]');
        $crud->set_rules('a_registro', 'Fecha de inicio de registro', 'callback_fechas_registro[' . $this->input->post('a_registro_fin') . ']');
        $crud->set_rules('a_inicio', 'Fecha de inicio del taller', 'callback_fechas_sesion[' . $this->input->post('a_fin') . ']');
        $crud->set_rules('a_fin', 'Fecha final del taller', 'callback_fechas_evaluacion_i[' . $this->input->post('a_evaluacion_inicio') . ']');
        $crud->set_rules('a_evaluacion_inicio', 'Fecha inicial de evaluación', 'callback_fechas_evaluacion_f[' . $this->input->post('a_evaluacion_fin') . ']');

	    $crud->field_type('a_tipo', 'hidden', '1');
        $crud->field_type('a_estado', 'true_false', array('1' => 'Activo', '0' => 'Inactivo'));
        $crud->field_type('a_desc', 'text');
        $crud->unset_texteditor('a_desc', 'full_text');

        $crud->order_by('a_inicio', 'desc');

        //$crud->callback_column('Fecha inicial del taller', array($this, 'fit'));
        //$crud->callback_column('Fecha final del taller', array($this, 'fft'));

        $crud->add_subquery("result_inicial","rist_agenda_fecha","min(a_agenda_fecha)","rist_agenda_fecha.agenda_id = rist_agenda.agenda_id");
        $crud->add_subquery("result_final","rist_agenda_fecha","max(a_agenda_fecha)","rist_agenda_fecha.agenda_id = rist_agenda.agenda_id");

        $crud->add_action('Gestión de fechas', asset_url().'grocery_crud/themes/flexigrid/css/images/calendar.png', '', '', array($this, 'elemento_link'));
        //pr($this);
        //$funcbody = 'return \'+30 <input type="text" maxlength="50" value="'.$this->input->post('agenda_id').'" name="result_inicial_view" style="width:462px">\' ';
        /*$funcbody = 'return '.$this->input->post('result_inicial').';';
        $crud->callback_field('result_inicial_view', create_function ('$value, $primary_key', $funcbody));*/
        $crud->callback_field('result_fechas_view',array($this,'inicial_callback'));

	    $output = $crud->render();

        $this->template->setMainContent($this->load->view('agenda/agenda.php', $output, TRUE));
        $this->template->getTemplate();
	    //$this->_example_output($output);
    }

    /*function fit($value, $row) {
        $E = @$this->db->query('select min(a_agenda_fecha) as result_ini from rist_agenda_fecha where agenda_id = ?', array($row->agenda_id))->row()->result;
        return ($E) ? (string) $E : '0'; // or: return ($E) ? (string) $E : '~empty~';
    }
    function fft($value, $row) {
        $E = @$this->db->query('select max(a_agenda_fecha) as result_fin from rist_agenda_fecha where agenda_id = ?', array($row->agenda_id))->row()->result;
        return ($E) ? (string) $E : '0'; // or: return ($E) ? (string) $E : '~empty~';
    }*/

    function inicial_callback($value = '', $primary_key = null) {
        $this->db->where('agenda_id', $primary_key);
        $this->db->order_by('a_agenda_fecha asc');
        $query = $this->db->get('rist_agenda_fecha');
        //pr($this->db->last_query());
        $html = '<div style="display:flex;"><div class="col-lg-6">';
        foreach ($query->result() as $row) {
            $html .= $row->a_agenda_fecha.'</br>';
        }
        $html .= '</div>
            <div class="col-lg-6">
                <a href="'.site_url('/catalogos/gestion_fechas/'.$primary_key).'" class=" crud-action" title="Gestión de fechas">
                    <img src="'.asset_url().'grocery_crud/themes/flexigrid/css/images/calendar.png" alt="Gestión de fechas">
                </a>
            </div>
        </div>';
        return $html;
    }
    
    public function elemento_link($value, $row) {
       return site_url('catalogos/gestion_fechas/'.$row->agenda_id);
    }

    /**
     * @author JZDP
     * @fecha 17/12/2019
     * @param  $agenda_id Id de agenda
     * @return Vista
     * Gestión de fechas de los talleres
     */
    public function gestion_fechas($agenda_id) {
        try {
            //$this->db->schema = 'idiomas';
            $crud = new grocery_CRUD();
            $crud->set_table('rist_agenda_fecha');
            $crud->where('rist_agenda_fecha.agenda_id', $agenda_id);
            $crud->set_subject('Agenda de fechas');
            $crud->set_primary_key('agenda_fecha_id');
            $crud->columns('agenda_fecha_id','agenda_id','a_agenda_fecha');
            $crud->set_relation('agenda_id','rist_agenda','a_nombre');

            $crud->fields('rist_agenda_fecha.agenda_id', 'a_agenda_fecha');
            $crud->required_fields('a_agenda_fecha');
            $crud->display_as('a_agenda_fecha','Fecha de taller');

            $crud->field_type('rist_agenda_fecha.agenda_id', 'hidden', $agenda_id);

            $crud->display_as('agenda_fecha_id','ID fecha agenda');
            $crud->display_as('agenda_id','Agenda');
            $crud->display_as('a_agenda_fecha','Fecha');

            $crud->order_by('a_agenda_fecha', 'asc');

            /*$crud->fields('clave_grupo','clave_traduccion','clave_tipo','lang');
            $crud->required_fields('clave_grupo','clave_traduccion','clave_tipo','lang');
            $crud->display_as('clave_grupo','Clave Grupo');
            $opciones_clave_grupo = $this->idioma->obtener_claves_grupos();
            $crud->field_type('clave_grupo','dropdown',$opciones_clave_grupo);
            $crud->display_as('clave_tipo','Tipo de Componenete');
            $opciones_tipo_componente = $this->idioma->obtener_tipo_componente();
            $crud->field_type('clave_tipo','dropdown',$opciones_tipo_componente);
            $crud->unset_texteditor('lang', 'full_text');*/
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();

            $crud->callback_insert(array($this,'insertar_agenda_fecha_callback'));

            $output = $crud->render();
            /*$main_content = $this->load->view('idioma/gc_traduccion.tpl.php', $output, true);
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();*/
            $this->template->setMainContent($this->load->view('agenda/agenda_fecha.php', $output, TRUE));
            $this->template->getTemplate();
          } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    
    function insertar_agenda_fecha_callback($post_array) {
        //$this->load->library('encrypt');
        //$key = 'super-secret-key';
        //pr($post_array);
        //exit();
        $post_array['agenda_id'] = $post_array['rist_agenda_fecha_agenda_id'];

        unset($post_array['rist_agenda_fecha_agenda_id']);
        
        return $this->db->insert('rist_agenda_fecha',$post_array);
    }

    public function fechas_registro($pre, $inicio) {


	  //$fecha1=strftime($pre);
	  //$fecha2=strftime($inicio);
        $fecha1 = strtotime($pre);
        $fecha2 = strtotime($inicio);

	  //$fecha1=DateTime::createFromFormat('d/m/Y', $pre);
	  //$fecha2=DateTime::createFromFormat('d/m/Y', $inicio);

        if ($fecha1 >= $fecha2) {


	      $this->form_validation->set_message('fechas_registro', 'La {field} debe ser menor a la fecha final de preregistro del taller. Por favor verifíquelo');
	      return  FALSE;
        } else {
	       return TRUE;
	  }
	}

    public function fechas_sesion($inicio, $fin) {

	  //$fecha1=strftime($inicio);
	  //$fecha2=strftime($fin);
	  //$fecha1=DateTime::createFromFormat('d/m/Y', $inicio);
	  //$fecha2=DateTime::createFromFormat('d/m/Y', $fin);
        $fecha1 = strtotime($inicio);
        $fecha2 = strtotime($fin);
        if ($fecha1 > $fecha2) {


	      $this->form_validation->set_message('fechas_sesion', 'La {field} debe ser menor a la fecha de fin del taller. Por favor verifíquelo');
	      return  FALSE;
        } else {
	       return TRUE;
	  }
	}

    public function fechas_evaluacion_i($inicio_eva, $fin_eva) {

	  //$fecha1=strftime($inicio_eva);
	  //$fecha2=strftime($fin_eva);
        $fecha1 = strtotime($inicio_eva);
        $fecha2 = strtotime($fin_eva);
	  //$fecha1=DateTime::createFromFormat('d/m/Y', $inicio_eva);
	  //$fecha2=DateTime::createFromFormat('d/m/Y', $fin_eva);
        if ($fecha1 > $fecha2) {


	      $this->form_validation->set_message('fechas_evaluacion_i', 'La {field} debe ser menor a la fecha inicial de la evaluación. Por favor verifíquelo');
	      return  FALSE;
        } else {
	       return TRUE;
	  }
	}

    public function fechas_evaluacion_f($inicio_eva, $fin_eva) {

	  //$fecha1=strftime($inicio_eva);
	  //$fecha2=strftime($fin_eva);
        $fecha1 = strtotime($inicio_eva);
        $fecha2 = strtotime($fin_eva);
	  //$fecha1=DateTime::createFromFormat('d/m/Y', $inicio_eva);
	  //$fecha2=DateTime::createFromFormat('d/m/Y', $fin_eva);
        if ($fecha1 > $fecha2) {


	      $this->form_validation->set_message('fechas_evaluacion_f', 'La {field} debe ser menor a la fecha final de la evaluación. Por favor verifíquelo');
	      return  FALSE;
        } else {
	       return TRUE;
	  }
	}

    /**
     * Grud para rist_categoria
     * @author Christian Garcia
     */
    public function categorias() {
        $crud = new grocery_CRUD();
        $crud->set_table('rist_categoria')
                ->display_as("nom_categoria", "Categoría")
                ->display_as("des_clave", "Clave")
                ->display_as("cve_tipo_categoria", "Clave Tipo")
                ->display_as("nom_tipo_cat", "Tipo");

        $output = $crud->render();

        $this->template->setMainContent($this->load->view('catalogos/categorias.php', $output, TRUE));
        $this->template->getTemplate();
    }

    /**
     * Grud para rist_departamentos
     * @author Christian Garcia
     */
    public function departamentos() {
        $crud = new grocery_CRUD();
        $crud->set_table('rist_departamentos');

        $output = $crud->render();

        /* uso la misma vista que categorias ya que no solo sirve para mostrar el grud */
        $this->template->setMainContent($this->load->view('catalogos/categorias.php', $output, TRUE));
        $this->template->getTemplate();
    }

    /**
     * Grud para rist_delegacion
     * @author Christian Garcia
     */
    public function delegaciones() {
        $crud = new grocery_CRUD();
        $crud->set_table('rist_delegacion');

        $output = $crud->render();

        /* uso la misma vista que categorias ya que no solo sirve para mostrar el grud */
        $this->template->setMainContent($this->load->view('catalogos/categorias.php', $output, TRUE));
        $this->template->getTemplate();
    }
}
