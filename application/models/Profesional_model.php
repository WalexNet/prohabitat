<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Profesional_model
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

class Profesional_model extends CI_Model
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

    public function get_profesional($offset = FALSE, $limite = FALSE)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get('todo_profesional', $limite, $offset);
        return $datos->result();
    }

    public function total_profesional()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from profesionales");
        return $ssql->row();
    }

    public function add_profesional()
    {
        $data['razonsocial']    = $this->input->post('razonsocial',true);
        $data['cif']            = strtoupper($this->input->post('cif',true));
        $data['idsector']       = $this->input->post('idsector',true);
        $data['nombres']        = $this->input->post('nombres',true);
        $data['apellidos']      = $this->input->post('apellidos',true);
        $data['tel1']           = $this->input->post('tel1',true);
        $data['tel2']           = $this->input->post('tel2',true);
        $data['mail']           = $this->input->post('mail',true);
        $data['dir']            = $this->input->post('dir',true);
        $data['pob']            = $this->input->post('pob',true);
        $data['prov']           = $this->input->post('prov',true);
        $data['cp']             = $this->input->post('cp',true);
        $data['comentario']     = $this->input->post('comentario',true);
        $data['cargo']          = $this->input->post('cargo',true);


        return $this->db->insert('profesionales', $data);
    }

    public function get_ficha($id)
    {
        $res = $this->db->get_where('todo_profesional', ['id'=>$id]);
        return $res->row();
    }

    public function update_profesional($id)
    {
        $data['razonsocial']    = $this->input->post('razonsocial',true);
        $data['cif']            = strtoupper($this->input->post('cif',true));
        $data['idsector']       = $this->input->post('idsector',true);
        $data['nombres']        = $this->input->post('nombres',true);
        $data['apellidos']      = $this->input->post('apellidos',true);
        $data['tel1']           = $this->input->post('tel1',true);
        $data['tel2']           = $this->input->post('tel2',true);
        $data['mail']           = $this->input->post('mail',true);
        $data['dir']            = $this->input->post('dir',true);
        $data['pob']            = $this->input->post('pob',true);
        $data['prov']           = $this->input->post('prov',true);
        $data['cp']             = $this->input->post('cp',true);
        $data['comentario']     = $this->input->post('comentario',true);
        $data['cargo']          = $this->input->post('cargo',true);


        return $this->db->update('profesionales', $data, ['id' => $id]);        
    }

    public function del_ficha($id)
    {
        return $this->db->delete('profesionales', ['id'=>$id]);
    }

    public function find_profesional()
    {
        $busqueda   = $this->input->post('buscar_profesionales',true);

        $this->db->or_like('razonsocial', $busqueda);
        $this->db->or_like('cif', $busqueda);
        $this->db->or_like('nombres', $busqueda);
        $datos = $this->db->get('todo_profesional');
        
        return $datos->result();
    }

    // ------------------------------------------------------------------------

}

/* End of file Profesional_model.php */
/* Location: ./application/models/Profesional_model.php */
