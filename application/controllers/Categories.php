<?php

class Categories extends CI_Controller
{
    public function index()
    {
        $data["categories"] = $this->modHome->getAllCategories();
        $data["products"] = $this->modHome->getAllProducts(2);
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('home/mainHome',$data);
        // $this->load->view('home/main',$data);
        $this->load->view('header/footer');
    }

    public function myCategory($id)
    {
        if(!empty($id) ){
            $data["speItem"] = $this->modHome->checkCategory($id);
            $data["Item"] = $this->modHome->checkModel($id);
            if(count($data["speItem"]) == 1){
                $this->load->view('header/header');
                $this->load->view('header/css');
                $this->load->view('header/navbar');
                $this->load->view('category/mainHome',$data);
                $this->load->view('header/footer');
            }else{
                nw();
            }
        }else{
            nw();
        }
    }
}
