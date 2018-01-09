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

    public function getPedido($id)
    {

        $this->db->select('*')
            ->from('pedidos')
            ->where('id =', $id);

        $query = $this->db->get();
        $row = $query->row_array();
        if(isset($row))
            return $row;
        else
            return false;
    }

    public function getPedidosUsuario($idUsuario)
    {
        $query = $this->db->get_where('pedidos', array("idUsuario" => $idUsuario));
        return $query;
    }

    public function actualizarPedido($data)
    {
        $this->load->helper('security');
        $data = xss_clean(html_escape($data));

        return $this->db->set($data)
            ->where('id =', $data['id'])
            ->update('pedidos');
    }


}