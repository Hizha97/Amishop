<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 6/01/18
 * Time: 17:12
 */

class Ratings_model extends CI_Model
{
    public function getRatings($id)
    {
        $query = $this->db->get_where('valoraciones', array("idArticulo" => $id));
        return $query;
    }
    public function addRatings($data)
    {
        $query = $this->db->get_where('valoraciones',array("idArticulo" => $data['idArticulo'], "idUsuario" => $data['idUsuario']));
        $row = $query->row();
        if(isset($row))
            return false;
        return $this->db->insert('valoraciones', $data);
    }

    public function eliminarRating($id)
    {
        $this->db->delete('valoraciones', array('idUsuario' => $id));
    }
}