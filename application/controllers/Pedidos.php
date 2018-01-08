<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 6/01/18
 * Time: 3:29
 */

class Pedidos extends CI_Controller
{
    public function tarjetasDirecciones()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->model("usuarios_model");
        $this->load->model("tarjetas_model");
        $this->load->model("direcciones_model");

        $data['usuario'] = $this->usuarios_model->getDataWithId($_SESSION['id']);
        $data['direcciones'] = $this->usuarios_model->getDirecciones($_SESSION['id']);
        $data['tarjetas'] = $this->usuarios_model->getTarjetas($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Tramitar pedido"));
        $this->load->view("layout/navbar");
        $this->load->view("pedido_tarjetas_direcciones_view", $data);
        $this->load->view("layout/footer");
    }

    public function eliminar($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));
        $this->load->model('pedidos_model');
        $this->pedidos_model->eliminarPedido($id);
        redirect(site_url('perfil/pedidos'));
    }

    public function tramitarPedido()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("pedidos_model");
        $this->load->model("carrito_model");
        date_default_timezone_set("Europe/Madrid");

        switch ($this->input->post('transportista'))
        {
            case 'Correos': $fecha = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y")));
                break;
            case 'CorreosPrioritario' : $fecha = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
                break;
            case 'SEUR': $fecha = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
                break;
        }
        $data = array("idUsuario" => $_SESSION['id'],
                        "idTarjeta" => $this->input->post('idTarjeta'),
                        "idDireccion" => $this->input->post('idDireccion'),
                        "transportista" => $this->input->post('transportista'),
                        "estado" => "Sin tramitar",
                        "fechaPedido" => date("Y/m/d"),
                        "fechaEntrega" => $fecha);
        if($this->pedidos_model->anadirPedido($data))
        {
            $idPedido = $this->db->insert_id();
            $lineasDeCompra = $this->carrito_model->getCarrito($_SESSION['id'])->result_array();
            foreach ($lineasDeCompra as $lineaDeCompra)
            {
                $this->db->insert('pedidos_lineasdecompra', array("idPedido" => $idPedido, "idLineaDeCompra" => $lineaDeCompra['id']));
            }
        }

    }
}