<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function get_servicios()
    {
        return $this->db->get('servicios');
    }




} // FIn de la Clase

?>