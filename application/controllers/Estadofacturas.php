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
		$facturasPagadas 	= $this->Factura_model->fac_pagadas();
		$facturasPtes		= $this->Factura_model->fac_ptes(); 
		$totalFacturas		= $this->Factura_model->total_factu();
		$this->data['facturasptes'] 	= $this->Factura_model->fac_ptes(); // '2019-12-02', '2020-04-10'
		$this->data['totalptes']		= count($this->data['facturasptes']);
		// echo '<pre>';
		// echo 'Total Facturas: '.$totalFacturas->TOTAL; echo '<br>';
		// echo 'Facturas pagadas:'; echo '<br>';
		// foreach($facturasPagadas as $fila){
		// 	echo $fila->idfactura.' - '.str_pad($fila->numfac, 20).' - '.$fila->ffactura.' - '.str_pad($fila->servicio,7).' - '.str_pad($fila->impfac, 8,' ', STR_PAD_LEFT);
		// 	echo '<br>';
		// }
		// echo '<br>';
		// echo 'Facturas Pendientes de Pago:'; echo '<br>';
		// foreach($facturasPtes as $fila){
		// 	echo $fila->idfactura.' - '.str_pad($fila->numfac, 20).' - '.$fila->ffactura.' - '.str_pad($fila->servicio,7).' - '.str_pad($fila->imppte, 8,' ', STR_PAD_LEFT).' - '.str_pad($fila->impfac, 10,' ', STR_PAD_LEFT);
		// 	echo '<br>';
		// }


		// echo 'Matriz: $facturasPagadas:'; echo '<br>';
		// echo count($facturasPagadas); echo '<br>';
		// echo 'Matriz: $facturasPtes:'; echo '<br>';
		// echo count($facturasPtes); echo '<br>';

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
        $this->load->view('cuerpo_estadofacturas', $this->data); 							// Segun corresponda
        $this->load->view('principal/pie_cuerpo'); 						// Obligado
		$this->load->view('principal/foot'); 				
	}
}
?>
