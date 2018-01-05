<?php

class Perfil extends CI_Controller
{
    public function index()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));


        $this->load->model("usuarios_model");

        $data['datos'] = $this->usuarios_model->getDataWithId($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Registro"));
        $this->load->view("layout/navbar");


        $this->load->view("perfil_view", $data);
        $this->load->view("layout/footer");


    }
    public function tarjetas()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->view("layout/header", array("title" => "Registro"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_tarjetas_view");
        $this->load->view("layout/footer");


    }

    public function direcciones()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->view("layout/header", array("title" => "Registro"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_direcciones_view");
        $this->load->view("layout/footer");


    }
}