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
}