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

       $usern['username'] = validatelogin($this->session->userdata('username'));
      $data['message'] = '';
      $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedula', $data);
        $this->load->view('templates/tema-default/footer');
     }
     
     function exportExcel(){
       $usern['username'] = validatelogin($this->session->userdata('username'));
         $cedula = $this->input->post('cedula');
     
         if(preg_match("/^[0-9]+$/", $cedula)){
            
                       if(  $cedula != ''){
               
                 $resultado = $this->ReporteCedula_model->getMovAfiliado($cedula);
                
                if($resultado){
                     $this->export_excel->to_excel($resultado, 'Reporte_Movimiento_Afiliado'); 
                }else{
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No se encuentran movimientos del afiliado</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedula', $data);
                $this->load->view('templates/tema-default/footer');
                }
           
              
            }else{
                 $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Debe llenar el campo de la cédula</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedula', $data);
                $this->load->view('templates/tema-default/footer');
            }
         }else{
              $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No se admiten letras, solo números</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedula', $data);
                $this->load->view('templates/tema-default/footer');
         }       
     } 
     
     function loadCCAndDates(){
       $usern['username'] = validatelogin($this->session->userdata('username'));
                  $data['message'] = '';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedulaAndDate', $data);
                $this->load->view('templates/tema-default/footer');
     }
     
     function exportExcelByDates(){
       $usern['username'] = validatelogin($this->session->userdata('username'));
         $cedula = $this->input->post('cedula');
         $inicio = $this->input->post('inicio');
         $fin = $this->input->post('fin');
         
     if(preg_match("/^[0-9]+$/", $cedula)){
          if($inicio != '' && $fin != ''){
              if($inicio <= $fin){
                  $resultado = $this->ReporteCedula_model->getMovAfiliadoDatesAndCC($cedula, $inicio, $fin);
                  if($resultado){
                       $this->export_excel->to_excel($resultado, 'Reporte_Movimiento_Afiliado_fechas');
                  }else{
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No se registran movimientos del cliente</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedulaAndDate', $data);
                $this->load->view('templates/tema-default/footer'); 
                  }
                  
              }else{
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> La fecha inicial debe ser menor a la fecha final</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedulaAndDate', $data);
                $this->load->view('templates/tema-default/footer');
              }
              
              
          }else{
              $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Debe ingresar las 2 fechas</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedulaAndDate', $data);
                $this->load->view('templates/tema-default/footer');
          }
             
             
         }else{
             $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Debe ingresar una cédula válida</div>';
                  $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainmenu');
      $this->load->view('Reportes/ReporteCedulaAndDate', $data);
                $this->load->view('templates/tema-default/footer');
         }
         
         
         
         
     }
}