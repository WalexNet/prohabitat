<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadofacturas extends CI_Controller {

	// Propiedades
	private $data 	= [];

	public function __construct(){
		parent::__construct();
		// comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos modelos
		$this->load->model('Factura_model');
	}

	public function index()
	{
		// Inicializamos todos los datos para mostrar en la vista
		$anio 							= $this->input->post('anio', true);
		$this->data['facturasptes'] 	= $this->Factura_model->fac_ptes($anio); 
		$this->data['totalptes']		= count($this->data['facturasptes']);

		$this->vista();
	}

	public function vista()
	{
		$data_enc_cuerpo['lugar'] = "Informes";
		$data_enc_cuerpo['uri'] = "Informes";

		$this->load->view('principal/header'); 							// Obligado
		$this->load->view('principal/enca_logo_cuerpo'); 				// Obligado
		$this->load->view('principal/loginmenu_cuerpo'); 				// Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo);	// Obligado
        $this->load->view('cuerpo_estadofacturas', $this->data); 		// Segun corresponda
        $this->load->view('principal/pie_cuerpo'); 						// Obligado
		$this->load->view('principal/foot'); 				
	}
}
?>
