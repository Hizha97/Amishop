<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/01/18
 * Time: 17:11
 */

class Comentarios_model extends CI_Model
{
    public function getComentarios($id)
    {
        $query = $this->db->get_where('comentarios', array("idArticulo" => $id));
        return $query;
    }

    public function addComentario($data)
    {
        $query = $this->db->get_where('comentarios',array("idArticulo" => $data['idArticulo'], "idUsuario" => $data['idUsuario']));
        $row = $query->row();
        if(isset($row))
            return false;
        return $this->db->insert('comentarios', $data);
    }
}