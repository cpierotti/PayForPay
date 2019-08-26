<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'America/Los_Angeles');
class ReportArchivo extends CI_Controller {

     function __construct(){
  	   parent::__construct();
  	       $this->load->helper('form');
           $this->load->model('ReporteExportExcel_DetallePago_model');
           $this->load->library('export_excel');

     }

	function index()
	{
                 $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                 $data['message']='';
                   $usern['username'] = validatelogin($this->session->userdata('username'));

              $this->load->view('templates/tema-5/header');
		          $this->load->view('templates/tema-default/mainmenu',$usern);
              $this->load->view('sistemaRecaudo/ReportPagoDetalle', $data);
     	        $this->load->view('templates/tema-default/footer');
	}
        
        
        function exportToExcel(){
          $inicio =  $this->input->post('inicio');
          $fin =   $this->input->post('fin');
          $entidades = $this->input->post('selector');
           $usern['username'] = validatelogin($this->session->userdata('username'));
          
            if(  $inicio != '' && $entidades != '-1' && $fin != ''   ){
               
                if($inicio < $fin){
                 $resultado = $this->ReporteExportExcel_DetallePago_model->getTableDetallePagoToXLS_ByDate($entidades, $inicio, $fin );
               
                if($resultado){
                     $this->export_excel->to_excel($resultado, 'Reporte_Archivos'); 
                }else{
                    $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">No hay resultados entre las fechas comprendidas</div>'; 
                  $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalle', $data);
     	          $this->load->view('templates/tema-default/footer');
                }
           
                }else{
                     $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">La fecha inicial es mayor o igual a la fehca final</div>'; 
                  $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalle', $data);
     	          $this->load->view('templates/tema-default/footer');
                }
                  
            }else{
                     $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Tiene que especificar las fechas y la entidad</div>'; 
                  $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalle', $data);
     	          $this->load->view('templates/tema-default/footer');
            }
            
        }
        
        function FormexportXLSToday(){
                  $usern['username'] = validatelogin($this->session->userdata('username'));
                 $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                 $data['message']='';
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalleToday', $data);
     	          $this->load->view('templates/tema-default/footer');
        }
        
        function exportXLSToday(){
            $sel = $this->input->post('sel');
             $resultado = $this->ReporteExportExcel_DetallePago_model->getTableDetallePagoToXLS_Today($sel);
              $usern['username'] = validatelogin($this->session->userdata('username'));
          
            if($sel != '-1'){
              if($resultado){ 
             $this->export_excel->to_excel($resultado,'Registros_hoy');
             }else{
                 $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">No hay registro del dia de hoy</div>'; 
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalleToday', $data);
     	          $this->load->view('templates/tema-default/footer');
             } 
           }else{
                $data['entidades'] = $this->ReporteExportExcel_DetallePago_model->getEntidades();
                  $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">Seleccione una opción válida</div>'; 
                  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
                  $this->load->view('sistemaRecaudo/ReportPagoDetalleToday', $data);
     	          $this->load->view('templates/tema-default/footer');
           }
             
             
            
            
           
        }
        
	

}
