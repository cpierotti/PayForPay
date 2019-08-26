<?php
ini_set('date.timezone', 'America/Los_Angeles');
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

    	function login($datos){
		$nombre = $datos['username'];
		$contrasena = $datos['password'];
		
		$query = $this->db->query("SELECT NombreUsuario , ApellidoUsuario 
			FROM usuario 
			WHERE 
			UserName = ".$this->db->escape($nombre)."
			AND Contrasena = ".$this->db->escape($contrasena));
		
		if($query->num_rows() > 0 )
			return $query;
		else {
			return false;
		}	
	}

}