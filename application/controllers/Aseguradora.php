<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Aseguradora
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

class Aseguradora extends CI_Controller
{
    // Propiedades
    private $data       = [];       // Los datos de la tabla a vista Solo se toca en index()
    private $tipoVista  = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion, 4-> Aseguradora+Polizas
    private $edita      = false;    // Bandera de edición
    private $datos      = null;     // Los datos que se envian a la vista 

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
        if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Aseguradora_model');
        $this->load->model('Poliza_model');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
        // Variables y Arreglos de configuracion del Paginador
        $limite = 5;                                                    // Cantidad de registros a mostrar
        $totalreg = $this->Aseguradora_model->total_aseguradora();      // Nos devuelve el total de registros

        $config['base_url']    = base_url() . 'Aseguradora/index/';     // La funcion que llamara el paginador
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
        $listado = $this->Aseguradora_model->get_aseguradora($offset, $limite);
        // Vamos preparando el arreglo $this->datos
        // Si no hay Datos en la tabla no creamos la variable datos
        if (($listado || $this->datos)) $this->data['datos'] = ($this->datos) ? $this->datos : $listado;
        $this->data['edita'] = $this->edita;

        // echo '<pre>';
        // print_r($this->data);

        $this->vista();
    }

    public function vista()
    {
        $data_enc_cuerpo['lugar']   = "Aseguradora";
        $data_enc_cuerpo['uri']     = "Aseguradora";

        $this->load->view('principal/header');                           // Obligado
        $this->load->view('principal/enca_logo_cuerpo');                 // Obligado
        $this->load->view('principal/loginmenu_cuerpo');                 // Obligado
        $this->load->view('principal/enca_cuerpo', $data_enc_cuerpo);    // Obligado
        switch ($this->tipoVista) {
            case 0: // Listado
                $this->load->view('aseguradora/cuerpo_aseguradora', $this->data);
                break;
            case 1: // Ficha
                $this->load->view('aseguradora/cuerpo_aseguradoraFicha', $this->data);
                break;
            case 2: // Alta
            case 3: // Edición
                $this->load->view('aseguradora/cuerpo_aseguradoraAltaEdita', $this->data);
                break;
            case 4: // Aseguradora mas Pólizas
                $this->load->view('aseguradora/cuerpo_aseguradoraFichaPolizas', $this->data);
        }
        $this->load->view('principal/pie_cuerpo');                       // Obligado
        $this->load->view('principal/foot');                             // Obligado
    }

    public function formAlta()
    {
        $this->tipoVista = 2;       // Vista de Alta
        $this->index();             // Enviamos a la vista
    }

    public function anadeAseguradora()
    {
        $this->Aseguradora_model->add_aseguradora();
        $this->index();             // Enviamos a la vista
    }

    public function ficha($id)
    {
        $this->datos        = $this->Aseguradora_model->get_ficha($id);
        $this->tipoVista    = 1;
        $this->index();             // Enviamos a la vista
    }

    public function editar($id)
    {
        $this->datos        = $this->Aseguradora_model->get_ficha($id);
        $this->tipoVista    = 3;
        $this->edita        = true;
        $this->index();             // Enviamos a la vista
    }

    public function editaAseguradora()
    {
        $id = $this->input->post('id',true);
        $this->Aseguradora_model->update_aseguradora($id);
        $this->index();             // Enviamos a la vista
    }

    public function baja($id)
    {
        $this->Aseguradora_model->del_ficha($id);
        $this->index();             // Enviamos a la vista
    }

    public function buscar()
    {
        $this->datos        = $this->Aseguradora_model->find_aseguradora();
        $this->tipoVista    = 0;    // Listado
        $this->index();             // Enviamos a la vista
    }

    public function listaPolizas($id)
    {
        $this->tipoVista    = 4;
        $this->datos        = $this->Poliza_model->get_polizas_aseguradora($id);

        // echo '<pre>';
        // print_r($this->datos);

        $this->index();
    }
}


/* End of file Aseguradora.php */
/* Location: ./application/controllers/Aseguradora.php */
