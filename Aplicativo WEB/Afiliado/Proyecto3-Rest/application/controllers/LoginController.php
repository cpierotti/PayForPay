<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

     function __construct(){
  	   parent::__construct();
  	   $this->load->helper('form');
       $this->load->model('Login_model');
       $this->load->model('Usuarios_model');
       $this->load->library('recaptcha');
       $this->load->helper('security');
     }



	function index()
	{
      $data['message'] = '';
		   $this->cargarVista($data);
                  
	}
        
        
    public function capturarDatosSess(){

            $this->form_validation->set_rules('username', 'Cedula', 'required');


            $username = $this->input->post('username');
 	          $captcha_answer = $this->input->post('g-recaptcha-response');

            $response = $this->recaptcha->verifyResponse($captcha_answer);
      
 	           $info = array(
                'username' => $username);
            
            $data['message'] = '<div style="width:100%; background: rgba(0,0,0,0.2); color:#5e2129; opacity:0.8;"  role="alert"><h3>Error!</h3> Credenciales no validas </div>';
            if($response['success'] == false){
                $data['message'] = '<div style="width:100%; background: rgba(0,0,0,0.2); color:#5e2129; opacity:0.8; " role="alert"><h3>Error!</h3> Por favor ingrese todos los campos </div>';
            }
            if($this->form_validation->run() == true)
            {

                $resultado = $this->Login_model->login($info);

                if($resultado && $response['success']){                 

                    $arrayPrueba = $this->Usuarios_model->obtenerAfiliado($username);

                    foreach ($arrayPrueba as $row) {
                      foreach ($row as $key => $value) {
                        $arrayCliente[$key] = $value;
                      }
                      
                    }

                    $arrayCliente['username'] = $username;

                    $this->session->set_userdata($arrayCliente);
                    
                    //Carga la direccion de las vistas
                     $link = base_url().'index.php/WelcomeController';
                     redirect($link);
                 
               }else{
               	   $this->cargarVista($data);
              }
          }else
          {
             $this->cargarVista($data);
          }
      }
      
  private function cargarVista($data)
  {
      $this->load->view('templates/tema-iniciosesion/header');
      $this->load->view('moduloSesion/login_rest', $data);
      $this->load->view('templates/tema-iniciosesion/footer');
  }  

  public function show_error(){
      $data['message'] = '<div style="width:100%; background: rgba(0,0,0,0.2); color:#5e2129; opacity:0.8;" role="alert"><h3>Error!</h3> Por favor ingrese las credenciales para poder acceder al portal</div>';
      $this->load->library('recaptcha');
      $this->cargarVista($data);
  }

	  
  public function cerrarSesion(){
     $this->session->sess_destroy();
    redirect('LoginController');  
 }

}
