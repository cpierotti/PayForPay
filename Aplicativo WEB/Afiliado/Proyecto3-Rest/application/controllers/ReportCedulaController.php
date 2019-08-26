<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'America/Los_Angeles');
class ReportCedulaController extends CI_Controller {

 function __construct(){
   parent::__construct();
   $this->load->helper('form');
   $this->load->model('ReporteCedula_model');
   $this->load->library('export_excel');
 }
 
 function index(){

  $data['message'] = '';
  $this->cargarVistaD($data);
}

function exportExcel(){
 $usern['cedula'] = validatelogin($this->session->userdata('username'));
 
 
 if(  $usern['cedula'] != ''){               
   $resultado = $this->ReporteCedula_model->getMovAfiliado($usern['cedula']);
   
   if($resultado){
     $this->export_excel->to_excel($resultado, 'Reporte_Movimiento_Afiliado'); 
   }else{
    $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No se encuentran movimientos del afiliado</div>';
    $this->cargarVista($data);
  }
  
}else{
 $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Debe llenar el campo de la cédula</div>';
 $this->cargarVista($data);
}

}



     function exportExcelByDates(){
       $usern['cedula'] = validatelogin($this->session->userdata('username'));

         $inicio = $this->input->post('inicio');
         $fin = $this->input->post('fin');
         

          if($inicio != '' && $fin != ''){
              if($inicio <= $fin){
                  $resultado = $this->ReporteCedula_model->getMovAfiliadoDatesAndCC( $usern['cedula'], $inicio, $fin);
                  if($resultado){
                       $this->export_excel->to_excel($resultado, 'Reporte_Movimiento_Afiliado_fechas');
                  }else{
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No se registran movimientos del cliente</div>';
                  $this->cargarVistaD($data); 
                  }
                  
              }else{
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> La fecha inicial debe ser menor a la fecha final</div>';
                  $this->cargarVistaD($data);
              }
              
              
          }else{
              $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Debe ingresar las 2 fechas</div>';
              $this->cargarVistaD($data);
          }
             
             
         }



private function cargarVista($data )
{
    $usern['cedula'] = validatelogin($this->session->userdata('username'));
    $this->load->view('templates/tema-default/header');
    $this->load->view('templates/tema-default/mainmenu',$usern);
    $this->load->view('Reportes/ReporteCedula', $data);
    $this->load->view('templates/tema-default/footer');
}

private function cargarVistaD($data )
{
    $usern['cedula'] = validatelogin($this->session->userdata('username'));
    $this->load->view('templates/tema-default/header');
    $this->load->view('templates/tema-default/mainmenu',$usern);
    $this->load->view('Reportes/ReporteCedulaAndDate', $data);
    $this->load->view('templates/tema-default/footer');
}
  
}