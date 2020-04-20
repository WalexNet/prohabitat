<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Aseguradora_model
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

class Aseguradora_model extends CI_Model
{

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

    public function get_aseguradora($offset = FALSE, $limite = FALSE)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get('aseguradora', $limite, $offset);
        return $datos->result();
    }

    public function total_aseguradora()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from aseguradora");
        return $ssql->row();
    }

    public function add_aseguradora()
    {
        $data['propietario']    = $this->input->post('propietario',true);
        $data['titular']        = $this->input->post('titular',true);
        $data['compania']       = $this->input->post('compania',true);
        $data['tel1']           = $this->input->post('tel1',true);
        $data['contacto1']      = $this->input->post('contacto1',true);
        $data['email1']         = $this->input->post('email1',true);
        $data['tel2']           = $this->input->post('tel2',true);
        $data['contacto2']      = $this->input->post('contacto2',true);
        $data['email2']         = $this->input->post('email2',true);
        $data['dir']            = $this->input->post('dir',true);
        $data['pob']            = $this->input->post('pob',true);
        $data['prov']           = $this->input->post('prov',true);
        $data['cp']             = $this->input->post('cp',true);
        $data['obs']            = $this->input->post('obs',true);

        return $this->db->insert('aseguradora', $data);
    }

    public function get_ficha($id)
    {
        $res = $this->db->get_where('aseguradora', ['id'=>$id]);
        return $res->row();
    }

    public function del_ficha($id)
    {
        return $this->db->delete('aseguradora', ['id'=>$id]);
    }
    // ------------------------------------------------------------------------

}

/* End of file Prueba_model.php */
/* Location: ./application/models/Prueba_model.php */
