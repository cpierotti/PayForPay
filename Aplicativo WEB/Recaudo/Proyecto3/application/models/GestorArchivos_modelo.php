<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestorArchivos_modelo extends CI_Model {
	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

	function obtenerEntidades(){

		$query = $this->db->get("entidad_pago");
		
		if($query->num_rows() > 0 )
			return $query->result();
		else {
			return false;
		}	
	}

	function subirArchivos($data){
		$this->db->insert('detalle_pago',$data);
		return $this->db->insert_id();
	}

	function subirEncabezado($data){
		$this->db->insert('encabezado_archivo',$data);
		return $this->db->insert_id();
	}

	function subirEntidad($data){
		$this->db->insert('entidad_bancaria',$data);
	}

	function subirEfecty($data){
		$this->db->insert('efecty',$data);
	}

}

?>