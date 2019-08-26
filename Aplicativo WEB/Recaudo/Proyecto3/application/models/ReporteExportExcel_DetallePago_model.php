<?php
ini_set('date.timezone', 'America/Los_Angeles');
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteExportExcel_DetallePago_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

   function getTableDetallePagoToXLS_ByDate($idEntidadPago, $inicio, $limite){
       $idEntidadPago=  $this->db->escape($idEntidadPago);
       $inicio= $this->db->escape($inicio);
       $limite = $this->db->escape($limite);
       echo $inicio;
        $this->db->select("detalle_pago.FechaRecaudo , detalle_pago.Valor_Consignado, detalle_pago.Cedula, entidad_pago.Nombre_EntidadPago");
        $this->db->from("detalle_pago, entidad_pago");
        $this->db->where("detalle_pago.id_EntidadPago = entidad_pago.id AND entidad_pago.id = $idEntidadPago AND  (CAST( FechaRecaudo AS DATE )) BETWEEN (CAST( $inicio AS DATE )) AND (CAST( $limite AS DATE ))");
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return $query;
        }else{
            return false;
        }
        
   }
   
   function getTableDetallePagoToXLS_Today($idEntidadPago){
       $date = new DateTime("now");
       $curr_date = $date->format('Y-m-d');
      
       $idEntidadPago=  $this->db->escape($idEntidadPago);
       
        $this->db->select("detalle_pago.FechaRecaudo , detalle_pago.Valor_Consignado, detalle_pago.Cedula, entidad_pago.Nombre_EntidadPago");
        $this->db->from("detalle_pago, entidad_pago");
        $this->db->where("detalle_pago.id_EntidadPago = entidad_pago.id");
        $this->db->where("entidad_pago.id = $idEntidadPago");
        $this->db->where("(CAST( detalle_pago.FechaRecaudo AS DATE )) =", $curr_date);
        $query = $this->db->get();
        
       if($query->num_rows() > 0 ){
            return $query;
        }else{
            return false;
        }
       
       
   }
   
   function getEntidades (){
       $query = $this->db->query("select * from entidad_pago");
       return $query->result();
   }
   
    
}