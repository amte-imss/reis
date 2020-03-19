<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario_model extends CI_Model {

    // Call the CI_Model constructor
    public $tipo_asistencia = array("I" => 1, "F" => 2);

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get_calendario()
    {
        $this->db->select("*, case when a_registro_fin > now() and a_estado = 1 then 1 else 0 end ordenamiento");
        $this->db->where('a_tipo', 2);
        $this->db->where('a_estado', 1);
        $this->db->order_by('ordenamiento desc, a_inicio');
        $query = $this->db->get('rist_agenda');
        //pr($this->db->last_query());

        $resultado = $query->result_array();

        return $resultado;
    }

    /**
     * @author Christian Garcia
     * @return lista de sesiones presenciales activas
     */
    public function get_calendario_presencial()
    {
        $this->db->select("a.agenda_id, a_nombre, a_registro, a_evaluacion_inicio, a_evaluacion_fin, a_cupo, 
            a_desc, a_estado, a_tipo, a_hr_inicio, a_hr_fin, a_registro_fin, a_duracion, a_liga, id_conferencia, texto_liga, 
            min(af.a_agenda_fecha) a_inicio, max(af.a_agenda_fecha) a_fin,
            , (case when now() between a_registro and a_registro_fin then true else false end) as 'activo_registro',
            , case when a_registro_fin > now() and a_estado = 1 then 1 else 0 end ordenamiento", false);
        $this->db->where('a_tipo', 1);
        $this->db->where('a_estado', 1);
        $this->db->order_by('ordenamiento desc, a_inicio');

        $this->db->join('rist_agenda_fecha af', 'af.agenda_id = a.agenda_id', 'left');

        $this->db->group_by('a.agenda_id');

        $query = $this->db->get('rist_agenda a');
        //pr($this->db->last_query());

        $resultado = $query->result_array();

        return $resultado;
    }

}