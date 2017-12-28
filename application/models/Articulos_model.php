<?php
/**
 * Created by PhpStorm.
 * User: Isabel
 * Date: 28/12/2017
 * Time: 19:44
 */

class Articulos_model extends CI_Model
{
    public function getArticulos()
    {
        $query = $this->db->get('articulos');
        return $query;
    }
}