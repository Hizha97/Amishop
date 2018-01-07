<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 7/01/18
 * Time: 20:04
 */

class Tarjetas_model extends CI_Model
{
    public function getTarjeta($id)
    {

        $this->db->select('*')
            ->from('tarjetas')
            ->where('id =', $id);

        $query = $this->db->get();
        $row = $query->row_array();
        if(isset($row))
            return $row;
        else
            return false;
    }

    public function actualizarTarjeta($data)
    {
        $this->load->helper('security');
        $data = xss_clean(html_escape($data));

        return $this->db->set($data)
            ->where('id =', $data['id'])
            ->update('tarjetas');
    }
}