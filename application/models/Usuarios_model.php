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

    public function iniciarSesion(){
        $data = array(
            "nombreUsuario" => $this->input->post('nombreUsuario'),
            "contrasena" => $this->input->post('contrasena'),
        );


        $this->db->select('contrasena')
                 ->from('usuarios')
                 ->where('nombreUsuario =', $data['nombreUsuario'])
                 ->or_where('email =', $data['nombreUsuario']);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return password_verify($data['contrasena'], $query->result()[0]->contrasena);
        else return false;
    }

    public function getNombre($username){

        $this->db->select('nombre')
            ->from('usuarios')
            ->where('nombreUsuario =', $username);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return $query->result()[0]->nombre;
        else return false;
    }
}