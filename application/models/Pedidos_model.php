<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 8/01/18
 * Time: 21:07
 */

class Pedidos_model extends CI_Model
{
    function getAllPedidos(){
        $query = $this->db->get('pedidos');
        return $query;
    }

    function eliminarPedido($id)
    {
        return $this->db->delete('pedidos', array('id' => $id));
    }

    function anadirPedido($data)
    {
        return $this->db->insert('pedidos', $data);
    }
}