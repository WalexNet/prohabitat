<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Edificios_model
 *
 * This Model for ...
 * 
 * @package	    CodeIgniter
 * @category	Model
 * @author      Daniel Walter Pérez Corvalán <walter@walex.net>
 * @link        https://www.walex.net
 * @param       ...
 * @return      ...
 *
 */

class Edificios_model extends CI_Model {

    // ------------------------------------------------------------------------

    public function __construct(){
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function get_edi($offset=FALSE, $limite=FALSE)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('edificios', $limite, $offset);
    }

    public function get_todo_edi($offset=FALSE, $limite=FALSE)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('todo_edificios', $limite, $offset);
    }

    public function add_edi()
    {
        $nombre    = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $cp        = $_POST['cp'];
        $poblacion = $_POST['poblacion'];
        $notas     = $_POST['comentario'];

        $ssql = "INSERT INTO edificios (nombre, direccion, cp, poblacion, notas)
                VALUES('$nombre', '$direccion', '$cp', '$poblacion', '$notas')";
            
        $this->db->query($ssql);
    }

    public function del_edi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('edificios');
    }

    public function total_edi()
    {
        $consulta = $this->db->query("SELECT COUNT(*) as TOTAL from edificios");
        return $consulta->row();
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('todo_edificios', array('id'=>$id));
    }

    public function find_edi($busqueda)
    {
        $ssql="SELECT * FROM edificios WHERE direccion LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%'" ;
        return $this->db->query($ssql);
    }

    public function edit_edi($id)
    {
        $nombre    = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $cp        = $_POST['cp'];
        $poblacion = $_POST['poblacion'];
        $notas     = $_POST['comentario'];

        $ssql = "UPDATE edificios
                SET nombre='$nombre', direccion='$direccion', cp='$cp', poblacion='$poblacion', notas='$notas'
                WHERE id = $id
                ";

        return $this->db->query($ssql);
    }

    // ------------------------------------------------------------------------

}

/* End of file Edificios_model.php */
/* Location: ./application/models/Edificios_model.php */