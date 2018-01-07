<?php

class Perfil extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model("usuarios_model");

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('email', 'Correo electronico', 'required');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre de usuario', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['datos'] = $this->usuarios_model->getDataWithId($_SESSION['id']);
            $this->load->view("layout/header", array("title" => "Mi perfil"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_view", $data);
        } else {
            $data = array(
                "id" => $_SESSION['id'],
                "nombre" => $this->input->post('nombre'),
                "apellidos" => $this->input->post('apellidos'),
                "email" => $this->input->post('email'),
                "nombreUsuario" => $this->input->post('nombreUsuario')
            );

            if ($this->input->post('contrasena') != null)
                $data["contrasena"] = $this->input->post('contrasena');
            $this->load->view("layout/header", array("title" => "Mi perfil"));
            $this->load->view("layout/navbar");
            if ($this->usuarios_model->actualizarUsuario($data))
                $this->session->set_flashdata('success', true);
            else
                $this->session->set_flashdata('error', true);

            redirect(site_url('perfil'));
        }

        $this->load->view("layout/footer");

    }


    public function tarjetas()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("usuarios_model");

        $data['tarjetas'] = $this->usuarios_model->getTarjetas($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Tarjetas"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_tarjetas_view", $data);
        $this->load->view("layout/footer");
    }

    public function modificarTarjeta($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model('tarjetas_model');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('cvv', 'Codigo de seguridad', 'required');
        $this->form_validation->set_rules('fechaCaducidad', 'Fecha de caducidad', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['datos'] = $this->tarjetas_model->getTarjeta($id);
            $this->load->view("layout/header", array("title" => "Modificar tarjeta"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_modificar_tarjeta_view", $data);
            $this->load->view("layout/footer");
        } else {
            $data = array(
                "id" => $id,
                "nombre" => $this->input->post('nombre'),
                "numero" => $this->input->post('numero'),
                "cvv" => $this->input->post('cvv'),
                "fechaCaducidad" => $this->input->post('fechaCaducidad'),
                "marca" => $this->input->post('marca')
            );

            if ($this->tarjetas->actualizarTarjetas($data)) {
                $this->session->set_flashdata('success', true);
                redirect(site_url('perfil/tarjetas'));
            } else {

                $this->session->set_flashdata('error', true);
                redirect(current_url());
            }
        }
    }

    public function anadirTarjeta()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model('tarjetas_model');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('cvv', 'Codigo de seguridad', 'required');
        $this->form_validation->set_rules('fechaCaducidad', 'Fecha de caducidad', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", array("title" => "Añadir tarjeta"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_anadir_tarjeta_view");
            $this->load->view("layout/footer");
        } else {
            $data = array(
                "id" => $id,
                "nombre" => $this->input->post('nombre'),
                "numero" => $this->input->post('numero'),
                "cvv" => $this->input->post('cvv'),
                "fechaCaducidad" => $this->input->post('fechaCaducidad'),
                "marca" => $this->input->post('marca')
            );


            if ($this->tarjetas_model->nuevaTarjeta($data)) {
                $this->db->insert('usuarios_tarjetas', array("idTarjeta" => $this->db->insert_id(), "idUsuario" => $_SESSION['id']));
                $this->session->set_flashdata('success', true);
                redirect(site_url('perfil/tarjetas'));
            } else {

                $this->session->set_flashdata('error', true);
                redirect(current_url());
            }
        }
    }

    public function direcciones()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));
        $this->load->model("usuarios_model");

        $data['direcciones'] = $this->usuarios_model->getDirecciones($_SESSION['id']);

        $this->load->view("layout/header", array("title" => "Direcciones"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_direcciones_view", $data);
        $this->load->view("layout/footer");
    }

    public function modificarDireccion($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model('direcciones_model');

        $this->form_validation->set_rules('pais', 'País', 'required');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
        $this->form_validation->set_rules('codigoPostal', 'Codigo Postal', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('calle', 'Calle', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['datos'] = $this->direcciones_model->getDireccion($id);
            $this->load->view("layout/header", array("title" => "Modificar direccion"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_modificar_direccion_view", $data);
            $this->load->view("layout/footer");
        } else {
            $data = array(
                "id" => $id,
                "pais" => $this->input->post('pais'),
                "provincia" => $this->input->post('provincia'),
                "ciudad" => $this->input->post('ciudad'),
                "codigoPostal" => $this->input->post('codigoPostal'),
                "numero" => $this->input->post('numero'),
                "calle" => $this->input->post('calle'),
                "escalera" => $this->input->post('escalera')
            );

            if ($this->direcciones_model->actualizarDireccion($data)) {
                $this->session->set_flashdata('success', true);
                redirect(site_url('perfil/direcciones'));
            } else {

                $this->session->set_flashdata('error', true);
                redirect(current_url());
            }
        }
    }

    public function anadirDireccion()
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model('direcciones_model');

        $this->form_validation->set_rules('pais', 'País', 'required');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
        $this->form_validation->set_rules('codigoPostal', 'Codigo Postal', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('calle', 'Calle', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", array("title" => "Añadir direccion"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_anadir_direccion_view");
            $this->load->view("layout/footer");
        } else {
            $data = array(
                "pais" => $this->input->post('pais'),
                "provincia" => $this->input->post('provincia'),
                "ciudad" => $this->input->post('ciudad'),
                "codigoPostal" => $this->input->post('codigoPostal'),
                "numero" => $this->input->post('numero'),
                "calle" => $this->input->post('calle'),
                "escalera" => $this->input->post('escalera')
            );


            if ($this->direcciones_model->nuevaDireccion($data)) {
                $this->db->insert('usuarios_direcciones', array("idDireccion" => $this->db->insert_id(), "idUsuario" => $_SESSION['id']));
                $this->session->set_flashdata('success', true);
                redirect(site_url('perfil/direcciones'));
            } else {

                $this->session->set_flashdata('error', true);
                redirect(current_url());
            }
        }
    }

    public function articulos()
    {
        if(!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticulos()->result_array();

        $this->load->view("layout/header", array("title" => "Articulos"));
        $this->load->view("layout/navbar");
        $this->load->view("perfil_articulos_view",$data);
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