<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Poliza_model
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

class Poliza_model extends CI_Model
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

    public function get_polizas($offset = 0, $limite = 0)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get('todo_poliza', $limite, $offset);
        return $datos->result();
    }

    public function get_polizas_aseguradora($id)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get_where('todo_poliza', ['idaseg'=>$id]);
        return $datos->result();
    }

    public function total_poliza()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from todo_poliza");
        return $ssql->row();
    }

    public function get_ficha($id)
    {
        $res = $this->db->get_where('todo_poliza', ['id'=>$id]);
        return $res->row();
    }

    public function find_poliza()
    {
        $busqueda   = $this->input->post('buscar_poliza',true);

        $this->db->or_like('asegprop', $busqueda);
        $this->db->or_like('asegtit', $busqueda);
        $this->db->or_like('asegcomp', $busqueda);
        $this->db->or_like('npoliza', $busqueda);
        $this->db->or_like('referencia', $busqueda);
        $this->db->or_like('titular', $busqueda);
        $datos = $this->db->get('todo_poliza');

        return $datos->result();
    }

    public function add_poliza()
    {
        $data['idaseg']         = $this->input->post('idaseg',true);
        $data['npoliza']        = strtoupper($this->input->post('npoliza',true));
        $data['referencia']     = strtoupper($this->input->post('referencia',true));
        $data['titular']        = $this->input->post('titular',true);
        $data['femision']       = $this->input->post('femision',true);
        $data['fvencimiento']   = $this->input->post('fvencimiento',true);
        $data['cobertura']      = $this->input->post('cobertura',true);

        return $this->db->insert('poliza', $data);
    }

    public function update_poliza($id)
    {
        $data['idaseg']         = $this->input->post('idaseg',true);
        $data['npoliza']        = strtoupper($this->input->post('npoliza',true));
        $data['referencia']     = strtoupper($this->input->post('referencia',true));
        $data['titular']        = $this->input->post('titular',true);
        $data['femision']       = $this->input->post('femision',true);
        $data['fvencimiento']   = $this->input->post('fvencimiento',true);
        $data['cobertura']      = $this->input->post('cobertura',true);

        return $this->db->update('poliza', $data, ['id'=>$id]);
    }

    public function del_poliza($id)
    {
        return $this->db->delete('poliza', ['id' => $id]);
    }
    // ------------------------------------------------------------------------

}

/* End of file Poliza_model.php */
/* Location: ./application/models/Poliza_model.php */
