<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        //Preparamos parametros del archivo a subir
        $config['upload_path']      = './Docus/doc/';           // La carpeta donde se guardara
        $config['allowed_types']    = 'gif|jpg|png|svg|pdf';
        $config['max_size']         = 4000;                     // Max Tamaño en Kb
        $config['file_name']        = date('YMd-His') . 'fac';  // El nombre que le pondremos
        // Cargamos la libreria y le pasamos la configuración
        $this->load->library('upload', $config);      
    }


    public function get_factu($offset = FALSE, $limite = FALSE)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('todo_facturas', $limite, $offset);
    }

    public function get_ficha($id)
    {
        return $this->db->get_where('todo_facturas', array('id' => $id));
    }

    public function addfactu()
    {
        // el nombre del imput/file en el form
        $archivo = 'archivoFactura';                            
        /**
        * El metodo do_upload se encarga de copiar el archivo al lugar deseado
        * con el nombre deseado y devuelve true si tuvo exito
        */
        $subearchivo = $this->upload->do_upload($archivo);
        $data['numero']     = strtoupper($this->input->post('numero', true));
        $data['fechaf']     = $this->input->post('fechaf', true);
        $data['importe']    = $this->input->post('importe', true);
        $data['fdes']       = $this->input->post('fdes', true);
        $data['fhas']       = $this->input->post('fhas', true);
        $data['lant']       = $this->input->post('lant', true);
        $data['lact']       = $this->input->post('lact', true);
        $data['idservicio'] = $this->input->post('idservicio', true);
        $data['periodo']    = $this->input->post('periodo', true);
        $data['idpiso']     = $this->input->post('idpiso', true);
        if ($subearchivo) {
            $data['docu']   = true;
            $data['facdoc'] = 'Docus/doc/'.$this->upload->data('file_name');
        }

        return $this->db->insert('facturas', $data);
    }

    public function del_factu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('facturas');
        
    }

    public function edit_factu($id)
    {
        // el nombre del imput/file en el form
        $archivo = 'archivoFactura';                            
        /**
        * El metodo do_upload se encarga de copiar el archivo al lugar deseado
        * con el nombre deseado y devuelve true si tuvo exito
        */
        $subearchivo = $this->upload->do_upload($archivo);

        $data['numero']     = strtoupper($this->input->post('numero', true));
        $data['fechaf']     = $this->input->post('fechaf', true);
        $data['importe']    = $this->input->post('importe', true);
        $data['fdes']       = $this->input->post('fdes', true);
        $data['fhas']       = $this->input->post('fhas', true);
        $data['lant']       = $this->input->post('lant', true);
        $data['lact']       = $this->input->post('lact', true);
        $data['idservicio'] = $this->input->post('idservicio', true);
        $data['periodo']    = $this->input->post('periodo', true);
        $data['idpiso']     = $this->input->post('idpiso', true);
        if ($subearchivo) {
            $data['docu']   = true;
            $data['facdoc'] = 'Docus/doc/'.$this->upload->data('file_name');
        }

        return $this->db->update('facturas', $data, "id = $id");
    }

    public function total_factu()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from facturas");
        return $ssql->row();
    }

    public function find_factu($busqueda)
    {
        $ssql = "SELECT * FROM todo_facturas WHERE numero LIKE '%$busqueda%'";
        return $this->db->query($ssql);
    }

    /**
     * Esta Función nos devuelve los usuarios que han estado en ese piso, en el periodo correspondiente
     * Por Ejemplo si el periodo da la factura "X" es de: 2019-09-13 hasta 2019-12-12 y la factura
     * pertenece al piso con ID 6, esta funcion nos devolveria la siguinte tabla:
     * 
     * id|idinquilino|idpiso|usuario|ocupado|fechaE    |lgasE |lluzE |laguaE|fechaS    |lgasS|lluzS |laguaS|notas|
     * --|-----------|------|-------|-------|----------|------|------|------|----------|-----|------|------|-----|
     *  5|         10|     6|Pedro  |      1|2019-08-13|452147|241200|   105|          |    0|     0|     0|     |
     *  6|          7|     6|Rosario|      0|2019-09-01|  5412|241240|   110|2019-11-02|21451|241265|   190|     |
     *  7|          8|     6|Halima |      1|2019-10-22| 87451|241245|   165|          |    0|     0|     0|     |
     *  8|          9|     6|Alina  |      1|2019-09-10| 14854|241240|   145|          |    0|     0|     0|     |
     */
    public function pagos_factura($fdes, $fhas, $piso)
    {
        $ssql = "CALL userxfactura('$fdes', '$fhas', '$piso')"; // En CI da error los Procedures
        $datos = $this->db->query($ssql);
        // Por un Bug en CI cada vez que ejecutamos un Procedimiento almacenado,
        // debemos ejecutar la siguiente instruccion:
        mysqli_next_result($this->db->conn_id);
        return $datos;
    }

    public function addpagos($registros)
    {
        $this->db->insert_batch('recpagos', $registros);
    }

    public function modificaPagosBatch($data, $idfactura)
    {
        foreach ($data as $fila) {
            $this->db->update('recpagos', $fila, "idfactura = $idfactura");
        }
    }

    public function fac_pagadas($fdes = null, $fhas = null)
    {
        if(($fdes != null) && ($fhas != null)){
            $this->db->where("$fdes BETWEEN", $fhas);
        };
        $res = $this->db->get('fac_pagadas');
        return $res->result();
    }

    public function fac_ptes($anio = null)
    {
        if($anio != null){
            $this->db->where("YEAR(ffactura) =", $anio);
        };
        $res = $this->db->get('fac_ptes');
        return $res->result();
    }
} // FIn de la Clase
