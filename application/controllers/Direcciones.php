<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 6/01/18
 * Time: 3:29
 */

class Direcciones extends CI_Controller
{

    public function eliminar($id)
    {
        $this->db->delete('direcciones', array('id' => $id));
        redirect(site_url('perfil/direcciones'));
    }
}