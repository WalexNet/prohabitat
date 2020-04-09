<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pisos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function get_pisos($offset=0,$limite=0)
    {
        return $this->db->get('todo_pisos', $limite, $offset);
    }

    public function add_piso()
    {
        $idEdificio = $this->input->post('idEdificio', true);
        $planta     = strtoupper($this->input->post('planta', true));
        $escalera   = strtoupper($this->input->post('escalera', true));
        $puerta     = strtoupper($this->input->post('puerta', true));
        $notas      = $this->input->post('notas', true);

        $ssql = "INSERT INTO pisos (idEdificio, planta, puerta, escalera, notas)
                VALUES('$idEdificio', '$planta', '$puerta', '$escalera', '$notas')";

        $this->db->query($ssql);

    }

    public function total_pisos()
    {
        $total = $this->db->query("SELECT COUNT(*) AS TOTAL FROM pisos");
        return $total->row();
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('pisos', array('id'=>$id));
    }

    public function edit_piso($id)
    {
        $idEdificio = $this->input->post('idEdificio', true);
        $planta     = strtoupper($this->input->post('planta', true));
        $escalera   = strtoupper($this->input->post('escalera', true));
        $puerta     = strtoupper($this->input->post('puerta', true));
        $notas      = $this->input->post('notas', true);

        $ssql = "UPDATE pisos
        SET idEdificio=$idEdificio, planta='$planta', puerta='$puerta', escalera='$escalera', notas='$notas'
        WHERE id=$id
        ";

        return $this->db->query($ssql);
    }

    public function del_piso($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pisos');
    }


} // FIn de la Clase

?>
