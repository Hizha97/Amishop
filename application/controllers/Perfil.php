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

        $this->form_validation->set_rules('nombre', 'Nxss_clean($data);ombre', 'required');
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

        $this->load->model("usuarios_model");

        $data['tarjetas'] = $this->usuarios_model->getTarjetas($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Tarjetas"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_tarjetas_view", $data);
        $this->load->view("layout/footer");
    }

    public function direcciones()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));
        $this->load->model("usuarios_model");

        $data['direcciones'] = $this->usuarios_model->getDirecciones($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Direcciones"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_direcciones_view", $data);
        $this->load->view("layout/footer");
    }

    public function articulos()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticulos()->result_array();

        $this->load->view("layout/header", array("title" => "Articulos"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_articulos_view");
        $this->load->view("layout/footer");
    }

    public function usuarios()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("usuarios_model");
        $data['usuarios'] = $this->usuarios_model->getAllUsuarios()->result_array();

        $this->load->view("layout/header", array("title" => "Usuarios"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_usuarios_view", $data);
        $this->load->view("layout/footer");
    }
}