<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 1/01/18
 * Time: 13:36
 */

class Usuarios_model extends CI_Model
{
    public function nuevoUsuario()
    {
        $this->load->helper('security');

        $data = array(
            "nombre" => $this->input->post('nombre'),
            "apellidos" => $this->input->post('apellidos'),
            "email" => $this->input->post('email'),
            "nombreUsuario" => $this->input->post('nombreUsuario'),
            "contrasena" => $this->input->post('contrasena'),
            "esAdministrador" => false
        );

        $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_BCRYPT, array("cost" => 12));

        return $this->db->insert('usuarios', $data);
    }
}