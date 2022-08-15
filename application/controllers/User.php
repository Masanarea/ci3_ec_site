<?php

class User extends CI_Controller
{
    public function index(){
        // if (userLoggedIn()) {
            $this->load->view('header/header');
            $this->load->view('header/css');
            $this->load->view('header/navbar');
            $this->load->view('home/mainHome');
            $this->load->view('header/footer');
        // } else {
        //     setFlashData("alert-danger", "Please login first to access ", "/signup");
        // }
    }

    public function logOut(){
        // sessionではないことに注意
        // この下がうまくいかないとreturn falseみたいにこの後の処理がうまくいかなくなる！
        $this->session->sess_destroy();
        setFlashData("alert-danger", "You are successfully logged out ", "signup");
    }
}
