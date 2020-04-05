<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Pagos_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Pagos_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function add_pago($idusr, $idfactura, $fini, $ffin, $imp, $pax)
  {
    // 
    $sql="INSERT INTO recpagos (idinqui, idfactura, fecha, fdes, fhas, importe, pax)
          VALUES($idusr, $idfactura, current_timestamp(), '$fini', '$ffin', $imp, $pax)";
    $this->db->query($sql);
  }

  public function pagado($idusr, $idfactura)
  {
    //
    $query = $this->db->get_where('recpagos', array('idinqui' => $idusr, 'idfactura' => $idfactura));
    return $query->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Pagos_model.php */
/* Location: ./application/models/Pagos_model.php */