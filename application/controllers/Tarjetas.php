<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 6/01/18
 * Time: 3:33
 */

class Tarjetas extends CI_Controller
{
    public function eliminar($id)
    {
        $this->db->delete('tarjetas', array('id' => $id));
        redirect(site_url('perfil/tarjetas'));
    }
}