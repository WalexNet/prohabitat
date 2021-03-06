<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Configuracion_model
 *
 * This Model for ...
 * Aqui se manejan las tablas Principales de la aplicación,
 * Estas son:
 *      Sector      : Es el Sector al que pertenece un profesional
 *      Tipologia   : Tipo de Incidencia (Reparacion, Mantenimiento)
 *      Estados     : Estado en el que esta una Incidencia (Abierta, cerrada, en proceso, etc.)
 *      Servicios   : Tipo de servicio al que pertenece una factura (Luz, Gas, Agua)
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Configuracion_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function getEmpresa()
    {
        // 
        $res = $this->db->get_where('empresa', ['id' => 1]);
        return $res->row();
    }

    public function editEmpresa()
    {
        //Preparamos parametros del archivo a subir
        $archivo = 'archivo';                               // el nombre del imput/file en el form
        $config['upload_path']      = './assets/img/';      // La carpeta donde se guardara
        $config['allowed_types']    = 'gif|jpg|png|svg';
        $config['max_size']         = 2000;                 // Max Tamaño en Kb
        $config['file_name']        = 'walex';              // El nombre que le pondremos
        $this->load->library('upload', $config);            // Cargamos la libreria y le pasamos la configuración
        //echo ('<pre>');
        /**
         * El metodo do_upload se encarga de copiar el archivo al lugar deseado
         * con el nombre deseado y devuelve true si tuvo exito
         */
        $subearchivo = $this->upload->do_upload($archivo);
        
        // Preparamos los datos a guardar
        $data['nombre']         = $this->input->post('nombre', true);
        $data['razonsocial']    = $this->input->post('razonsocial', true);
        $data['nif']            = $this->input->post('nif', true);
        $data['tel1']           = $this->input->post('tel1', true);
        $data['contacto1']      = $this->input->post('contacto1', true);
        $data['email1']         = $this->input->post('email1', true);
        $data['tel2']           = $this->input->post('tel2', true);
        $data['contacto2']      = $this->input->post('contacto2', true);
        $data['email2']         = $this->input->post('email2', true);
        $data['dir']            = $this->input->post('dir', true);
        $data['pob']            = $this->input->post('pob', true);
        $data['prov']           = $this->input->post('prov', true);
        $data['cp']             = $this->input->post('cp', true);
        $data['obs']            = $this->input->post('obs', true);
        $data['nomcorto']       = $this->input->post('nomcorto', true);
        if ($subearchivo){
            $data['logo'] = $this->upload->data('full_path');
        }else{
            $error = $this->upload->display_errors();
        }
        // $datain solo los datos para la tabla inquilinos
        // guardamos en inquilinos porque es el USR que debe pagar
        // las facturos en periodos que no hay usuarios
        $datain['nombres']      = $this->input->post('nombre', true);
        $datain['apellidos']    = $this->input->post('razonsocial', true);
        $datain['dni']          = $this->input->post('nif', true);
        $datain['telefono']     = $this->input->post('tel1', true);
        $datain['nick']         = $this->input->post('nomcorto', true);
        $datain['mail']         = $this->input->post('email1', true);
        $datain['comentario']   = $this->input->post('obs', true);
        // Guardamos la información
        $this->db->update('empresa', $data, ['id' => 1]);
        $this->db->update('inquilinos', $datain, ['id' => 1]);

        // print_r($this->upload->data());
        return $error;

    }

    // ------------------------------------------------------------------------
    // Estas Funciones se encargan de Leer (get), añadir (add) y borrar (del)
    // registros de las tablas sectores, tipologias, estados y servicios
    // segun corresponda
    public function get_datos($tabla)
    {
        $datos = $this->db->get($tabla);
        return $datos->result();
    }

    public function add_datos($tabla)
    {
        $data['des'] = strtoupper($this->input->post('descripcion',true));
        return $this->db->insert($tabla, $data);
    }

    public function del_datos($tabla, $id)
    {
        return $this->db->delete($tabla, ['id'=>$id]);
    }
    // ------------------------------------------------------------------------

}

/* End of file Configuracion_model.php */
/* Location: ./application/models/Configuracion_model.php */
