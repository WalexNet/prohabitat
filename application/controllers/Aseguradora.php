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
    private $data       = [];       // Los datos de la tabla a vista
    private $tipoVista  = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion
    private $edita      = false;    // Bandera de edición
    private $datos      = null;     // Los datos que se envian a la vista 

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
		if (!$this->session->login) redirect('Inicio');
        // Cargamos modelos
        $this->load->model('Aseguradora_model');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;										        // Cantidad de registros a mostrar
		$totalreg = $this->Aseguradora_model->total_aseguradora();  // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Aseguradora/index/';   // La funcion que llamara el paginador
		$config['total_rows']  = $totalreg->TOTAL; 		            // Total de registros de la consulta
		$config['per_page']    = $limite;					        // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							        // Numero de links a mostrar antes y despues de la pagina actual

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
                $this->load->view('cuerpo_aseguradora', $this->data); 
                break;
            case 1: // Ficha
                $this->load->view('cuerpo_aseguradoraFicha', $this->data); 
                break;
            case 2: // Alta
            case 3: // Edición
                $this->load->view('cuerpo_aseguradoraAltaEdita', $this->data); 
                break;
        }
        $this->load->view('principal/pie_cuerpo');                       // Obligado
        $this->load->view('principal/foot');                             // Obligado
    }

    public function formAlta()
    {
        $this->tipoVista = 2; // Vista de Alta
        $this->index();

    }

    public function anadeAseguradora()
    {
        $this->Aseguradora_model->add_aseguradora();
        $this->index();
    }

    public function ficha($id)
    {
        $this->datos = $this->Aseguradora_model->get_ficha($id);
        $this->tipoVista = 1;
        $this->index();
    }

    public function editar($id)
    {
        $this->datos = $this->Aseguradora_model->get_ficha($id);
        $this->tipoVista = 3;
        $this->edita = true;
        $this->index();
    }

    public function baja($id)
    {
        $this->Aseguradora_model->del_ficha($id);
        $this->index();
    }
}


/* End of file Aseguradora.php */
/* Location: ./application/controllers/Aseguradora.php */
