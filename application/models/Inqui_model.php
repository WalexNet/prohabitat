<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inqui_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function addinqui()
    {
		$nombre     = $this->input->post('nombre', true);
		$apellido   = $this->input->post('apellido', true);
		$dni        = strtoupper($this->input->post('dni', true));
		$telefono   = $this->input->post('telefono', true);
		$nick       = $this->input->post('nick', true);
        $pax        = $this->input->post('pax', true);
        $mail       = strtolower($this->input->post('mail', true));
        $comentario = $this->input->post('comentario', true);

        $ssql="INSERT INTO inquilinos (nick, nombres, apellidos, dni, telefono, mail, pax, comentario)
               VALUES('$nick', '$nombre', '$apellido', '$dni', '$telefono', '$mail', $pax, '$comentario')";
        
        $this->db->query($ssql);

    }

    public function get_inqui($offset=FALSE, $limite=FALSE)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('inquilinos', $limite, $offset);
    }

    public function del_inqui($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inquilinos');
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('inquilinos', array('id'=>$id));
    }

    public function find_inqui($busqueda)
    {
       $ssql="SELECT * FROM inquilinos WHERE nick LIKE '%$busqueda%' OR nombres LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%'" ;
       return $this->db->query($ssql);
    }

    public function edit_inqui($id)
    {
        $nombre = $this->input->post('nombre', true);
		$apellido = $this->input->post('apellido', true);
		$dni = strtoupper($this->input->post('dni', true));
		$telefono = $this->input->post('telefono', true);
		$nick = $this->input->post('nick', true);
        $pax = $this->input->post('pax', true);
        $mail = strtolower($this->input->post('mail', true));
        $comentario = $this->input->post('comentario', true);
        
        $ssql = "UPDATE inquilinos
                 SET nombres = '$nombre',
                     apellidos = '$apellido',
                     dni = '$dni',
                     telefono = '$telefono',
                     nick = '$nick',
                     pax = $pax,
                     mail = '$mail',
                     comentario = '$comentario'
                 WHERE id = $id
                ";
        
        return $this->db->query($ssql);
    }

    public function total_inqui()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from inquilinos");
        return $ssql->row();
    }
        

} // FIn de la Clase

?>