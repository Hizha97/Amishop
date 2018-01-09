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
        $data['articulos'] = $this->articulos_model->getArticulos()->result_array();

        $this->load->view("layout/header", array("title" => "Amishop"));
        $this->load->view("layout/navbar");
        $this->load->view("articulos_view", $data);
        $this->load->view("layout/footer");

    }

    public function articulo($id)
    {
        $data = $this->loadArticulos_model($id);

        $this->load->view("layout/header", array("title" => $data['articulos'][0]['nombre']));
        $this->load->view("layout/navbar");
        $this->load->view("articulo_view", $data);
        $this->ratings($id);
        $this->comentarios($id);
        $this->load->view("layout/footer");
    }

    public function ratings($id)
    {
        $this->load->helper("form");

        $data = $this->loadArticulos_model($id);
        $articulos = $data['articulos'];
        $articulo = $articulos[0];

        $this->load->model("ratings_model");
        $data['valoraciones'] = $this->ratings_model->getRatings($articulo['id'])->result();

        $this->load->view("ratings_view", $data);
    }

    public function nuevaValoracion($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $this->load->model("ratings_model");
        $data = array("idArticulo" => $id,
                        "valoracion" => $this->input->post('valoracion'),
                        "idUsuario" => $_SESSION['id']);
        $this->load->view("layout/header", array("title" => "Nueva Valoracion"));
        $this->load->view("layout/navbar");
        if($this->ratings_model->addRatings($data))
            $this->load->view("rating_exito");
        else
            $this->load->view("rating_fallo");
        $this->load->view("layout/footer");

    }

    public function comentarios($id)
    {
        $data = $this->loadArticulos_model($id);
        $articulos = $data['articulos'];
        $articulo = $articulos[0];

        $this->load->model("comentarios_model");
        $data['comentarios'] = $this->comentarios_model->getComentarios($articulo['id'])->result_array();

        $this->load->model("usuarios_model");
        foreach ($data['comentarios'] as $item)
        {
            $arrayUsuarios[$item['idUsuario']] = $this->usuarios_model->getDataWithId($item['idUsuario']);
        }
        if(isset($arrayUsuarios))
            $data['usuarios'] = $arrayUsuarios;
        $data = $this->security->xss_clean($data);
        $this->load->view("comentarios_view", $data);

    }

    public function nuevoComentario($id)
    {
        if (!isset($_SESSION['isLoggedIn']))
            redirect(site_url('usuarios/login'));

        $idArticulo['id'] = $id;
        $this->load->helper("form");
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('comentario', 'Comentario', 'required|min_length[10]');

        $this->load->view("layout/header", array("title" => "Nuevo Comentario"));
        $this->load->view("layout/navbar");

        if ($this->form_validation->run() == FALSE)
            $this->load->view('nuevo_comentario_view', $idArticulo);
        else
        {
            $this->load->model("comentarios_model");
            date_default_timezone_set("Europe/Madrid");
            $data  =  array("idArticulo" => $id,
                            "idUsuario" => $_SESSION['id'],
                            "comentario" => $this->input->post('comentario'),
                            "titulo" => $this->input->post('titulo'),
                            "fecha" => date("Y/m/d"));
            if($this->comentarios_model->addComentario($data))
                $this->load->view("comentario_exito");
            else
                $this->load->view("comentario_fallo");
        }
        $this->load->view("layout/footer");

    }

    public function eliminar($id)
    {
        if(!isset($_SESSION['isLoggedIn']) and $_SESSION['esAdministrador'])
            redirect(site_url('usuarios/login'));

        $this->load->model('articulos_model');
        $this->articulos_model->eliminarArticulo($id);
        redirect(site_url('perfil/articulos'));
    }

    public function actualizar($id)
    {
        if(!isset($_SESSION['isLoggedIn']) and $_SESSION['esAdministrador'])
            redirect(site_url('usuarios/login'));

        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model("articulos_model");

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('precio', 'precio', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['articulos'] = $this->articulos_model->getArticuloWithId($id)->result_array();
            $this->load->view("layout/header", array("title" => "Modificar Articulo"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_modificar_articulo", $data);
        }
        else
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

                // Hay que hacer writable el directorio para que funcione.
            if(!$this->upload->do_upload('userfile'))
            {
                echo $this->upload->display_errors();
            }

            $data = array("id" => $id,
                            "nombre" => $this->input->post('nombre'),
                            "descripcion" => $this->input->post('descripcion'),
                            "precio" => $this->input->post('precio'),
                            "stock" => $this->input->post('stock'));
            if(strlen($this->upload->data('file_name'))>0)
                $data["imagen"] = $this->upload->data('file_name');


            $this->articulos_model->modificarArticulo($data);

            redirect(site_url('perfil/articulos'));
        }

        $this->load->view("layout/footer");
    }

    public function nuevoArticulo()
    {
        if(!isset($_SESSION['isLoggedIn']) and $_SESSION['esAdministrador'])
            redirect(site_url('usuarios/login'));

        $this->load->library('form_validation');
        $this->load->helper("form");

        $this->load->model("articulos_model");

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('precio', 'precio', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("layout/header", array("title" => "Nuevo Articulo"));
            $this->load->view("layout/navbar");
            $this->load->view("perfil_nuevo_articulo");
        }
        else
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // Hay que hacer writable el directorio para que funcione.
            if(!$this->upload->do_upload('userfile'))
            {
                echo $this->upload->display_errors();
            }

            $data = array("id" => $id,
                "nombre" => $this->input->post('nombre'),
                "descripcion" => $this->input->post('descripcion'),
                "precio" => $this->input->post('precio'),
                "stock" => $this->input->post('stock'),
                "imagen" => $this->upload->data('file_name'));


            $this->articulos_model->nuevoArticulo($data);

            redirect(site_url('perfil/articulos'));
        }
        $this->load->view("layout/footer");
    }

    private function loadArticulos_model($id)
    {
        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticuloWithId($id)->result_array();

        return $data;
    }


}