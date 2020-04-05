<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Cargamos Modelos necesarios
		$this->load->model('Factura_model');
		$this->load->model('Pisos_model');
		$this->load->model('Servicios_model');
		// Cargamos Librerias
		$this->load->library('pagination');

		// $this->load->controller('Pagos');
	}

	public function index($offset=0, $ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)
	{
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5; 										   // Numero de registros a mostrar con 0 mostramos todos y no muestra el paginador
		$total_factu = $this->Factura_model->total_factu();    // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Facturas/index/'; // La funcion que llamara el paginador
		$config['total_rows']  = $total_factu->TOTAL; 		   // Total de registros de la consulta
		$config['per_page']    = $limite;					   // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							   // Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador

		// Variables del encabezado de la vista
        $data_enc_cuerpo['lugar'] = "Facturas";
		$data_enc_cuerpo['uri'] = "Facturas";

		// Configuramos  las variables del cuerpo de la vista
		if($result===null)
		{
			$result = $this->Factura_model->get_factu($offset,$limite);
		}

		if($ficha or $edita)
		{
			$data['datos_ficha'] = $datos_ficha->row();
		}

		$data['servicios'] = $this->Servicios_model->get_servicios();
		$data['pisos']     = $this->Pisos_model->get_pisos();
		$data['consulta']  = $result;
		$data['ficha'] 	   = $ficha;
		$data['edita']	   = $edita;

		// Cargamos las Vistas
		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo', $data_enc_cuerpo); // Obligado
		$this->load->view('cuerpo_factura', $data); // Segun corresponda
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function ficha($id)
	{
		$ficha = $this->Factura_model->get_ficha($id);
		$this->index(0,TRUE, $ficha);
	}

	public function alta()
	{
		$this->Factura_model->addfactu();
		// 
		$this->index();
	}

	public function baja($id)
	{
		$this->Factura_model->del_factu($id);
		$this->index();
	}

	public function editar($id)
	{
		// preparamos la vista para ver el formulario de edicion
		// Llamamos la funcion get_ficha() del modelo
		// function index($ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)

		$ficha = $this->Factura_model->get_ficha($id);
		$this->index(0,FALSE,$ficha,NULL,TRUE);
	}

	public function modificar()
	{
		// Pasamos los datos del formulario y lo mandamos al Modelo
		// una vez cargamos los datos del formulario los modificamos en la tabla
		$ficha = $this->Factura_model->edit_factu($this->input->post('id',true));
		$this->index();

	}
	public function buscar(){
		$busqueda = $this->Factura_model->find_factu($this->input->post('buscar_factura',true));
		$this->index(0,FALSE,NULL,$busqueda);
	}

}
?>
