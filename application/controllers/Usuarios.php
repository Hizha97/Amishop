<?php

class Usuarios extends CI_Controller
{
	function index()
	{
		$this->load->view("layout/header", array("title" => "Mi pagina"));
        $this->load->view("layout/navbar");
        $this->load->view("layout/footer");
    }
}
?>