<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Gestaccesos
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

class Gestaccesos extends CI_Controller
{
    // Declaracion de propiedades
    private $datos      = [];
    private $editar     = false;
    private $verFicha   = false;
    private $buscar     = false;
    private $ficha      = '';
    private $perfil     = '';

    public function __construct()
    {
        parent::__construct();
        // comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos Modelos
		$this->load->model('Tecnicos_model');
		// Cargamos Librerias
		$this->load->library('pagination');
    }

    public function index($offset=0)
    {
        // Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 10;											 // Cantidad de registros a mostrar
		$total_tecnicos = $this->Tecnicos_model->total_tecnic(); // Nos devuelve el total de registros
		$config['base_url']    = base_url('Gestaccesos/index/'); // La funcion que llamara el paginador
		$config['total_rows']  = $total_tecnicos->TOTAL; 		 // Total de registros de la consulta
		$config['per_page']    = $limite;						 // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;								 // Numero de links a mostrar antes y despues de la pagina actual
		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
        $this->pagination->initialize($config); 
        // Finalizamos paginador
        // *************************
        // Configuramos las varibles y/o datos de las vistas
        $data_enc_cuerpo['lugar']   = ($this->editar) ? "Técnicos / Gestion de Accessos / Edición":"Técnicos / Gestion de Accessos";
        $data_enc_cuerpo['uri']     = "Gestaccesos";

        $this->datos['editar']      = $this->editar;
        $this->datos['consulta']    = ($this->verFicha) ? $this->ficha : (($this->buscar) ? $this->ficha : $this->Tecnicos_model->get_tecnic($offset,$limite));
        $this->datos['perfil']      = $this->perfil;

        // Cargamos las vistas
        $this->load->view('principal/header');                          // 
        $this->load->view('principal/enca_logo_cuerpo');                // 
        $this->load->view('principal/loginmenu_cuerpo');                // 
        $this->load->view('principal/enca_cuerpo', $data_enc_cuerpo);   // 

        if($this->verFicha){
            $this->load->view('cuerpo_editaacceso', $this->datos);
        }else{
            $this->load->view('cuerpo_gestacceso', $this->datos);       // 
        }
                   
        $this->load->view('principal/pie_cuerpo');                      // 
        $this->load->view('principal/foot');                            // 
    }

    public function editar($idtecnico)
    {
        $this->editar   = true;
        $this->verFicha = true;
        $this->ficha    = $this->Tecnicos_model->ficha($idtecnico);
        $this->perfil   = $this->Tecnicos_model->usr_perfil($idtecnico);

        // echo '<pre>';
        // print_r($this->ficha);

        $this->index();
    }

    public function alta()
    {
        $this->Tecnicos_model->add_tecnic();
        $this->index();
    }

    public function verficha($idtecnico)
    {
        $this->editar   = false;
        $this->verFicha = true;
        $this->ficha    = $this->Tecnicos_model->ficha($idtecnico);
        $this->perfil   = $this->Tecnicos_model->usr_perfil($idtecnico);
        $this->index();
    }

    public function modificaficha()
    {
        $idtecnico = $this->input->post('id', true);
        $this->Tecnicos_model->edit_tecnic($idtecnico);
        $this->verficha($idtecnico);   
    }

    public function baja($idtecnico)
    {
        $this->Tecnicos_model->del_tecnic($idtecnico);
        $this->index();
    }

    public function altaperfil()
    {
        $idtecnico = $this->input->post('id', true);
        $this->Tecnicos_model->add_perfil($idtecnico);
       
        $this->verFicha($idtecnico);
    }

    public function bajaperfil($idperfil, $idtecnico)
    {
        $this->Tecnicos_model->del_perfil($idperfil);
        $this->verFicha($idtecnico);
    }

    public function buscar()
    {
        // Paso la consulta a ficha pero deberia llamarse de otra manera
        $this->buscar = true;
        $this->ficha = $this->Tecnicos_model->find_tecnic();
        $this->index();
    }
}


/* End of file Gestaccesos.php */
/* Location: ./application/controllers/Gestaccesos.php */
