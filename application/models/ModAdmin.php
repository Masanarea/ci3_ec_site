<?php

class ModAdmin extends CI_Model
{
    public function checkAdmin($data)
    {
        return $this->db->get_where("admin", $data)->result_array();
    }

    public function checkCategory($data)
    {
        return $this->db->get_where("categories", array("cName"=>$data["cName"]));
    }
    public function addCategory($data)
    {
        return $this->db->insert("categories", $data);
    }

    public function getAllCategories()
    {
        return $this->db->get_where("categories", array("cStatus" =>1))->num_rows();
    }

    public function fetchAllCategories($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get_where("categories", array("cStatus" =>1));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
}
