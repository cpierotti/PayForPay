<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

     function __construct(){
  	   parent::__construct();
  	   $this->load->helper('form');
       $this->load->model('Login_model');
       $this->load->library('recaptcha');
       $this->load->helper('security');
     }



	function index()
	{
      $data['message'] = '';
		  $this->load->view('templates/tema-default/header');
		  $this->load->view('moduloSesion/login_recaudo', $data);
      $this->load->view('templates/footer-login');
                  
	}
        
        
    public function capturarDatosSess(){
            $username = $this->input->post('username');
   	        $password = $this->input->post('password');
 	          $captcha_answer = $this->input->post('g-recaptcha-response');

            $response = $this->recaptcha->verifyResponse($captcha_answer);
      
 	           $info = array(
                'username' => $username,
               'password' => do_hash($password)
  		       );
            
            $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Credenciales no validas </div>';
            if($response){
                $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;"> Por favor ingrese todos los campos </div>';
            }

            $resultado = $this->Login_model->login($info);

            if($resultado ){
                $data = array('username' => $username);
                $this->session->set_userdata($data);
                
                //Carga la direccion de las vistas
                 $link = base_url().'index.php/WelcomeController';
                 redirect($link);
             
        }else{
           	    $this->load->view('templates/tema-default/header');
                $this->load->view('moduloSesion/login_recaudo', $data);
                $this->load->view('templates/footer-login');
        }
      }

  public function show_error(){
      $data['message'] = '<div style="color:#FF0000" class="height:10%; width:20%; padding-bottom:100px; margin-bottom: 50px;">Por favor ingrese las credenciales para poder acceder al portal</div>';
      $this->load->library('recaptcha');
      $this->load->view('templates/tema-default/header');
      $this->load->view('moduloSesion/login_recaudo', $data);
      $this->load->view('templates/footer-login');
  }

	  
  public function cerrarSesion(){
     $this->session->sess_destroy();
    redirect('LoginController');  
 }

}
