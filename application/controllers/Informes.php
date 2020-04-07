<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data_enc_cuerpo['lugar'] = "Informes";
		$data_enc_cuerpo['uri'] = "Informes";

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado
        $this->load->view('cuerpo_inicio'); // Segun corresponda
        $this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}
}
?>
