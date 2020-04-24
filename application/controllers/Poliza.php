<?php

// use phpDocumentor\Reflection\Types\This;

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
    private $aseguradora    = null;     // Datos de la aseguradora

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Poliza_model');
        $this->load->model('Aseguradora_model');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
        // Variables y Arreglos de configuracion del Paginador
        $limite = 5;                                                    // Cantidad de registros a mostrar
        $totalreg = $this->Poliza_model->total_poliza();      // Nos devuelve el total de registros

        $config['base_url']    = base_url() . 'Poliza/index/';     // La funcion que llamara el paginador
        $config['total_rows']  = $totalreg->TOTAL;                      // Total de registros de la consulta
        $config['per_page']    = $limite;                               // Numero de registros a mostrar por pagina
        $config['uri_segment'] = 3;
        $config['num_links']   = 2;                                     // Numero de links a mostrar antes y despues de la pagina actual

        // Fin de la configuracion
        // La configuracion del paginador esta en application/config/pagination.php
        // Inicializamos el paginador
        $this->pagination->initialize($config);
        // fin del paginador

        // Preparamos la vista modificando las propiedades
        $listado = $this->Poliza_model->get_polizas($offset, $limite);
        // 
        $this->data['edita']            = $this->edita;
        $this->data['aseguradora']      = $this->aseguradora;
        $this->data['datos']            = ($this->datos) ? $this->datos : $listado;
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
            case 0: // Listado Poliza
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

    // ************************************************************
    // Preparamos los datos para la vista de agregar
    public function formAlta($idAseguradora)
    {
        // echo 'agregando poliza:'. $idAseguradora;
        $this->aseguradora      = $this->Aseguradora_model->get_ficha($idAseguradora);
        $this->tipoVista        = 2; // Alta
        $this->index();
    }

    public function altaPoliza()
    {
        $this->Poliza_model->add_poliza();
        $this->index();
    }
    // ************************************************************


    // ************************************************************
    // preparamos los datos para la vista de edición
    public function editar($id)
    {
        $this->edita        = true;
        $this->tipoVista    = 3;                                    // Edicion
        $this->datos        = $this->Poliza_model->get_ficha($id);  // Pedimos los datos al modelo
        $this->index();
    }

    // Pasamos los datos al modelo para modificar la ficha
    public function editaPoliza()
    {
        $id = $this->input->post('id',true);
        $this->Poliza_model->update_poliza($id);
        $this->index();
    }
    // ************************************************************

    public function baja($id)
    {
        $this->Poliza_model->del_poliza($id);
        $this->index();
    }

    // ************************************************************
    // preparamos los datos para la vista de Ficha
    public function verFicha($id)
    {
        $this->tipoVista    = 1;                                    // Ficha
        $this->datos        = $this->Poliza_model->get_ficha($id);  // Pedimos los datos al modelo
        $this->index();
    }

    public function buscar()
    {
        $this->datos        = $this->Poliza_model->find_poliza();
        $this->tipoVista    = 0;    // Listado
        $this->index();             // Enviamos a la vista
    }

    public function listPoliza($idAseguradora)
    {
        $this->datos = $this->Poliza_model->get_polizas($idAseguradora);
    }
}


/* End of file Poliza.php */
/* Location: ./application/controllers/Poliza.php */
