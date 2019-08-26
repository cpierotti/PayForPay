<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class GuController extends CI_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('form');
      $this->load->model('GestionarUsuarios_model');

  	}

    private function obtenerSesion(){
     $usern['username'] = $this->session->userdata('username');
     return $usern;
  }

  	function index($value=FALSE){

      $inicio = 0;
      $limite = 5;

      if($value){
          $inicio = (int)($value-1)*$limite;
      }

       $this->load->library('pagination');
        $lineas['LineasReport'] = $this->GestionarUsuarios_model->obtenerAfiliados($limite,$inicio);
        $config['base_url'] = base_url().'index.php/GestorReporte/generarReportePorAfiliado/';
        $config['total_rows'] = $this->GestionarUsuarios_model->obtenerNumeroAfiliados(); 
        $config['per_page'] = $limite;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


       $this->pagination->initialize($config);

      $data['afiliados'] = $lineas['LineasReport'];
      $data['message'] = "";

      $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainMenu',$this->obtenerSesion());
      $this->load->view('gestionUsuario/usuariosView',$data);
      $this->load->view('templates/tema-default/footer');
  	}


    public function principal($query)
    {
      $value= false;
        $inicio = 0;
        $limite = 5;

        if($value){
            $inicio = (int)($value-1)*$limite;
        }

         $this->load->library('pagination');
          $lineas['LineasReport'] = $this->GestionarUsuarios_model->obtenerAfiliados($limite,$inicio);
          $config['base_url'] = base_url().'index.php/GestorReporte/generarReportePorAfiliado/';
          $config['total_rows'] = $this->GestionarUsuarios_model->obtenerNumeroAfiliados(); 
          $config['per_page'] = $limite;
          $config['uri_segment'] = 3;
          $config['num_links'] = 2;
          $config['full_tag_open'] = '<ul class="pagination">';
          $config['full_tag_close'] = '</ul>';
          $config['first_link'] = false;
          $config['last_link'] = false;
          $config['first_tag_open'] = '<li>';
          $config['first_tag_close'] = '</li>';
          $config['prev_link'] = '&laquo';
          $config['prev_tag_open'] = '<li class="prev">';
          $config['prev_tag_close'] = '</li>';
          $config['next_link'] = '&raquo';
          $config['next_tag_open'] = '<li>';
          $config['next_tag_close'] = '</li>';
          $config['last_tag_open'] = '<li>';
          $config['last_tag_close'] = '</li>';
          $config['cur_tag_open'] = '<li class="active"><a href="#">';
          $config['cur_tag_close'] = '</a></li>';
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';


         $this->pagination->initialize($config);

        $data['afiliados'] = $lineas['LineasReport'];
        if($query){
        $data['message'] = '<div class="callout callout-success">
                            <h4>Operación exitosa</h2>
                            <p>
                              el afiliado ha sido actualizado exitosamente                          
                            </p>
                            </div>';
        }else{
        $data['message'] = '<div class="callout callout-danger">
                            <h4>Opps algo ha ocurrido</h2>
                            <p>
                             No se ha podido completar la transacción                         
                            </p>
                            </div>';
        }

       $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainMenu',$this->obtenerSesion());
      $this->load->view('gestionUsuario/usuariosView',$data);
      $this->load->view('templates/tema-default/footer');
    }


    public function editar($value=FALSE)
    {
      if(is_numeric($value))
      {
          $data['afiliado'] = $this->GestionarUsuarios_model->obtenerAfiliado($value);
      }else{
          $data['afiliado'] = '';
      }


      $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainMenu',$this->obtenerSesion());
      $this->load->view('gestionUsuario/usuarioGView',$data);
      $this->load->view('templates/tema-default/footer');
    }

    public function actualizar()
    {
          $cedula = $this->input->post('cedulaAfiliado');
          $nombreAfiliado = $this->input->post('nombreAfiliado');
          $telefonoAfiliado = $this->input->post('telefonoAfiliado');
          $direccionAfiliado = $this->input->post('direccionAfiliado');
          $emailAfiliado = $this->input->post('emailAfiliado');
          $cupoCreditoAfiliado = $this->input->post('cupoAfiliado');
          $urlAfiliado =  $this->input->post('urlAfiliado');

          $data = array(
            'telefono_afiliado' => $telefonoAfiliado,
            'direccion_afiliado' => $direccionAfiliado,
            'email_afiliado' => $emailAfiliado,
            'cupocredito_afiliado' => $cupoCreditoAfiliado,
          );

          $query = $this->GestionarUsuarios_model->actualizarUsuario($cedula , $data);
          $this->principal($query);   
    }

    public function agregarAfiliado()
    {

     $this->load->view('templates/tema-default/header');
      $this->load->view('templates/tema-default/mainMenu',$this->obtenerSesion());
      $this->load->view('gestionUsuario/usuarioAView');
      $this->load->view('templates/tema-default/footer');
    }

    public function crearAfiliado(){

          $this->form_validation->set_rules('cedulaAfiliado', 'Cedula', 'required|integer|is_unique[afiliado.cedula]');
          $this->form_validation->set_rules('nombreAfiliado', 'Nombre afiliado', 'required|max_length[70]');
          $this->form_validation->set_rules('telefonoAfiliado', 'Telefono afiliado', 'required|max_length[20]|numeric');
          $this->form_validation->set_rules('direccionAfiliado', 'Direccion afiliado', 'required|max_length[40]');
          $this->form_validation->set_rules('emailAfiliado', 'emailAfiliado', 'required|max_length[70]|valid_email');
          $this->form_validation->set_rules('cupoAfiliado', 'Cupo afiliado', 'required|numeric');
          $this->form_validation->set_rules('urlAfiliado', 'url afiliado', 'required|max_length[100]');


          $cedula = $this->input->post('cedulaAfiliado');
          $nombreAfiliado = $this->input->post('nombreAfiliado');
          $telefonoAfiliado = $this->input->post('telefonoAfiliado');
          $direccionAfiliado = $this->input->post('direccionAfiliado');
          $emailAfiliado = $this->input->post('emailAfiliado');
          $cupoCreditoAfiliado = $this->input->post('cupoAfiliado');
          $urlAfiliado =  $this->input->post('urlAfiliado');

          $this->GestionarUsuarios_model->obtenerAfiliado($cedula);

          if ($this->form_validation->run() == true)
          {
            $data = array(
              'cedula' => $cedula,
              'nombre_afiliado' => $nombreAfiliado,
              'telefono_afiliado' => $telefonoAfiliado,
              'direccion_afiliado' => $direccionAfiliado,
              'email_afiliado' => $emailAfiliado,
              'cupocredito_afiliado' => $cupoCreditoAfiliado,
              'url_afiliado' => $urlAfiliado
            );

            $resultado = $this->GestionarUsuarios_model->crearAfiliado($data);
             $this->principal($resultado);
           }else{
              $this->agregarAfiliado();
           }
    }
  
}
