<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Sector_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author      Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link        www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Sector_model extends CI_Model
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

    public function get_sector($offset = FALSE, $limite = FALSE)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get('sector', $limite, $offset);
        return $datos->result();
    }

    // ------------------------------------------------------------------------

}

/* End of file Sector_model.php */
/* Location: ./application/models/Sector_model.php */
