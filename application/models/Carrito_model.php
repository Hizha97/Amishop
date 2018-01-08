<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 8/01/18
 * Time: 2:42
 */

class Carrito_model extends CI_Model
{
    public function getCarrito($id)
    {
        $query = $this->db->get_where('lineas_de_compra', array("idUsuario" => $id));
        return $query;
    }
}