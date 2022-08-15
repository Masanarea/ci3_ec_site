<?php

class Home extends CI_Controller
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

    // このような構造にすると大規模開発でも応用が効く
    public function aboutus()
    {
        $this->load->view('header/header');
        // 何もないのにloadするとエラーになる
        $this->load->view('css/extracss');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('about/mainHome');
        $this->load->view('header/footer');
        $this->load->view('js/extrajs');
        $this->load->view('header/htmlclose');
    }

    public function login()
    {
        $this->load->view('header/header');
        // 何もないのにloadするとエラーになる
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('login/index');
        $this->load->view('header/footer');
    }
}
