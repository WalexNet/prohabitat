<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Poliza
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

class Poliza extends CI_Controller
{
    // Propiedades
    private $data           = [];       // Los datos de la tabla a vista Solo se toca en index()
    private $tipoVista      = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion
    private $edita          = false;    // Bandera de edición
    private $datos          = null;     // Los datos que se envian a la vista 
    private $idAseguradora  = 0;

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Poliza_model');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index()
    {
        // 
        $this->data['edita']            = $this->edita;
        $this->data['idaseguradora']    = $this->idAseguradora;
        $this->data['datos']            = $this->datos;
        $this->vista();
    }

    public function vista()
    {
        $data_enc_cuerpo['lugar']   = "Poliza";
        $data_enc_cuerpo['uri']     = "Poliza";

        $this->load->view('principal/header');                           // Obligado
        $this->load->view('principal/enca_logo_cuerpo');                 // Obligado
        $this->load->view('principal/loginmenu_cuerpo');                 // Obligado
        $this->load->view('principal/enca_cuerpo', $data_enc_cuerpo);    // Obligado
        switch ($this->tipoVista) {
            case 0: // Listado
                $this->load->view('poliza/cuerpo_poliza', $this->data);
                break;
            case 1: // Ficha
                $this->load->view('poliza/cuerpo_polizaFicha', $this->data);
                break;
            case 2: // Alta
            case 3: // Edición
                $this->load->view('poliza/cuerpo_polizaAltaEdita', $this->data);
                break;
        }
        $this->load->view('principal/pie_cuerpo');                       // Obligado
        $this->load->view('principal/foot');                             // Obligado
    }

    // Preparamos los datos para la vista de agregar
    public function agregar($idAseguradora)
    {
        // echo 'agregando poliza:'. $idAseguradora;
        $this->idAseguradora    = $idAseguradora;
        $this->tipoVista        = 2;
        $this->index();
    }

    public function altaPoliza()
    {
        $this->Poliza_model->add_poliza();
        $this->index();
    }

    // preparamos los datos para la vista de edición
    public function editar($id)
    {
        $this->edita        = true;
        $this->tipoVista    = 3;
        $this->datos        = $this->Poliza_model->get_ficha($id);
        $this->index();
    }

    public function editaPoliza()
    {
        $id = $this->input->post('id',true);
        $this->Poliza_model->update_poliza($id);
        

    }
}


/* End of file Poliza.php */
/* Location: ./application/controllers/Poliza.php */
