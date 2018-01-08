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

    public function anadirArticuloCarrito($idArticulo)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $idUsuario = $_SESSION['id'];
        $query = $this->db->get_where('lineas_de_compra', array("idUsuario" => $idUsuario, "idArticulo" => $idArticulo));
        $row = $query->row();
        if(isset($row))
            $this->aumentarCantidad($idArticulo);
        else
        {
            $data = array("idArticulo" => $idArticulo,
                    "idUsuario" => $idUsuario,
                    "cantidad" => 1);
            return $this->db->insert('lineas_de_compra', $data);
        }
    }

    public function aumentarCantidad($idArticulo)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));
        $idUsuario = $_SESSION['id'];

        $query = $this->db->get_where('lineas_de_compra', array("idUsuario" => $idUsuario,
                                                                "idArticulo" => $idArticulo))->result_array();

        $cantidad = $query['cantidad']++;
        $this->db->set('lineas_de_compra', $cantidad);
        return $this->db->insert('lineas_de_compra');
    }
}