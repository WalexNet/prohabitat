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
        $data['idEdificio'] = $this->input->post('idEdificio', true);
        $data['planta']     = strtoupper($this->input->post('planta', true));
        $data['escalera']   = strtoupper($this->input->post('escalera', true));
        $data['puerta']     = strtoupper($this->input->post('puerta', true));
        $data['notas']      = $this->input->post('notas', true);

        $this->db->insert('pisos', $data);

    }

    public function total_pisos()
    {
        $total = $this->db->query("SELECT COUNT(*) AS TOTAL FROM pisos");
        return $total->row();
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('pisos', ['id'=>$id]);
    }

    public function edit_piso($id)
    {
        $data['idEdificio'] = $this->input->post('idEdificio', true);
        $data['idpoliza']   = $this->input->post('idPoliza', true);
        $data['planta']     = strtoupper($this->input->post('planta', true));
        $data['escalera']   = strtoupper($this->input->post('escalera', true));
        $data['puerta']     = strtoupper($this->input->post('puerta', true));
        $data['notas']      = $this->input->post('notas', true);

        return $this->db->update('pisos', $data, ['id'=>$id]);
    }

    public function del_piso($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pisos');
    }

    public function find_piso()
    {
        $busqueda = $this->input->post('buscar_piso',true);
        $this->db->like('nom_edificio', $busqueda);
        return $this->db->get('todo_pisos');
    }


} // FIn de la Clase

?>
