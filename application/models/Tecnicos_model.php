<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Tecnicos_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 * 
 *  ****************************************************************
 *  * En este modelo trabajaremos con dos tablas, las tablas       *
 *  * tecnicos y Perfiles, ya que llevam relaciones entre ellas    *
 *  ****************************************************************
 *
 */

class Tecnicos_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    public function updatePsw($idTecnico)
    {
        $data['psw'] = md5($this->input->post('psw', true));
        $this->db->update('usuarios', $data, "idtecnico = $idTecnico");
    }

    public function getPsw($idTecnico)
    {
        $res = $this->db->get_where('usuarios', array('idtecnico' => $idTecnico));
        $psw = $res->row();
        return $psw->psw;
    }

    public function get_tecnic($offset=FALSE, $limite=FALSE)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get('tecnicos', $limite, $offset);
    }

    public function total_tecnic()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from tecnicos");
        return $ssql->row();
    }

    public function ficha($id)
    {
        $res = $this->db->get_where('tecnicos', ['id' => $id]);
        return $res->row();
    }

    public function usr_perfil($id)
    {
        $res = $this->db->get_where('perfiles', ['idtecnico' => $id]);
        return $res->result();
    }

    public function add_tecnic()
    {
        $data['nombres']    = $this->input->post('nombres', true);
        $data['apellidos']  = $this->input->post('apellidos', true);
        $data['nomcorto']   = $this->input->post('nomcorto', true);
        $data['dni']        = strtoupper($this->input->post('dni', true));
        $data['telefono']   = $this->input->post('telefono', true);
        $data['mail']       = $this->input->post('mail', true);
        $data['comentario'] = $this->input->post('comentario', true);
        return $this->db->insert('tecnicos', $data);
    }

    public function edit_tecnic($id)
    {
        $data['nombres']    = $this->input->post('nombres', true);
        $data['apellidos']  = $this->input->post('apellidos', true);
        $data['nomcorto']   = $this->input->post('nomcorto', true);
        $data['dni']        = strtoupper($this->input->post('dni', true));
        $data['telefono']   = $this->input->post('telefono', true);
        $data['mail']       = $this->input->post('mail', true);
        $data['comentario'] = $this->input->post('comentario', true);
        return $this->db->update('tecnicos', $data, ['id' => $id]);
    }

    public function del_tecnic($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tecnicos');
    }

    public function add_perfil($idTecnico)
    {
        $perfil             = ['ADMINISTRADOR', 'TECNICO', 'OFICINA'];
        $data['nomusr']     = $this->input->post('nomusr', true);
        $data['psw']        = md5($this->input->post('psw', true));
        $data['nivel']      = $this->input->post('nivel', true);
        $data['idtecnico']  = $idTecnico;
        $data['descnivel']  = $perfil[$data['nivel']];

        return $this->db->insert('perfiles', $data);
    }

    public function del_perfil($idperfil)
    {
        $this->db->where('id', $idperfil);
        $this->db->delete('perfiles');
    }

    public function find_tecnic()
    {
        $tecnico = $this->input->post('tecnic', true);
        $ssql = "SELECT * FROM tecnicos WHERE nomcorto LIKE '%$tecnico%' OR nombres LIKE '%$tecnico%' OR apellidos LIKE '%$tecnico%' OR dni LIKE '%$tecnico%'";
        return $this->db->query($ssql);
    }
    // ------------------------------------------------------------------------

}

/* End of file Tecnicos_model.php */
/* Location: ./application/models/Tecnicos_model.php */
