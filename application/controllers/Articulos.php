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

    public function articulo($amigurumi)
    {
        $data = $this->loadArticulos_model($amigurumi);

        $this->load->view("layout/header", array("title" => $amigurumi));
        $this->load->view("layout/navbar");
        $this->load->view("articulo_view", $data);
        $this->ratings($amigurumi);
        $this->comentarios($amigurumi);
        $this->load->view("layout/footer");
    }

    public function ratings($amigurumi)
    {
        $data = $this->loadArticulos_model($amigurumi);

        $articulos = $data['articulos'];
        $articulo = $articulos[0];
        $this->load->view("ratings_view", $articulo);
    }

    public function comentarios($amigurumi)
    {
        $data = $this->loadArticulos_model($amigurumi);

        $articulos = $data['articulos'];
        $articulo = $articulos[0];

        $this->load->model("comentarios_model");
        $data['comentarios'] = $this->comentarios_model->getComentarios($articulo->id)->result();

        $this->load->model("usuarios_model");
        foreach ($data['comentarios'] as $item)
        {
            $arrayUsuarios[$item->idUsuario] = $this->usuarios_model->getDataWithId($item->idUsuario);
        }

        $data['usuarios'] = $arrayUsuarios;
        $this->load->view("comentarios_view", $data);

    }

    public function nuevoComentario($idArticulo = 2)
    {
        $this->load->helper("form");
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('comentario', 'Comentario', 'required|min_length[10]');

        $this->load->view("layout/header", array("title" => "Nuevo Comentario"));
        $this->load->view("layout/navbar");

        if ($this->form_validation->run() == FALSE)
            $this->load->view('nuevo_comentario_view');
        else
        {
            $this->load->model("comentarios_model");
            date_default_timezone_set("Europe/Madrid");
            $data  =  array("idArticulo" => $idArticulo,
                            "idUsuario" => $_SESSION['id'],
                            "comentario" => $this->input->post('comentario'),
                            "titulo" => $this->input->post('titulo'),
                            "fecha" => date("Y/m/d"));
            $this->comentarios_model->addComentario($data);
        }
        $this->load->view("layout/footer");

    }

    private function loadArticulos_model($amigurumi)
    {
        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticulo($amigurumi)->result();

        return $data;
    }
}