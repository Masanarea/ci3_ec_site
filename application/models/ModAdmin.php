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

    public function checkCategoryById($cId)
    {
        return $this->db->get_where("categories", array("cId" =>$cId))->result_array();
    }

    public function updateCategory($data, $cId)
    {
        $this->db->where("cId", $cId);
        return $this->db->update("categories",$data);
    }

    public function deleteCategory($cId)
    {
        $this->db->where("cId", $cId);
        return $this->db->delete("categories");
    }

    public function getCategoryImage($cId)
    {
        return $this->db->select("cDp")->from("categories")->where("cId",$cId)->get()->result_array();
    }

    public function getCategories()
    {
        return $this->db->get_where("categories", array("cStatus" =>1));
    }

    public function checkProduct($data)
    {
        return $this->db->get_where("products", array(
            "pName"=>$data["pName"],
            "categoryId"=>$data["categoryId"],
        ));
    }

    public function addProduct($data)
    {
        return $this->db->insert("products", $data);
    }
}
