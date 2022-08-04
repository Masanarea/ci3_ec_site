<?php

class Admin extends CI_Controller
{
    public function index()
    {
        setFlashData();
        die();
        if ($this->session->userdata("aId")) {
            // loadで簡単テンプレート
            // 何もないのにloadするとエラーになる
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/index');
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            $this->session->set_flashdata("error", "Please login first to access your admin panel");
            redirect("admin/login");
        }
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function checkAdmin()
    {
        $data["aEmail"] = $this->input->post("email", true);
        $data["aPassword"] = $this->input->post("password", true);

        if (!empty($data["aEmail"])  &&  !empty($data["aPassword"])) {
            $admindata = $this->modAdmin->checkAdmin($data);
            if (count($admindata) == 1) {
                var_dump($admindata);
                $forSession = array(
                    "aId"=>$admindata[0]["aId"],
                    "aName"=>$admindata[0]["aName"],
                    "aEmail"=>$admindata[0]["aEmail"],
                    "aPassword"=>$admindata[0]["aPassword"],
                );
                $this->session->set_userdata($forSession);
                if ($this->session->userdata("aId")) {
                    // echo "Logged in";
                    redirect("admin");
                }
            } else {
                $this->session->set_flashdata("error", "Email or Password is not match. Please check your Email and Password");
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata("error", "Please check the require field");
            redirect('admin/login');
        }
    }

    public function logOut()
    {
        if ($this->session->userdata("aId")) {
            $this->session->set_userdata("aId", "");
            $this->session->set_flashdata("error", "You have successfully logged out");
            redirect("admin/login");
        } else {
            $this->session->set_flashdata("error", "Please login now.");
            redirect("admin/login");
        }
    }
}
