<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Configuracion
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

class Configuracion extends CI_Controller
{

    // Propiedades
    private $data       = [];       // Los datos de la tabla a vista Solo se toca en index()

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Configuracion_model');
    }

    public function index()
    {
        // Preparamos la vista modificando las propiedades
        $sector     = $this->Configuracion_model->get_datos('sector');
        $tipologia  = $this->Configuracion_model->get_datos('tipologia');
        $estados    = $this->Configuracion_model->get_datos('estados');
        $servicios  = $this->Configuracion_model->get_datos('servicios');

        $this->data['sector']       = $sector;
        $this->data['tipologia']    = $tipologia;
        $this->data['estados']      = $estados;
        $this->data['servicios']    = $servicios;

        $this->vista();
    }

    public function vista()
    {
        $data_enc_cuerpo['lugar']   = "Configuración";
        $data_enc_cuerpo['uri']     = "Configuracion";

        $this->load->view('principal/header');                           // Obligado
        $this->load->view('principal/enca_logo_cuerpo');                 // Obligado
        $this->load->view('principal/loginmenu_cuerpo');                 // Obligado
        $this->load->view('principal/enca_cuerpo', $data_enc_cuerpo);    // Obligado

        $this->load->view('cuerpo_configuracion', $this->data);

        $this->load->view('principal/pie_cuerpo');                       // Obligado
        $this->load->view('principal/foot');                             // Obligado
    }

    function addSector()
    {
        $this->Configuracion_model->add_datos('sector');
        $this->index();
    }

    function delSector($id)
    {
        $this->Configuracion_model->del_datos('sector', $id);
        $this->index();
    }

    function addTipologia()
    {
        $this->Configuracion_model->add_datos('tipologia');
        $this->index();
    }

    function delTipologia($id)
    {
        $this->Configuracion_model->del_datos('tipologia', $id);
        $this->index();
    }

    function addEstado()
    {
        $this->Configuracion_model->add_datos('estados');
        $this->index();
    }

    function delEstado($id)
    {
        $this->Configuracion_model->del_datos('estados', $id);
        $this->index();
    }

    function addServicio()
    {
        $this->Configuracion_model->add_datos('servicios');
        $this->index();
    }

    function delServicio($id)
    {
        $this->Configuracion_model->del_datos('servicios', $id);
        $this->index();
    }
}


/* End of file Configuracion.php */
/* Location: ./application/controllers/Configuracion.php */
