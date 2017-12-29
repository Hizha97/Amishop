<?php
/**
 * Created by PhpStorm.
 * User: Isabel
 * Date: 28/12/2017
 * Time: 18:42
 */

class Articulos extends CI_Controller
{
    public function index()
    {
        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticulos()->result();

        $this->load->view("layout/header", array("title" => "Amishop"));
        $this->load->view("layout/navbar");
        $this->load->view("articulos_view", $data);
        $this->load->view("layout/footer");

    }
}