<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 29/12/17
 * Time: 19:10
 */

class Newsletter_model extends CI_Model
{
    public function nuevaSubscipcion($data)
    {
        $email= $data["email"];
        $query = $this->db->get_where('newsletter',array("email" => $email));
        $row = $query->row();
        if(isset($row))
            return false;
        else
            return $this->db->insert('newsletter', $data);
    }
}