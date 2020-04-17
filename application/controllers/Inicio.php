<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	// Propiedades
	private $data = [];

	public function __construct()
	{
		parent::__construct();
		// Comprobamos Sesiones
		$sesdata['login'] = ($this->session->login) ? true : false;
		$this->session->set_userdata($sesdata);
		// Cargamos modelos
		$this->load->model('Usuarios_model');
		$this->load->model('Factura_model');
	}

	public function index()
	{
		$data_enc_cuerpo['lugar'] = "Inicio";
		$data_enc_cuerpo['uri'] = "Inicio";

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo', $data_enc_cuerpo); // Obligado

		if ($this->session->login) {
			$this->load->view('cuerpo_inicio'); // Si esta logeado
		} else {
			$this->load->view('cuerpo_inicio_ingreso'); // Formulario de logeo
		}

		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function datosFacturas()
	{
		$facturasPagadas 	= $this->Factura_model->fac_pagadas();
		$facturasPtes		= $this->Factura_model->fac_ptes();
		$data = [count($facturasPtes), count($facturasPagadas)];
		echo json_encode($data);
	}

	public function login()
	{
		$usr = $this->Usuarios_model->existeUsr();
		if (isset($usr)) {
			$sesdata['login'] 		= true;
			$sesdata['usr'] 		= $usr->nomusr;
			$sesdata['idtecnico'] 	= $usr->idtecnico;
			$sesdata['nivel']		= $usr->nivel;
			$sesdata['descnivel']	= $usr->descnivel;
		} else {
			$sesdata['login'] = false;
		}
		$this->session->set_userdata($sesdata);
		$this->index();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$sesdata['login'] = false;
		$this->session->set_userdata($sesdata);
		$this->index();
	}


}
