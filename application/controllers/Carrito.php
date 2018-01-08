<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/01/18
 * Time: 12:54
 */

class Carrito extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("articulos_model");
        $this->load->model("usuarios_model");
        $this->load->model("carrito_model");

        $data['carritos'] = $this->carrito_model->getCarrito($_SESSION['id'])->result_array();
        $data['usuarios'] = $this->usuarios_model->getDataWithId($_SESSION['id']);

        foreach ($data['carritos'] as $item)
        {
            $arrayArticulos[$item['idArticulo']] = $this->articulos_model->getArticuloWithId($item['idArticulo'])->result_array();
        }
        if(isset($arrayArticulos))
            $data['articulos'] = $arrayArticulos;

        $this->load->view("layout/header", array("title" => "Carrito"));
        $this->load->view("layout/navbar");
        $this->load->view("carrito_view", $data);
        $this->load->view("layout/footer");
    }
}