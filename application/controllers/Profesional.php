<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Profesional
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

class Profesional extends CI_Controller
{
    // Propiedades
    private $data       = [];       // Los datos de la tabla a vista Solo se toca en index()
    private $tipoVista  = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion
    private $edita      = false;    // Bandera de edición
    private $datos      = null;     // Los datos que se envian a la vista 

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Profesional_model');
        $this->load->model('Sector_model');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
        // Variables y Arreglos de configuracion del Paginador
        $limite = 5;                                                    // Cantidad de registros a mostrar
        $totalreg = $this->Profesional_model->total_profesional();      // Nos devuelve el total de registros

        $config['base_url']    = base_url() . 'Profesional/index/';     // La funcion que llamara el paginador
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
        $listado = $this->Profesional_model->get_profesional($offset, $limite);
        // Vamos preparando el arreglo $this->datos
        // Si no hay Datos en la tabla no creamos la variable datos
        if (($listado || $this->datos)) $this->data['datos'] = ($this->datos) ? $this->datos : $listado;
        $this->data['sector']   = $this->Sector_model->get_sector();
        $this->data['edita']    = $this->edita;

        // echo '<pre>';
        // print_r($this->data);

        $this->vista();
    }

    public function vista()
    {
        $data_enc_cuerpo['lugar']   = "Profesional";
        $data_enc_cuerpo['uri']     = "Profesional";

        $this->load->view('principal/header');                           // Obligado
        $this->load->view('principal/enca_logo_cuerpo');                 // Obligado
        $this->load->view('principal/loginmenu_cuerpo');                 // Obligado
        $this->load->view('principal/enca_cuerpo', $data_enc_cuerpo);    // Obligado
        switch ($this->tipoVista) {
            case 0: // Listado
                $this->load->view('profesionales/cuerpo_profesional', $this->data);
                break;
            case 1: // Ficha
                $this->load->view('profesionales/cuerpo_profesionalFicha', $this->data);
                break;
            case 2: // Alta
            case 3: // Edición
                $this->load->view('profesionales/cuerpo_profesionalAltaEdita', $this->data);
                break;
        }
        $this->load->view('principal/pie_cuerpo');                       // Obligado
        $this->load->view('principal/foot');                             // Obligado
    }

    public function formAlta()
    {
        $this->tipoVista = 2;       // Vista de Alta
        $this->index();             // Enviamos a la vista
    }

    public function altaProfesional()
    {
        $this->Profesional_model->add_profesional();
        $this->index();             // Enviamos a la vista
    }

    public function ficha($id)
    {
        $this->datos        = $this->Profesional_model->get_ficha($id);
        $this->tipoVista    = 1;
        $this->index();             // Enviamos a la vista
    }

    public function editar($id)
    {
        $this->datos        = $this->Profesional_model->get_ficha($id);
        $this->tipoVista    = 3;
        $this->edita        = true;
        $this->index();             // Enviamos a la vista
    }

    public function editaProfesional()
    {
        $id = $this->input->post('id',true);
        $this->Profesional_model->update_profesional($id);
        $this->index();             // Enviamos a la vista
    }

    public function baja($id)
    {
        $this->Profesional_model->del_ficha($id);
        $this->index();             // Enviamos a la vista
    }

    public function buscar()
    {
        $this->datos        = $this->Profesional_model->find_profesional();
        $this->tipoVista    = 0;    // Listado
        $this->index();             // Enviamos a la vista
    }


}


/* End of file Profesional.php */
/* Location: ./application/controllers/Profesional.php */
