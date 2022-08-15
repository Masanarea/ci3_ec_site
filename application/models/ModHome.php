<?php

class ModHome extends CI_Model
{
    public function getAllCategories()
    {
        return $this->db->get_where("categories", array("cStatus" => 1));
        // return $this->db->get_where("categories", array("cStatus" => 1))->result_array();
    }

    public function getAllProducts($limit)
    {
        $this->db->limit($limit);
        return $this->db->get_where("products", array("pStatus" => 1));
    }
    public function checkCategory($id)
    {
        return $this->db->select("categories.*")
        ->from("categories")
        ->where(array("cStatus" => 1, "cId" => $id))
        // このように一致するものがある場合、そのテーブルデータを利用することができる。
        // 今回の場合は<php echo $speItem[0]["mName"] >
        // ->join("categories","categories.cId = models.productId")
        ->get()
        // return $this->db->get_where("categories", array("cStatus" => 1, "cId" => $id))
        ->result_array();
    }
    public function checkModel($id)
    {
        return $this->db->select("models.*")
        ->from("models")
        ->where(array("mStatus" => 1, "mId" => $id))
        // このように一致するものがある場合、そのテーブルデータを利用することができる。
        // 今回の場合は<php echo $speItem[0]["mName"] >
        ->join("models","products.pId = models.productId")
        ->get()
        // return $this->db->get_where("categories", array("cStatus" => 1, "cId" => $id))
        ->result_array();
    }
}
