<?php

class Perfil extends CI_Controller
{
    public function index()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model("usuarios_model");

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('email', 'Correo electronico', 'required');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['datos'] = $this->usuarios_model->getDataWithId($_SESSION['id']);
            $this->load->view("layout/header", array("title" => "Mi perfil"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_view", $data);
        }
        else
        {
            $data = array(
                "id" => $_SESSION['id'],
                "nombre" => $this->input->post('nombre'),
                "apellidos" => $this->input->post('apellidos'),
                "email" => $this->input->post('email'),
                "nombreUsuario" => $this->input->post('nombreUsuario')
            );

            if($this->input->post('contrasena') != null)
                $data["contrasena"] = $this->input->post('contrasena');

            $this->load->view("layout/header", array("title" => "Mi perfil"));
            $this->load->view("layout/navbar");
            if($this->usuarios_model->actualizarUsuario($data))
                $this->session->set_flashdata('success', true);
            else
                $this->session->set_flashdata('error', true);

            redirect(site_url('perfil'));
        }

        $this->load->view("layout/footer");

    }


    public function tarjetas()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->view("layout/header", array("title" => "Tarjetas"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_tarjetas_view");
        $this->load->view("layout/footer");


    }

    public function direcciones()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->view("layout/header", array("title" => "Direcciones"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_direcciones_view");
        $this->load->view("layout/footer");


    }
}