<?php

class Signup extends CI_Controller
{
    public function index()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navbar');
        $this->load->view('home/signup');
        $this->load->view('header/footer');
    }

    public function newUser()
    {
        $this->form_validation->set_rules('fname', "Name", "required");
        $this->form_validation->set_rules('lname', "Name", "required");
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");
        if($this->form_validation->run() == false){
            echo "Missing something";
        }else{
            $data["first_name"] = $this->input->post("fname", true);
            $data["last_name"] = $this->input->post("lname", true);
            $data["email"] = $this->input->post("email", true);
            $data["password"] = $this->input->post("password", true);
            $data["password"] = hash("md5", $data["password"]);
            $data["date"] = date("Y-m-d H:i:s");
            $data["link"] = random_string("alnum", 20);
            $myUser = $this->modUser->checkUser($data);
            if(count($myUser) == 1){
                setFlashData("alert-danger", "User already exist", "/signup");
            }else{
                $addUser = $this->modUser->addUser($data);
                if($addUser){
                    $this->sendEmailUser($data);
                    setFlashData("alert-danger", "仮登録成功", "/signup");
                }else{
                    setFlashData("alert-danger", "仮登録に失敗しました", "/signup");
                }
            }
        }
    }

    private function sendEmailUser($data){
        $userLink = site_url("signup/activateAccount/".$data["link"]);
        $myData = "<p>".$data["first_name"].",Please click on the link to activate your <a href=".$userLink."></a></p>";
        // $this->load->library('email');
        $this->email->from('test@example.com', 'Your Name');
        $this->email->to('masa.php.engineer@gmail.com');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');
        $this->email->subject('Account Activation');
        $this->email->message($myData);
        $this->email->set_mailtype("html");
        if($this->email->send()){
            w();
            return true;
        }else{
            nw();
            return false;
        }
    }

    public function activateAccount($link)
    {
        if(!empty($link) && isset($link)){
            $user = $this->modUser->checkLink($link);
            d($user);
            if(count($user) == 1){
                w();w();
                // 問題ないリンクの最後にokの文字を追加
                $userData["link"] = $user[0]["link"]."ok";
                $userData["status"] = 1;
                $updateUser = $this->modUser->activateUser($user[0]["uId"],$userData);
                if ($updateUser){
                    echo "You have successfully activated the account";
                }else{
                    echo "You cant\'t activated your account. Please try again";
                }
            }else{
                echo "not available the link or expire";
            }
        }else{
            echo "check your email and try again";
        }
    }
}
