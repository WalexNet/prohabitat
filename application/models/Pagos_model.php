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
    public function add_pago($idusr, $idfactura)
    {
        // Preparamos la consulta
        $data['fecha']      = date('Y-m-d H:i:s');
        $data['pagado']     = true;
        $where['idinqui']   = $idusr;
        $where['idfactura'] = $idfactura;
        
        $this->db->update('recpagos',$data, $where);
    }

    public function pagado($idusr, $idfactura)
    {
        //
        $query = $this->db->get_where('recpagos', array('idinqui' => $idusr, 'idfactura' => $idfactura));
        return $query->result();
    }

    // Buscamos los Usuarios que deben pagar la factura determinada
    public function usrxfac($idfactura){ 
        $query = $this->db->get_where('pagos', array('idfactura' => $idfactura));
        return $query->result();
    }

    // ------------------------------------------------------------------------

}

/* End of file Pagos_model.php */
/* Location: ./application/models/Pagos_model.php */