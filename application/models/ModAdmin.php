<?php

class ModAdmin extends CI_Model
{
    public function checkAdmin($data)
    {
        return $this->db->get_where("admin", $data)->result_array();
    }

    public function addCategory($data)
    {
        return $this->db->insert("categories",$data);
    }
}