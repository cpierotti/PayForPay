<?php
ini_set('date.timezone', 'America/Los_Angeles');
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteExportExcel_Archivos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

   function getTableEncabezadoArchivoToXLSByDate($inicio, $fin){
      $inicio =  $this->db->escape((string)$inicio);
      $fin =  $this->db->escape((string)$fin);
      
   $this->db->select("Nombre_Archivo,NumeroDeFilas_Archivo,TotalRecaudado_Archivo,FechaHora_Archivo");
   $this->db->from("encabezado_archivo");
   $this->db->where("(CAST(FechaHora_Archivo as DATE)) BETWEEN (CAST($inicio as DATE))  AND (CAST($fin as DATE))");
   $query = $this->db->get();
               if($query->num_rows() > 0 )
			return $query;
		else {
			return false;
		}
   }
   
   
    function getTableEncabezado_ArchivoToXLS_Today(){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        
   $this->db->select("Nombre_Archivo,NumeroDeFilas_Archivo,TotalRecaudado_Archivo,FechaHora_Archivo");
   $this->db->from("encabezado_archivo");
   $this->db->where("(CAST(FechaHora_Archivo as DATE)) =", $curr_date);
   $query = $this->db->get();
   if($query->num_rows() > 0 )
			return $query;
		else {
			return false;
		}	
    }
}