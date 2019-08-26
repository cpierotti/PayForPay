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
		
		$query = $this->db->query("SELECT * 
			FROM afiliado 
			WHERE 
			cedula = ".$this->db->escape($nombre));
		
		if($query->num_rows() > 0 )
			return $query;
		else {
			return false;
		}	
	}

}