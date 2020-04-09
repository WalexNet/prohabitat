<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Cargamos modelos
		$this->load->model('Usuarios_model');
		$sesdata['login'] = ($this->session->login) ? true: false;
        $this->session->set_userdata($sesdata);
	}

	public function index()
	{
		$data_enc_cuerpo['lugar'] = "Inicio";
		$data_enc_cuerpo['uri'] = "Inicio";

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado

		if ($this->session->login){
			$this->load->view('cuerpo_inicio'); // Si esta logeado
		}else{
			$this->load->view('cuerpo_inicio_ingreso'); // Formulario de logeo
		}
		
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function login(){
		$usr = $this->Usuarios_model->existeUsr();
		if (isset($usr)){
			$sesdata['login'] 		= true;
			$sesdata['usr'] 		= $usr->nomusr;
			$sesdata['idtecnico'] 	= $usr->idtecnico;
			$sesdata['nivel']		= $usr->nivel;
		}else{
			$sesdata['login'] = false;
		}
		$this->session->set_userdata($sesdata);
		$this->index();
	}

	public function logout(){
		$this->session->sess_destroy();
		$sesdata['login'] = false;
		$this->session->set_userdata($sesdata);
		$this->index();
	}


}
?>
