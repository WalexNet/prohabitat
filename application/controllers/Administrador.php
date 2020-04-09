<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Administrador
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Administrador extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        
        // Cargamos Modelos
        $this->load->model('Tecnicos_model');
    }

    public function index()
    {
        $datos['admin'] = $this->Tecnicos_model->datosAdmin();

        $data_enc_cuerpo['lugar']   = "Administración";
		$data_enc_cuerpo['uri']     = "Administrador";

		$this->load->view('principal/header');                          // 
		$this->load->view('principal/enca_logo_cuerpo');                // 
		$this->load->view('principal/loginmenu_cuerpo');                // 
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo);    // 

        $this->load->view('cuerpo_administrador', $datos);                      // 
		
		$this->load->view('principal/pie_cuerpo');                      // 
		$this->load->view('principal/foot');                            // 
    }

    public function actualizaDatos(){
        $this->Tecnicos_model->updateAdmin();
        redirect('Inicio');
    }

}


/* End of file Administrador.php */
/* Location: ./application/controllers/Administrador.php */