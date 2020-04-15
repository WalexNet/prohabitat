<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Usuarios_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Usuarios_model extends CI_Model {

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function index()
    {
        // 
    }

    public function  existeUsr(){
        $datos['nomusr']    = $this->input->post('usr', true);
        $datos['psw']       = md5($this->input->post('psw', true));
        $res = $this->db->get_where('perfiles', $datos);
        $fila = $res->row();
        return $fila; //(isset($fila)) ? true : false;
    }

    // ------------------------------------------------------------------------

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */