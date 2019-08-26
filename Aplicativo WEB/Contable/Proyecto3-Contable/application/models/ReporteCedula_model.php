<?php
ini_set('date.timezone', 'America/Los_Angeles');
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCedula_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getMovAfiliado($cedula){
        
        $cedulaid = $this->db->escape($cedula);
        $this->db->select("cedula_afiliado, nombre_afiliado, fecharecaudo, montopagado_movimiento");
        $this->db->from("afiliado, credito, movimiento");
        $this->db->where("afiliado.cedula=credito.cedula_afiliado AND credito.id=movimiento.id_credito AND credito.cedula_afiliado=$cedulaid");        
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
    }
    
    function getMovAfiliadoDatesAndCC($cedula, $fechaInicio, $FechaLimite){
        $cedula = $this->db->escape($cedula);
        $fechaInicio = $this->db->escape($fechaInicio);
        $FechaLimite = $this->db->escape($FechaLimite);
        
        $this->db->select("cedula_afiliado, nombre_afiliado, fecharecaudo, montopagado_movimiento");
        $this->db->from("afiliado, credito, movimiento");
        $this->db->where("afiliado.cedula=credito.cedula_afiliado AND credito.id=movimiento.id_credito  AND credito.cedula_afiliado = $cedula  AND (CAST(fecharecaudo AS DATE)) BETWEEN (CAST($fechaInicio AS DATE)) AND (CAST($FechaLimite AS DATE))");
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
        
    }
   
    
    
    
    }