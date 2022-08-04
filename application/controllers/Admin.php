<?php

class Admin extends CI_Controller
{
    public function index()
    {
        // echo "working..";
        // loadで簡単テンプレート
        $this->load->view('admin/header/header');
        // 何もないのにloadするとエラーになる
        $this->load->view('admin/header/css');
        $this->load->view('admin/header/navtop');
        $this->load->view('admin/header/navleft');
        $this->load->view('admin/home/index');
        $this->load->view('admin/header/footer');
        $this->load->view('admin/header/htmlclose');
    }
}
