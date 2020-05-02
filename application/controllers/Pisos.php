<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pisos extends CI_Controller 
{
	// Propiedades
	private $data = [];

	public function __construct(){
		parent::__construct();
		// comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos Modelos
		$this->load->model('Pisos_model');
		$this->load->model('Edificios_model');
		$this->load->model('Poliza_model');
		// Cargamos Librerias
		$this->load->library('pagination');
	}

	public function index($offset=0, $datos_ficha=null, $result=null, $edita=FALSE)
	{
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5;										// Cantidad de registros a mostrar
		$total_pisos = $this->Pisos_model->total_pisos();	// Nos devuelve el total de registros

		$config['base_url']    = base_url().'Pisos/index/';	// La funcion que llamara el paginador
		$config['total_rows']  = $total_pisos->TOTAL; 		// Total de registros de la consulta
		$config['per_page']    = $limite;					// Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							// Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);
		// fin del paginador

		// Preparamos los datops para la vista
		if($result===null)
		{
			$result = $this->Pisos_model->get_pisos($offset,$limite);
		}

		if($edita)
		{
			$this->data['polizas']		= $this->Poliza_model->get_polizas();
			$this->data['datos_ficha'] 	= $datos_ficha->row();
		}

		$this->data['edificios'] 	= $this->Edificios_model->get_edi();
		$this->data['consulta'] 	= $result;
		$this->data['edita']    	= $edita;

		$this->vista();
	}

	public function vista()
	{	
		$data_enc_cuerpo['lugar'] 	= "Pisos";
		$data_enc_cuerpo['uri'] 	= "Pisos";
		
		$this->load->view('principal/header'); 							// Obligado
		$this->load->view('principal/enca_logo_cuerpo'); 				// Obligado
		$this->load->view('principal/loginmenu_cuerpo'); 				// Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo);	// Obligado
        $this->load->view('cuerpo_pisos',$this->data); 					// Segun corresponda
        $this->load->view('principal/pie_cuerpo'); 						// Obligado
		$this->load->view('principal/foot'); 							// Obligado
	}


	public function alta($Edificio=FALSE)
	{
		$this->Pisos_model->add_piso();
		if ($Edificio){
			redirect(base_url().'Edificios/ficha/'.$_POST['idEdificio']);
		}else{
			$this->index();
		}
		 	
	}

	public function editar($id)
	{
		// Aqui entramos de la opcion editar del listado de pisos
		// Y preparamos la vista para que muestre el formulario de edicion
		$ficha = $this->Pisos_model->get_ficha($id);
		$this->index(0,$ficha,null,TRUE);
	}

	public function modificar()
	{
		// Una vez rellanmos el formulario de edicion, le pasamos los datos 
		// con el ID al modelo para que haga la modificacion
		$this->Pisos_model->edit_piso($_POST['id']);
		$this->index();
	}
	
	public function baja($id, $idEdificio=null)
	{
		$this->Pisos_model->del_piso($id);
		if ($idEdificio){
			redirect(base_url('Edificios/ficha/'.$idEdificio));
		}else{
			$this->index();
		}
			
	}

	public function buscar()
	{
		$busqueda = $this->Pisos_model->find_piso();
		$this->paginacion = FALSE;
		$this->index(0,NULL,$busqueda);
	}
}
?>
