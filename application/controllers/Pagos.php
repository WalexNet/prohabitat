<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pagos
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Daniel Walter Pérez Corvalán <walter@walex.net>
 * @link      https://www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Pagos extends CI_Controller
{
    // Propiedades
    public $paginacion = TRUE;
    public $ficha      = FALSE;
    
    public function __construct()
    {
        parent::__construct();
        // Cargamos Modelos
        $this->load->model('Factura_model');
        $this->load->model('Pagos_model');
        // Cargamos Librerias
        $this->load->library('pagination');
        // Cargamos Helpers
        $this->load->helpers('arreglos_helper');
    }

    public function index($offset=0, $result=null)
    {
        // Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;										 // Cantidad de registros a mostrar
		$total_usr = $this->Factura_model->total_factu();	 // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Pagos/index/'; // La funcion que llamara el paginador
		$config['total_rows']  = $total_usr->TOTAL; 		// Total de registros de la consulta
		$config['per_page']    = $limite;					// Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							// Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador

        // Estas vistas no se tocan
        $this->load->view('principal/header'); // Obligado
        $this->load->view('principal/enca_logo_cuerpo'); // Obligado
        $this->load->view('principal/loginmenu_cuerpo'); // Obligado

        // Preparamos las variables para las vistas
        // ----------------------------------------

        // Variables del encabezado de la vista
        $data_enc_cuerpo['lugar'] = "Pagos";
        $data_enc_cuerpo['uri']   = "Pagos";

        $this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado

        // Configuramos  las variables del cuerpo de la vista
        if($result===null)
		{
			$result = $this->Factura_model->get_factu($offset,$limite);
        }
        $data['consulta']   = $result;
        $data['paginacion'] = $this->paginacion;
        $data['ficha']      = $this->ficha;
        $data['datos_ficha']= ($this->ficha) ? $result->row() : null;


        $this->load->view('cuerpo_pagos', $data);  // Segun corresponda

        // Estas vistas no se tocan
        $this->load->view('principal/pie_cuerpo'); // Obligado
        $this->load->view('principal/foot');       // Obligado
    }

    public function vista_pagos($datos = array())
    {

        // Estas vistas no se tocan
        $this->load->view('principal/header'); // Obligado
        $this->load->view('principal/enca_logo_cuerpo'); // Obligado
        $this->load->view('principal/loginmenu_cuerpo'); // Obligado

        // Preparamos las variables para las vistas
        // ----------------------------------------

        // Variables del encabezado de la vista
        $data_enc_cuerpo['lugar'] = "Pagos";
        $data_enc_cuerpo['uri']   = "Pagos";

        $this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado

        $this->load->view('cuerpo_estpagos', $datos);  // Segun corresponda

        // Estas vistas no se tocan
        $this->load->view('principal/pie_cuerpo'); // Obligado
        $this->load->view('principal/foot');       // Obligado


    }


    public function buscar()
    {
        $busqueda = $this->Factura_model->find_factu($this->input->post('buscar_factura',true));
        $this->index(0,$busqueda);
    }

    public function ficha($id)
    {
        // Cargamos la factura a visualizar
        $ficha = $this->Factura_model->get_ficha($id);
        $factura = $ficha->row();

        // Buscamos usuarios que correspondan a esa factura
        $usuarios = $this->Pagos_model->usrxfac($factura->id);

        $datos['si_usu'] = ($usuarios) ? true : false;

        // Pasamos los datos de la factura
        $datos['factura']=$factura;

        // Si hay usuarios los pasamos a la vista
        $datos['usuarios'] = ($datos['si_usu']) ? $usuarios : '';
        
        $this->vista_pagos($datos);

    }

    /**
     * La funcion pagar hay que re-hacerla toda 
     */
    public function pagar($idusr, $idfactura)
    {
        $this->Pagos_model->add_pago($idusr,$idfactura);
        $this->ficha($idfactura);
    }

}


/* End of file Pagos.php */
/* Location: ./application/controllers/Pagos.php */