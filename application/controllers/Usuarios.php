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
            $data = array(
                "nombre" => $this->input->post('nombre'),
                "apellidos" => $this->input->post('apellidos'),
                "email" => $this->input->post('email'),
                "nombreUsuario" => $this->input->post('nombreUsuario'),
                "contrasena" => $this->input->post('contrasena'),
            );
            if ($this->usuarios_model->nuevoUsuario($data)) {
                $this->session->set_userdata('isLoggedIn', TRUE);

                $userdata = $this->usuarios_model->getData($data['nombreUsuario']);

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

    function eliminar($id)
    {
        $this->load->model('usuarios_model');
        $this->usuarios_model->eliminarUsuario($id);
        redirect(site_url('perfil/usuarios'));
    }

    function actualizar($id)
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model("usuarios_model");

        $this->form_validation->set_rules('nombre', 'Nxss_clean($data);ombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('email', 'Correo electronico', 'required');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['usuario'] = $this->usuarios_model->getDataWithId($id);
            $data['usuario']['id'] = $id;
            $this->load->view("layout/header", array("title" => "Mi perfil"));
            $this->load->view("layout/navbar");
            $this->load->view("modificar_usuario", $data);
        }
        else
        {
            $data = array(
                "id" => $id,
                "nombre" => $this->input->post('nombre'),
                "apellidos" => $this->input->post('apellidos'),
                "email" => $this->input->post('email'),
                "nombreUsuario" => $this->input->post('nombreUsuario')
            );

            if($this->input->post('contrasena') != null)
                $data["contrasena"] = $this->input->post('contrasena');
            if($this->input->post('esAdministrador') != null)
                $data["esAdministrador"] = $this->input->post('esAdministrador');

            $this->load->view("layout/header", array("title" => "Modificar Usuario"));
            $this->load->view("layout/navbar");
            if($this->usuarios_model->actualizarUsuario($data))
                $this->session->set_flashdata('success', true);
            else
                $this->session->set_flashdata('error', true);

            redirect(site_url('perfil/usuarios'));
        }
    }


    function perfil(){

    }
}
?>