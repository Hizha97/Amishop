<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 29/12/17
 * Time: 19:08
 */

class Newsletter extends CI_Controller
{
    public function index()
    {
        $this->load->view("layout/header", array("title" => "Amishop"));
        $this->load->view("layout/navbar");
        $this->load->view("newsletter_view");
        $this->load->view("layout/footer");
    }
}