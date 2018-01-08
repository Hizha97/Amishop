<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 6/01/18
 * Time: 3:29
 */

class Pedidos extends CI_Controller
{

    public function eliminar($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));
        $this->load->model('pedidos_model');
        $this->pedidos_model->eliminarPedido($id);
        redirect(site_url('perfil/pedidos'));
    }
}