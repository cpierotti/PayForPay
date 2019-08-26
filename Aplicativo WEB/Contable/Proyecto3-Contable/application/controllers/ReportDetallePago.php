<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'America/Los_Angeles');

class ReportDetallePago extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('ReporteExportExcel_Archivos_model');
        $this->load->library('export_excel');
    }

    function index() {
        $data['message'] = '';
        $usern['username'] = validatelogin($this->session->userdata('username'));
        $this->load->view('templates/tema-5/header');
        $this->load->view('templates/tema-default/mainmenu', $usern);
        $this->load->view('sistemaRecaudo/ReportPagoRecaudo', $data);
        $this->load->view('templates/tema-default/footer');
    }

    function exportToExcel() {

        $inicio = $this->input->post('inicio');
        $fin = $this->input->post('fin');
        $usern['username'] = validatelogin($this->session->userdata('username'));

        if ((($inicio != null || $inicio != '') && ($fin != null || $fin != '')) && $inicio < $fin) {
            $resultado = $this->ReporteExportExcel_Archivos_model->getTableEncabezadoArchivoToXLSByDate($inicio, $fin);
            if ($resultado) {
                $this->export_excel->to_excel($resultado, 'Reporte_Archivos');
            } else {
                $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> No hay registros entre las fechas seleccionadas</div>';
                $this->load->view('templates/tema-5/header');
                $this->load->view('templates/tema-default/mainmenu', $usern);
                $this->load->view('sistemaRecaudo/ReportPagoRecaudo', $data);
                $this->load->view('templates/tema-default/footer');
            }
        } elseif ($inicio == '' || $fin == '') {
            $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Formato de fecha no válido </div>';
            $this->load->view('templates/tema-5/header');
            $this->load->view('templates/tema-default/mainmenu', $usern);
            $this->load->view('sistemaRecaudo/ReportPagoRecaudo', $data);
            $this->load->view('templates/tema-default/footer');
        } elseif ($inicio >= $fin) {
            $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">La fecha inicial es mayor o igual a la final </div>';
            $this->load->view('templates/tema-5/header');
            $this->load->view('templates/tema-default/mainmenu', $usern);
            $this->load->view('sistemaRecaudo/ReportPagoRecaudo', $data);
            $this->load->view('templates/tema-default/footer');
        }
    }

    function formTodayReport() {
        $data['message'] = '';
        $usern['username'] = validatelogin($this->session->userdata('username'));
        $this->load->view('templates/tema-5/header');
        $this->load->view('templates/tema-default/mainmenu', $usern);
        $this->load->view('sistemaRecaudo/ReportPagoRecaudoToday', $data);
        $this->load->view('templates/tema-default/footer');
    }
    
    function exportExcelRep(){
        $resultado = $this->ReporteExportExcel_Archivos_model->getTableEncabezado_ArchivoToXLS_Today();
        $usern['username'] = validatelogin($this->session->userdata('username'));
        if($resultado){
            $this->export_excel->to_excel($resultado, 'Registros_Hoy');
        }else{
        $this->load->view('templates/tema-5/header');
        $this->load->view('templates/tema-default/mainmenu', $usern);
        $this->load->view("sistemaRecaudo/ReportPagoRecaudoToday");
        $this->load->view('templates/tema-default/footer');
            
        }
        
    }

}
