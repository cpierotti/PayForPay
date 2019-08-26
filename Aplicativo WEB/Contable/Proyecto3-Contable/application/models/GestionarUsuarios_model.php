<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionarUsuarios_model extends CI_Model {
	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

	function obtenerAfiliados($limite,$comienzo){

		$limite = $this->db->escape($limite);
        $comienzo = $this->db->escape($comienzo);

		$query = $this->db->query("SELECT * FROM afiliado 
		LIMIT $limite 
		OFFSET $comienzo");
		
		if($query->num_rows() > 0 )
			return $query->result();
		else {
			return false;
		}	
	}

	function obtenerAfiliado($cedula){
		$query = $this->db->query("
		SELECT * 
		FROM afiliado 
		WHERE cedula=".$this->db->escape($cedula));

		if($query->num_rows() > 0 )
			return $query->result();
		else {
			return false;
		}	
	}
	

	function actualizarUsuario($cedula , $datos){

		$this->db->where('cedula',$cedula);
		$query = $this ->db->update('afiliado',$datos);

		return $query;

	}

	function obtenerNumeroAfiliados(){

		$query = $this->db->query('SELECT count(*) as number FROM afiliado');
		$number = $query->row()->number;

        return intval($number);
	}

	function crearAfiliado($data){

		$query = $this->db->insert('afiliado', $data);
		return $query;

	}

}

?>