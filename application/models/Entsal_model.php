<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Entsal_model
 *
 * This Model for ...
 * 
 * @package	  CodeIgniter
 * @category  Model
 * @author    Daniel Walter Pérez Corvalán <walter@walex.net>
 * @link      https://www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Entsal_model extends CI_Model {

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function get_usr($offset=0,$limite=0)
    {
        // Pedimos el listado de usuarios
        return $this->db->get('inqui_entsal', $limite, $offset);
    }

    public function find_usu($busqueda)
    {
        $ssql="SELECT * FROM inqui_entsal WHERE nick LIKE '%$busqueda%' OR nomape LIKE '%$busqueda%'" ; 
        return $this->db->query($ssql);
    }

    public function total_usr()
    {
        $total = $this->db->query("SELECT COUNT(*) AS TOTAL FROM inqui_entsal");
        return $total->row();
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('inqui_entsal', array('idinqui'=>$id));
    }

    public function entrada()
    {
        $idinquilino = $_POST['idusuario'];
        $idpiso      = $_POST['idpiso'];
        $ocupado     = 1;
        $fechaE      = $_POST['fechaE'];
        $lgasE       = $_POST['lgasE'];
        $lluzE       = $_POST['lluzE'];
        $laguaE      = $_POST['laguaE'];

        $ssql = "INSERT INTO entsal
        (idinquilino, idpiso, ocupado, fechaE, lgasE, lluzE, laguaE)
        VALUES('$idinquilino', '$idpiso', '$ocupado', '$fechaE', '$lgasE', '$lluzE', '$laguaE')";

        $this->db->query($ssql);

        $this->db->where('id', $idinquilino);
        $this->db->update('inquilinos', array('piso'=>1));
        
    }

    public function salida()
    {
        $idinqui = $_POST['idinqui'];
        $id      = $_POST['id'];
        $ocupado = 0;
        $fechaS  = $_POST['fechaS'];
        $lgasS   = $_POST['lgasS'];
        $lluzS   = $_POST['lluzS'];
        $laguaS  = $_POST['laguaS'];

        $ssql = "UPDATE entsal
        SET ocupado=$ocupado, fechaS='$fechaS', lgasS=$lgasS, lluzS=$lluzS, laguaS=$laguaS
        WHERE id=$id
        ";

        $this->db->query($ssql);

        $this->db->where('id', $idinqui);
        $this->db->update('inquilinos', array('piso'=>0));

    }

    // ------------------------------------------------------------------------

}

/* End of file Entsal_model.php */
/* Location: ./application/models/Entsal_model.php */