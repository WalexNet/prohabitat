<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Edificios
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

class Edificios extends CI_Controller
{
	// Propiedades
	public $paginacion = TRUE;
    
	public function __construct(){
		parent::__construct();
		// comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos modelos
		$this->load->model('Edificios_model');
		// Cargamos Librerias
		$this->load->library('pagination');
	}

	public function index($offset=0, $ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE){
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;											 // Cantidad de registros a mostrar
		$total_edificios = $this->Edificios_model->total_edi();	 // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Edificios/index/';  // La funcion que llamara el paginador
		$config['total_rows']  = $total_edificios->TOTAL; 		 // Total de registros de la consulta
		$config['per_page']    = $limite;						 // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;								 // Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador


		$data_enc_cuerpo['lugar'] = "Edificios";
		$data_enc_cuerpo['uri'] = "Edificios";

		// Configuramos  las variables del cuerpo de la vista
		if($result===null)
		{
			$result = $this->Edificios_model->get_edi($offset,$limite);
		}

		if($ficha or $edita)
		{
			$data['datos_ficha'] = $datos_ficha->row();
			$data['ficha_pisos'] = $datos_ficha;
		}

		$data['consulta']  = $result;
		$data['ficha'] 	   = $ficha;
		$data['edita']	   = $edita;
		$data['paginacion']= $this->paginacion;

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado
		$this->load->view('cuerpo_edificios',$data); // Segun corresponda
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function alta(){
		
		$this->Edificios_model->add_edi();
		$this->index();
		
	}

	public function baja($id)
	{
		$this->Edificios_model->del_edi($id);
		$this->index();
	}

	public function ficha($id)
	{
		$ficha = $this->Edificios_model->get_ficha($id);
		$this->index(0,TRUE, $ficha);
	}

	public function buscar()
	{
		$busqueda = $this->Edificios_model->find_edi($_POST['buscar_edificio']);
		$this->paginacion = FALSE;
		$this->index(0,FALSE,NULL,$busqueda);
	}

	public function modificar()
	{
		// Una vez rellanmos el formulario le pasamos los datos 
		// con el ID al modelo para que haga la modificacion
		$ficha = $this->Edificios_model->edit_edi($_POST['id']);
		$this->index();
	}

	public function editar($id)
	{
		// Aqui entramos de la opcion editar del listado de edificios
		// Y preparamos la vista para que muestre el formulario de edicion
		$ficha = $this->Edificios_model->get_ficha($id);
		$this->index(0,FALSE,$ficha,null,TRUE);
	}

}


/* End of file Edificios.php */
/* Location: ./application/controllers/Edificios.php */