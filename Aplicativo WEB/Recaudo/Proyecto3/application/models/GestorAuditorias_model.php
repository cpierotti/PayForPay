<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestorAuditorias_model extends CI_Model {
	function __construct(){
		 parent::__construct();
		 $this->load->database();
		 $this->load->helper('getIp');
	}

	function realizarAuditoria($data){

		date_default_timezone_set('America/Bogota');

		$username = $this->session->userdata('username');
		$rowd = $this->db->query('select id from usuario where username='.$this->db->escape($username));
		$data['id_Usuario'] = $rowd->row()->id;
		$data['Ip_Maquina_Auditoria'] =  getRealIP();
		$data['Fecha_Auditoria'] = date("Y-m-d\TH:i:sP");

		$this->db->insert('auditoria',$data);
	}

}

?>