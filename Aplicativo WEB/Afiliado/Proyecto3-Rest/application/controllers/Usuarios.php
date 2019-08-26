    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
    


class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function index()
    {
          $usern['cedula'] = validatelogin($this->session->userdata('username'));
          $this->load->view('templates/tema-default/header');
          $this->load->view('templates/tema-default/mainmenu',$usern);
          $this->load->view('pagina_principal');
          $this->load->view('templates/tema-default/footer');
    }


    public function find_get($cod_cliente = false)
    {
        $cedula_afiliado = validatelogin($this->session->userdata('username'));
        $comprobacionUsuario = true;

        if (!$cod_cliente) {
            $comprobacionUsuario = false;
        }

        if($cedula_afiliado != $cod_cliente)
        {
            $comprobacionUsuario = false;
        }

        $usuario = null;
        $consulta="No hay nada";
        if($comprobacionUsuario)
        {
            $usuario = $this->usuarios_model->buscar($cod_cliente);
        }

        if (!is_null($usuario)) {
 
            $consulta ="Nombre del afiliado: ".$usuario->nombre_afiliado."\nMonto Inicial ".$usuario->montoaprobado_credito."\nSaldo Actual ".$usuario->saldo;
            $this->ragnar($consulta,$cod_cliente);

            $data['cedula_id'] = $cod_cliente;
            $data['cedula'] = $cod_cliente;
            $this->cargarVista($data);

          //  $this->response(array('response' => $usuario), 200);
        } else {
          //  $this->response(array('error' => 'Usuario no encontrado...'), 404);
            $data['cedula_id'] = false;
            $data['cedula'] = $cod_cliente;
            $this->cargarVista($data);
        }
                
    }

    public function ragnar($consulta,$cod_cliente)
    {
        require 'application/libraries/phpqrcode/qrlib.php';
        $dir = 'codigo/'.$cod_cliente.'/';
        if(!file_exists($dir))
            mkdir($dir);
        $filename=$dir.'test.png';
        $tamanio=10;
        $level='M';
        $framesize=3;
        QRcode::png($consulta, $filename, $level, $tamanio, $framesize);   
    }

    private function cargarVista($data)
    {
            $this->load->view('templates/tema-default/header');
            $this->load->view('templates/tema-default/mainmenu', $data);
            $this->load->view('movimiento_afiliado/qrafiliado', $data);
            $this->load->view('templates/tema-default/footer');
    }
}