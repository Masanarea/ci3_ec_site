<?php

class Admin extends CI_Controller
{
    public function index()
    {
        // setFlashData();
        // die();
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
            setFlashData("alert-danger","Please login first to access your admin panel", "admin/login");
            // $this->session->set_flashdata("error", "Please login first to access your admin panel");
            // redirect("admin/login");
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
                }else{
                    echo "session was not created..";
                }
            } else {
                setFlashData("alert-warning", "Email or Password is not match. Please check your Email and Password", 'admin/login');
                // $this->session->set_flashdata("error", "Email or Password is not match. Please check your Email and Password");
                // redirect('admin/login');
            }
        } else {
            setFlashData("alert-warning", "Please check the require field", 'admin/login');
            // $this->session->set_flashdata("error", "Please check the require field");
            // redirect('admin/login');
        }
    }

    // helpers/custom_helper.phpで表示されななくなる
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

    public function newCategory()
    {
        if(adminLoggedIn()){
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newCategory');
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        }else{
            setFlashData("alert-danger","Please login first to add your category", "admin/login");
        }
    }

    public function adddCategory(){
        if(adminLoggedIn()){
            // 開発用
            // var_dump($_POST);
            // var_dump($data["cName"]);
            // exit;
            $data["cName"] = $this->input->post("categoryName", true);
            if (!empty($data["cName"])){
                $path = realpath(APPPATH."../assets/images/categories/");
                $config["upload_path"] = $path;
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                // $config["allowed_type"] = "gif|png|jpg";
                $this->load->library("upload", $config);
                if(!$this->upload->do_upload("catDp")){
                    $error = $this->upload->display_errors();
                    setFlashData("alert-danger",$error, "admin/newCategory");
                }else{
                    $fileName = $this->upload->data();
                    $data["cDp"] = $fileName["file_name"];
                    $data["cDate"] = date("Y-M-d h-i-sa");
                    $data["adminId"] = getAdminId();
                }
                $addData = $this->modAdmin->checkCategory($data);
                if($addData->num_rows() > 0){
                    setFlashData("alert-danger","The category already exist.", "admin/newCategory");
                }else{
                    $addData = $this->modAdmin->addCategory($data);
                    if($addData){
                        setFlashData("alert-success","You have successfully added your category", "admin/newCategory");
                    }else{
                        setFlashData("alert-danger","You can\'t add your category right now", "admin/newCategory");
                    }
                }
            }else{
                exit("名前 failed");
                setFlashData("alert-danger","category name is required.", "admin/newCategory");
            }
        }else{
            setFlashData("alert-danger","Please login first to add your category", "admin/login");
        }
    }

    public function allCategories(){
        if(adminLoggedIn()){
            $data["allCategories"] = $this->modAdmin->getAllCategories();
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/allCategories');
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        }else{
            setFlashData("alert-danger","Please login first to add your category", "admin/login");
        }
}
    public function getAllCategories(){
        $this->db->get_where("categories", array("cStatus" =>1));
    }
}
