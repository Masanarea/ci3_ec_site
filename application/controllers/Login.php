<?php

class Login extends CI_Controller
{
    public function index()
    {
        if (!userLoggedIn()) {
            $this->load->view('header/header');
            $this->load->view('header/css');
            $this->load->view('header/navbar');
            $this->load->view('home/login');
            $this->load->view('header/footer');
        } else {
            setFlashData("alert-danger", "Already logged in ", "/user");
        }
    }

    public function checkUser()
    {
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");
        if ($this->form_validation->run() == false) {
            echo "Missing something";
        } else {
            $data["email"] = $this->input->post("email", true);
            $data["password"] = $this->input->post("password", true);
            $data["password"] = hash("md5", $data["password"]);
            $user = $this->modUser->checkUser($data);
            if (count($user) == 1) {
                switch ($user[0]["status"]) {
                    case 0:
                        echo "Please activate your account before login";
                        break;
                    case 1:
                        if ($user[0]["password"] == $data["password"]) {
                            $myActualUser = array(
                                "uId"  =>$user[0]["uId"],
                                "first_name"  =>$user[0]["first_name"],
                                "last_name"  =>$user[0]["last_name"],
                                "email"  =>$user[0]["email"],
                                "date"  =>$user[0]["date"],
                            );
                            $this->session->set_userdata($myActualUser);
                            if ($this->session->userdata("uId")) {
                                redirect("user");
                            } else {
                                echo "session is not OK";
                            }
                        } else {
                            nw();
                        }
                        break;
                    case 2:
                        echo "the admin blocked you";
                        break;
                }
            } else {
                echo "check the email and password. Please try again";
            }
        }
    }
}
