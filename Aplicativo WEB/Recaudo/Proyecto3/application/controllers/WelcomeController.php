<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends CI_Controller {

     function __construct(){
  	   parent::__construct();
  	   $this->load->helper('form');
     }


	function index()
	{
		  $usern['username'] = validatelogin($this->session->userdata('username'));
		  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu', $usern);
		  $this->load->view('pagina_principal');
     	  $this->load->view('templates/tema-default/footer');
	}
	

}
