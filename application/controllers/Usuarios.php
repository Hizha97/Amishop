<?php

class Usuarios extends CI_Controller
{
    function registrarse()
    {
        if(isset($_SESSION['isLoggedIn']) and $_SESSION['isLoggedIn'])
            redirect(site_url());

        $this->load->helper("form");
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('email', 'Correo electronico', 'required');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required');



        $errorMsgs = array(
            1062 => "Ya hay un usuario con ese nombre de usuario o email.",
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("layout/header", array("title" => "Registro"));
            $this->load->view("layout/navbar");
            $this->load->view("nuevoUsuario");
        }
        else {
            $this->load->model('usuarios_model');
            if ($this->usuarios_model->nuevoUsuario()) {
                $this->session->set_userdata('isLoggedIn', TRUE);

                $userdata = $this->usuarios_model->getData($this->input->post('nombreUsuario'));

                $this->session->set_userdata('name', $userdata['nombre']);
                $this->session->set_userdata('id', $userdata['id']);
                $this->session->set_userdata('esAdministrador', $userdata['esAdministrador']);

                $this->load->view("layout/header", array("title" => "Registro"));
                $this->load->view("layout/navbar");
                $this->load->view('registro_usuarios_exito');

            }
            else {
                $err = $this->db->error();
                if (array_key_exists($err['code'], $errorMsgs))
                    $data['msg'] = $errorMsgs[$err['code']];
                else
                    $data['msg'] = "Error desconocido contacte con el administrador.";

                $this->load->view("layout/header", array("title" => "Registro"));
                $this->load->view("layout/navbar");
                $this->load->view('registro_usuarios_fallo', $data);
            }
        }

        $this->load->view("layout/footer");

    }

    function login()
    {
        if(isset($_SESSION['isLoggedIn']) and $_SESSION['isLoggedIn'])
            redirect(site_url());

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("layout/header", array("title" => "Inicio de sesión"));
            $this->load->view("layout/navbar");
            $this->load->view("login", array('error_login' => false));
        }
        else {
            $this->load->model('usuarios_model');
            if($this->usuarios_model->iniciarSesion())
            {
                $this->session->set_userdata('isLoggedIn', TRUE);

                $userdata = $this->usuarios_model->getData($this->input->post('nombreUsuario'));
                $this->session->set_userdata('name', $userdata['nombre']);
                $this->session->set_userdata('id', $userdata['id']);
                $this->session->set_userdata('esAdministrador', $userdata['esAdministrador']);
                $this->load->view("layout/header", array("title" => "Inicio de sesión"));
                $this->load->view("layout/navbar");
                $this->load->view("login_exito");
            }
            else {
                $this->load->view("layout/header", array("title" => "Inicio de sesión"));
                $this->load->view("layout/navbar");
                $this->load->view("login", array('error_login' => true, 'msg' => "El usuario, la contraseña o ambos son incorrectos."));
            }

        }

        $this->load->view("layout/footer");

    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


    function perfil(){

    }
}
?>