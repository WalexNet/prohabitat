<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function get_factu($offset=FALSE, $limite=FALSE)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('todo_facturas', $limite, $offset);
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('todo_facturas', array('id'=>$id));
    }

    public function addfactu()
    {
        $numero     = strtoupper($this->input->post('numero',true));
        $fechaf     = $this->input->post('fechaf',true);
        $importe    = $this->input->post('importe',true);
        $fdes       = $this->input->post('fdes',true);
        $fhas       = $this->input->post('fhas',true);
        $lant       = $this->input->post('lant',true);
        $lact       = $this->input->post('lact',true);
        $idservicio = $this->input->post('idservicio',true);
        $periodo    = $this->input->post('periodo',true);
        $idpiso     = $this->input->post('idpiso',true);

        $ssql = "INSERT INTO facturas (numero, fechaf, importe, fdes, fhas, lant, lact, idservicio, periodo, idpiso)
                 VALUES('$numero', '$fechaf', $importe, '$fdes', '$fhas', $lant, $lact, $idservicio, '$periodo', $idpiso)";

        $this->db->query($ssql);
    }

    public function del_factu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('facturas');
    }

    public function edit_factu($id)
    {
        $numero     = strtoupper($this->input->post('numero',true));
        $fechaf     = $this->input->post('fechaf',true);
        $importe    = $this->input->post('importe',true);
        $fdes       = $this->input->post('fdes',true);
        $fhas       = $this->input->post('fhas',true);
        $lant       = $this->input->post('lant',true);
        $lact       = $this->input->post('lact',true);
        $idservicio = $this->input->post('idservicio',true);
        $periodo    = $this->input->post('periodo',true);
        $idpiso     = $this->input->post('idpiso',true);
        
        $ssql = "UPDATE facturas
                 SET numero     = '$numero',
                     fechaf     = '$fechaf',
                     importe    = $importe,
                     fdes       = '$fdes',
                     fhas       = '$fhas',
                     lant       = '$lant',
                     lact       = '$lact',
                     idservicio = $idservicio,
                     periodo    = '$periodo',
                     idpiso     = $idpiso
                 WHERE id = $id
                ";
        
        return $this->db->query($ssql);
    }

    public function total_factu()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from facturas");
        return $ssql->row();
    }

    public function find_factu($busqueda)
    {
        $ssql="SELECT * FROM todo_facturas WHERE numero LIKE '%$busqueda%'" ;
        return $this->db->query($ssql);
    }

    public function pagos_factura($fdes, $fhas, $piso)
    {
        $ssql = "CALL userxfactura('$fdes', '$fhas', '$piso')"; // En CI da error los Procedures
        $datos = $this->db->query($ssql);
        // Por un Bug en CI cada vez que ejecutamos un Procedimiento almacenado,
        // debemos ejecutar la siguiente instruccion:
        mysqli_next_result($this->db->conn_id);
        return $datos;
    }

} // FIn de la Clase

?>