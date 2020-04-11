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
 * **************************************************************
 * En este modelos trabajaremos con dos tablas, la tabla        *
 * tecnicos y usuarios, ya que llevam relaciones entre ellas    *
 * **************************************************************
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

    public function updatePsw($idTecnico){
        $data['psw'] = md5($this->input->post('psw', true));
        $this->db->update('usuarios', $data, "idtecnico = $idTecnico");
    }

    public function getPsw($idTecnico){
        $res = $this->db->get_where('usuarios', array('idtecnico' => $idTecnico));
        $psw = $res->row();
        return $psw->psw;
    }

    // ------------------------------------------------------------------------

}

/* End of file Tecnicos_model.php */
/* Location: ./application/models/Tecnicos_model.php */