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
        $data['usuarios'] = $this->comentarios_model->getComentarios($articulo->id)->result();


        $this->load->view("comentarios_view");
    }

    public function nuevoComentario()
    {
        echo "holi";
    }

    private function loadArticulos_model($amigurumi)
    {
        $this->load->model("articulos_model");
        $data['articulos'] = $this->articulos_model->getArticulo($amigurumi)->result();

        return $data;
    }
}