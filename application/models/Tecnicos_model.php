<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Tecnicos_model
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

class Tecnicos_model extends CI_Model {

    // ------------------------------------------------------------------------

    public function __construct(){
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function updateAdmin(){
        $data['nombres']   = $this->input->post('nombres', true);
        $data['apellidos'] = $this->input->post('apellidos', true);
        $data['nomcorto']  = $this->input->post('nomcorto', true);
        $data['dni']       = $this->input->post('dni', true);
        $data['telefono']  = $this->input->post('telefono', true);
        $data['mail']      = $this->input->post('mail', true);

        $this->db->update('tecnicos', $data, "id = 1"); // El Id 1 es el admin si o si
    }

    public function datosAdmin(){
        $res = $this->db->get_where('tecnicos', array('id' => 1));
        return $res->row();
    }

    // ------------------------------------------------------------------------

}

/* End of file Tecnicos_model.php */
/* Location: ./application/models/Tecnicos_model.php */