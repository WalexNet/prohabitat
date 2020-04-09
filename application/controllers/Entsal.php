<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entsal extends CI_Controller {

	// Propiedades
	public $paginacion = TRUE;

	public function __construct(){
		parent::__construct();
		// comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos Modelos
		$this->load->model('Entsal_model');
		$this->load->model('Pisos_model');
		// Cargamos Librerias
		$this->load->library('pagination');
	}

	public function index($offset=0, $result=null, $datosficha=null, $estado=null)
	{
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;										 // Cantidad de registros a mostrar
		$total_usr = $this->Entsal_model->total_usr();	     // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Entsal/index/'; // La funcion que llamara el paginador
		$config['total_rows']  = $total_usr->TOTAL; 		 // Total de registros de la consulta
		$config['per_page']    = $limite;					 // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							 // Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador

		
		// Estas vistas no se tocan
		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		// Preparamos las variables para las vistas
		$data_enc_cuerpo['lugar'] = "Entrada/Salidas";
		$data_enc_cuerpo['uri']   = "Entsal";
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado, Dinámica


		if($result===null)
		{
			$result = $this->Entsal_model->get_usr($offset,$limite);
		}

		if($estado)
		{
			$data['pisos'] = $this->Pisos_model->get_pisos();
		}

		$data['consulta']    = $result;
		$data['datos_ficha'] = ($datosficha == null) ? $datosficha : $datosficha->row();
		$data['estado']		 = $estado;
		$data['paginacion']  = $this->paginacion;


		$this->load->view('cuerpo_entsal',$data); // Según corresponda, Dinámica

		// Estas vistas no se tocan
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function busca_usu()
	{
		$busqueda = $this->Entsal_model->find_usu($_POST['buscar_usu']);
		$this->paginacion = FALSE;
		$this->index(0,$busqueda);
	}

	public function alta_baja($alta,$idinqui) // Entrada de usuario a un piso
	{
		$ficha = $this->Entsal_model->get_ficha($idinqui);
		if ($alta)
		{
			// pasamoos datos para el alta
			$this->index(0,null,$ficha,'ALTA');
		}else{
			// Pasamos datos para baja
			$this->index(0,null,$ficha,'BAJA');
		}

	}

	public function alta()
	{
		$this->Entsal_model->entrada();
		$this->index();
	}

	public function baja()
	{
		$this->Entsal_model->salida();
		$this->index();
	}
}
?>
