<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 7/01/18
 * Time: 21:02
 */

class Direcciones_model extends CI_Model
{
    public function getDireccion($id)
    {

        $this->db->select('*')
            ->from('direcciones')
            ->where('id =', $id);

        $query = $this->db->get();
        $row = $query->row_array();
        if(isset($row))
            return $row;
        else
            return false;
    }

    public function actualizarDireccion($data)
    {
        $this->load->helper('security');
        $data = xss_clean(html_escape($data));

        return $this->db->set($data)
            ->where('id =', $data['id'])
            ->update('direcciones');
    }

    public function nuevaDireccion($data)
    {
        $this->load->helper('security');

        return $this->db->insert('direcciones', xss_clean(html_escape($data)));
    }
}