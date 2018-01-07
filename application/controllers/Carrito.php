<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/01/18
 * Time: 12:54
 */

class Carrito extends CI_Controller
{
    public function mostarCarrito()
    {
        $this->load->view("layout/header", array("title" => "Carrito"));
        $this->load->view("layout/navbar");
        $this->load->view("carrito_view");
        $this->load->view("layout/footer");
    }
}