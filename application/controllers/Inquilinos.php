<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquilinos extends CI_Controller {

	// Propiedades
	public $paginacion = TRUE;

	public function __construct(){
		parent::__construct();
		// comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos Modelos
		$this->load->model('Inqui_model');
		// Cargamos Librerias
		$this->load->library('pagination');
	}

	public function index($offset=0, $ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)
	{
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;											 // Cantidad de registros a mostrar
		$total_inquilinos = $this->Inqui_model->total_inqui();	 // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Inquilinos/index/'; // La funcion que llamara el paginador
		$config['total_rows']  = $total_inquilinos->TOTAL; 		 // Total de registros de la consulta
		$config['per_page']    = $limite;						 // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;								 // Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador

        $data_enc_cuerpo['lugar'] = "Usuarios";
		$data_enc_cuerpo['uri'] = "Inquilinos";

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo', $data_enc_cuerpo); // Obligado

		if($result===null)
		{
			$result = $this->Inqui_model->get_inqui($offset,$limite);
		}

		if($ficha or $edita)
		{
			$data['datos_ficha'] = $datos_ficha->row();
		}

		$data['consulta']   = $result;
		$data['ficha']      = $ficha;
		$data['edita']      = $edita;
		$data['paginacion'] = $this->paginacion;


		$this->load->view('cuerpo_inquilinos', $data); 	// Segun corresponda
        $this->load->view('principal/pie_cuerpo'); 		// Obligado
		$this->load->view('principal/foot'); 			// Obligado
	}

	public function alta()
	{
		$this->Inqui_model->addinqui();
		$this->index();
	}

	public function baja($id)
	{
		$this->Inqui_model->del_inqui($id);
		$this->index();
	}

	public function ficha($id)
	{
		$ficha = $this->Inqui_model->get_ficha($id);
		$this->index(0,TRUE, $ficha);
	}

	public function buscar()
	{
		$busqueda = $this->Inqui_model->find_inqui($_POST['buscar_inquilino']);
		$this->paginacion = FALSE;
		$this->index(0,FALSE,NULL,$busqueda);
	}

	public function modificar()
	{
		// Pasamos los datos del formulario y lo mandamos al Modelo
		// una vez cargamos los datos del formulario los modificamos en la tabla
		$ficha = $this->Inqui_model->edit_inqui($_POST['id']);
		$this->index();

	}

	public function editar($id)
	{
		// preparamos la vista para ver el formulario de edicion
		// Llamamos la funcion get_ficha() del modelo
		// function index($ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)

		$ficha = $this->Inqui_model->get_ficha($id);
		$this->index(0,FALSE,$ficha,NULL,TRUE);
	}


} // Fin Class Inquilinos
?>