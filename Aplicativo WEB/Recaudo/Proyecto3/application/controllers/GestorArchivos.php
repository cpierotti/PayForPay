<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestorArchivos extends CI_Controller {

     function __construct(){
  	   parent::__construct();
  	   $this->load->helper('form');
  	   $this->load->model('GestorArchivos_modelo');
  	   $this->load->model('GestorAuditorias_model');
  	   $this->load->library('upload');
  	   $this->load->helper('datehelper');
     }


	function index()
	{
		  $data['entidades'] = $this->GestorArchivos_modelo->obtenerEntidades();
		  $data['message'] = false;
		  $usern['username'] = validatelogin($this->session->userdata('username'));

		  $this->load->view('templates/tema-5/header');
		  $this->load->view('templates/tema-default/mainmenu',$usern);
		  $this->load->view('gestorArchivos/gestorView',$data);
     	  $this->load->view('templates/tema-default/footer');
	}


	public function cargarArchivo() {

		$idEntidad = $this->input->post('idEntidad');

		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';

        $this->upload->initialize($config,true);
        
		$data = array('Accion_Auditoria' =>'I',
					'TablaAfectada_Auditoria' => 'entidad_bancaria,detalle_pago,encabezado_archivo',
					'Descripcion_Auditoria' => 'inserción de un archivo con datos del banco'
				);        

            if ( $this->upload->do_upload('userfile'))
                {
                	$this->GestorAuditorias_model->realizarAuditoria($data);
                    $this->comenzarLectura($idEntidad);
                   
                }
                else
                {
                    $this->reportarFallo();                  	
                }
    
	}

	private function microtime_float()
		{
			list($useg, $seg) = explode(" ", microtime());
			return ((float)$useg + (float)$seg);
		}


	private function comenzarLectura($idEntidad)
	{
		$tiempo_inicio = $this->microtime_float();
		$info = $this->upload->data();
               $data = array('nombreArchivo' => $info['file_name'],
           					 'id_entidad' => $idEntidad	);

            set_time_limit (36000);
			date_default_timezone_set('America/Bogota');

			$fecha = date("Y-m-d\TH:i:sP");
			$path = base_url().'/uploads/'.$data['nombreArchivo'];
			$lineas = file($path);

			$i = 0;
			$error = 0;
			$upl =0;
			
			$j = 0; //contador actualizados
			$k = 0; //contador nuevos registros
			$valorTotalRecaudo = 0;
			$metodo = 'no_value';
			$onerror = FALSE;

			
			if(strpos($data['nombreArchivo'],'efecty_') === 0)
			{
		
				$metodo = 'efecty';
				foreach ($lineas as $filas => $valor) {
					$tmperror=0;
					if($i>=0){
						if(strpos($valor,';'))
						{
							$f = explode(";", $valor);
							if(count($f) == 7)
							{
							$cedula = trim($f[0]);
							$nombres = trim($f[1]);
							$oficinaOrigen  = trim($f[2]);
							$valorConsignado = trim($f[3]);
							$numeroCredito = trim($f[4]);
							$fechaHoraRecaudo = trim($f[5]);
							$valorComision = trim($f[6]);				
							
							$es_correcto = true;

							if(validateDate($fechaHoraRecaudo))
							{
								$onerror = true;
								$es_correcto = false;
								$mensajeError[$i] = 'Se presento un error en la linea $i presentado por una fecha invalida';
								$lineas_error[$i] = $valor;
							}

							if($es_correcto)
							{
								$data_links[$k] = array('Cedula' => $cedula,
													'NumeroReferencia' => $numeroCredito,
													'Valor_Consignado' => $valorConsignado,
													'ValorComision' => $valorComision,
													'FechaRecaudo' => $fechaHoraRecaudo );
									

									$valorTotalRecaudo += $valorConsignado;
									$k++;
							}
							}
							else
							{
								$onerror = true;
								$mensajeError[$i] = 'Se presento un error en la linea $i presentado por ausencia o exceso de parámetros';
								$lineas_error[$i] = $valor;
							}
						}else{
							$onerror = true;
							$mensajeError[$i] = 'Se presento un error en la linea $i linea vacia o formato incorrecto';
							$lineas_error[$i] = $valor;
						}
					}
					$i++;
					}
				$i--;
			}else if(strpos($data['nombreArchivo'],'EF_') === 0){

				$metodo = 'banco';
				foreach ($lineas as $filas => $valor) {
					$tmperror=0;
					if($i>=0){
						if(strpos($valor,';'))
						{
							$f = explode(";", $valor);
							if(count($f) == 7)
							{
								$cedula = trim($f[0]);
								$nombres = trim($f[1]);
								$codigoBanco = trim($f[2]);
								$fechaHoraRecaudo = trim($f[3]);
								$valorConsignado = trim($f[4]);
								$numeroReferencia = trim($f[5]);
								$codigoDeBarras = trim($f[6]);

								$es_correcto = true;

								if(validateDate($fechaHoraRecaudo))
								{
									$onerror = true;
									$es_correcto = false;
									$mensajeError[$i] = 'Se presento un error en la linea $i presentado por una fecha invalida';
									$lineas_error[$i] = $valor;
								}

								if($es_correcto)
								{					
								
									$data_links[$k] = array('Cedula' => $cedula,
														'Valor_Consignado' => $valorConsignado,
														'NumeroReferencia' => $numeroReferencia,
														'CodigoDeBarras' => $codigoDeBarras,
														'FechaRecaudo' => $fechaHoraRecaudo );
								

									$valorTotalRecaudo += $valorConsignado;
										$k++;
								}
							}else
							{
								$onerror = true;
								$mensajeError[$i] = 'Se presento un error en la linea $i presentado por ausencia de parámetros';
								$lineas_error[$i] = $valor;	
							}
						}else{
							$onerror = true;
							$mensajeError[$i] = 'Se presento un error en la linea $i linea vacia o formato incorrecto';
							$lineas_error[$i] = $valor;
						}
					}
					$i++;
				}
				$i--;
			}else
			{
				echo 'entro';
			}
			
			if($metodo !== 'no_value')
			{
				$data_encabezado = 	array('Nombre_Archivo' => $data['nombreArchivo'],
					'NumeroDeFilas_Archivo' => $k,
					'TotalRecaudado_Archivo' => $valorTotalRecaudo,
					'FechaHora_Archivo' => $fecha);

				$idEncabezado = $this->GestorArchivos_modelo->subirEncabezado($data_encabezado);
			}

			if($metodo === 'efecty')
			{
				foreach ($data_links as $var => $value) {
					$value['id_Encabezado'] = $idEncabezado;
					$value['id_EntidadPago'] =  $data['id_entidad'];

					$valorComision = $value['ValorComision'];

					unset($value['ValorComision']);
					
					$idDetalle = $this->GestorArchivos_modelo->subirArchivos($value);

					$datosEfecty =  array('ValorComision' => $valorComision,
						'id_DetallePago' => $idDetalle);
					$this->GestorArchivos_modelo->subirEfecty($datosEfecty);
				}
			}

			if($metodo === 'banco')
			{
				foreach ($data_links as $var => $value) {
					$value['id_Encabezado'] = $idEncabezado;
					$value['id_EntidadPago'] =  $data['id_entidad'];

					$codigoDeBarras = $value['CodigoDeBarras'];

					unset($value['CodigoDeBarras']);

					$idDetalle = $this->GestorArchivos_modelo->subirArchivos($value);

					$datosEntidad =  array(
						'CodigoDeBarras' => $codigoDeBarras,
						'id_DetallePago' => $idDetalle);
					$this->GestorArchivos_modelo->subirEntidad($datosEntidad);
				}
			}

			$tiempo_fin = $this->microtime_float();
			$tiempo = $tiempo_fin - $tiempo_inicio;

			$tiempoReducido =  number_format($tiempo,2);

			$arrayPresentacion =  array('nombre del archivo' => $data_encabezado['Nombre_Archivo'],
										'numero de filas' => $data_encabezado['NumeroDeFilas_Archivo'],
										'total recaudado' => $data_encabezado['TotalRecaudado_Archivo'],
										'fecha de carga' => $data_encabezado['FechaHora_Archivo'],
										'tiemo de subida' => $tiempoReducido.' segundos' );
									
			$todo['data_encabezado'] = $arrayPresentacion;
			$todo['linkError'] = '';

			if($onerror)
			{
				$nombreCorrecion = 'correccion-'.$data['nombreArchivo'];
				$dirArchivo = 'errores/'.$nombreCorrecion;

				$archivo = fopen($dirArchivo ,'w+');
				foreach ($lineas_error as $value ) {
					fwrite($archivo,$value);
				}
				fclose($archivo);

				$todo['linkError'] = '../../'.$dirArchivo;
				
			}

			
			$todo['error'] = $onerror;

		/*	$tiempo_fin = $this->microtime_float();
			$tiempo = $tiempo_fin - $tiempo_inicio;*/

		//	echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio);

		 $usern['username'] = validatelogin($this->session->userdata('username'));

		$this->load->view('templates/tema-5/header');
		$this->load->view('templates/tema-default/mainmenu',$usern);
		$this->load->view('gestorArchivos/uploadSucessView',$todo);
     	$this->load->view('templates/tema-default/footer');


     //	$this->enviarDetalleArchivo();
	}
	

	public function reportarFallo()
	{

		$message = '<div class="col-md-3"></div><div class="alert-danger mensaje col-md-7" role="alert"><h3>Alerta!</h3>
								<p>Lamentablemente no se ha conseguido cargar el archivo por favor compruebe el formato del archivo subido</p>
								</div><div class="col-md-2"></div>';

		$data = array(  'message' => $message,
                    	'entidades' => $this->GestorArchivos_modelo->obtenerEntidades());

		$usern['username'] = validatelogin($this->session->userdata('username'));
		$this->load->view('templates/tema-5/header');
		$this->load->view('templates/tema-default/mainmenu',$usern);
		$this->load->view('gestorArchivos/gestorView',$data);
     	$this->load->view('templates/tema-default/footer');
	}

	public function enviarDetalleArchivo(){

		$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'andresm28k@gmail.com', // change it to yours
			  'smtp_pass' => 'Andres9220', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
);
		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");
		$this->load->library('email',$config);
		$this->email->from('andresm28k@gmail.com','Andres muñoz');
		$this->email->to('andresm28k@gmail.com');

		$this->email->subject('prueba');
		$this->email->message('probando');

		if($this->email->send()){
			echo 'mensaje enviadooooooo';

		}else
		{
			echo 'mensaje no enviadooooooo';
		}
		
	}

}
