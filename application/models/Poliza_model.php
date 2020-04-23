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

    public function get_ficha($id)
    {
        $res = $this->db->get_where('poliza', ['id'=>$id]);
        return $res->row();
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
    // ------------------------------------------------------------------------

}

/* End of file Poliza_model.php */
/* Location: ./application/models/Poliza_model.php */
