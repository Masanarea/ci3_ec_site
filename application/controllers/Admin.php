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
            setFlashData("alert-danger", "Please login first to access your admin panel", "admin/login");
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
                } else {
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
        if (adminLoggedIn()) {
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newCategory');
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function adddCategory()
    {
        if (adminLoggedIn()) {
            $data["cName"] = $this->input->post("categoryName", true);
            if (!empty($data["cName"])) {
                $path = realpath(APPPATH."../assets/images/categories/");
                $config["upload_path"] = $path;
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                $this->load->library("upload", $config);
                if (!$this->upload->do_upload("catDp")) {
                    $error = $this->upload->display_errors();
                    setFlashData("alert-danger", $error, "admin/newCategory");
                } else {
                    $fileName = $this->upload->data();
                    $data["cDp"] = $fileName["file_name"];
                    $data["cDate"] = date("Y-m-d H-i-s");
                    $data["adminId"] = getAdminId();
                }
                $addData = $this->modAdmin->checkCategory($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The category already exist.", "admin/newCategory");
                } else {
                    $addData = $this->modAdmin->addCategory($data);
                    if ($addData) {
                        setFlashData("alert-success", "You have successfully added your category", "admin/newCategory");
                    } else {
                        setFlashData("alert-danger", "You can\'t add your category right now", "admin/newCategory");
                    }
                }
            } else {
                setFlashData("alert-danger", "category name is required.", "admin/newCategory");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function allCategories()
    {
        if (adminLoggedIn()) {
            $config["base_url"] = site_url("admin/allCategories");
            $totalRows = $this->modAdmin->getAllCategories();
            $config["total_rows"] = $totalRows;
            $config["per_page"] = 2;
            $config["uri_segment"] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["allCategories"] = $this->modAdmin->fetchAllCategories($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/allCategories', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function editCategory($cId)
    {
        if (adminLoggedIn()) {
            if (!empty($cId) && isset($cId)) {
                $data["category"] =  $this->modAdmin->checkCategoryById($cId);
                if (count($data["category"]) == 1) {
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editCategory', $data);
                    $this->load->view('admin/header/footer');
                    $this->load->view('admin/header/htmlclose');
                } else {
                    setFlashData("alert-danger", "Category not found", "admin/allCategories");
                }
            } else {
                setFlashData("alert-danger", "Something went wrong", "admin/allCategories");
            }
        } else {
            setFlashData("alert-danger", "Please login first to edit your category", "admin/login");
        }
    }
    public function updateCategory()
    {
        if (adminLoggedIn()) {
            $data["cName"] = $this->input->post("categoryName", true);
            $cId = $this->input->post("xid", true);
            $oldImage = $this->input->post("oldImage", true);
            if (!empty($data["cName"]) && isset($data["cName"])) {
                if (isset($_FILES["catDp"]) && is_uploaded_file($_FILES["catDp"]["tmp_name"])) {
                    $path = realpath(APPPATH."../assets/images/categories/");
                    $config["upload_path"] = $path;
                    $config["allowed_types"] = "gif|png|jpg|jpeg";
                    $this->load->library("upload", $config);
                    if (!$this->upload->do_upload("catDp")) {
                        $error = $this->upload->display_errors();
                        setFlashData("alert-danger", $error, "admin/allCategories");
                    } else {
                        $fileName = $this->upload->data();
                        $data["cDp"] = $fileName["file_name"];
                    }
                }
                $reply = $this->modAdmin->updateCategory($data, $cId);
                if ($reply) {
                    if (!empty($data["cDp"]) && isset($data["cDp"])) {
                        if (file_exists($path."/".$oldImage)) {
                            unlink($path."/".$oldImage);
                        }
                    }
                    setFlashData("alert-success", "You have successfully update your category", "admin/allCategories");
                } else {
                    setFlashData("alert-danger", "You can\'t update your category", "admin/allCategories");
                }
            } else {
                setFlashData("alert-danger", "Category name is required", "admin/allCategories");
            }
        } else {
            setFlashData("alert-danger", "updateCategory Please login first to add your category", "admin/login");
        }
    }

    public function deleteCategory(){
        if (adminLoggedIn()) {
            if($this->input->is_ajax_request()){
                $this->input->post("id", true);
                $cId = $this->input->post("text", true);
                if(!empty($cId) && isset($cId)){
                    $cId = $this->encryption->decrypt($cId);
                    $oldImage = $this->modAdmin->getCategoryImage($cId);
                    // 開発用
                    // var_dump($oldImage);
                    // die();
                    if(!empty($oldImage) && count($oldImage) == 1){
                        $realImage = $oldImage[0]["cDp"];
                    }
                    $checkMd = $this->modAdmin->deleteCategory($cId);
                    if($checkMd){
                        $path = realpath(APPPATH."../assets/images/categories/");
                        if (!empty($realImage) && isset($realImage)) {
                            if (file_exists($path."/".$realImage)) {
                                unlink($path."/".$realImage);
                            }
                        }
                        $data["return"] = true;
                        $data["message"] = "successfully deleted";
                        echo json_encode($data);
                    }else{
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your category";
                        echo json_encode($data);
                    }
                }else{
                    $data["return"] = true;
                        $data["message"] = "value not found";
                        echo json_encode($data);
                }
            }else{
                setFlashData("alert-danger", "Something went wrong ", "admin");
            }
        } else {
            setFlashData("alert-danger", "Please login first ", "admin/login");
        }
    }

    public function newProduct()
    {
        if (adminLoggedIn()) {
            $data["categories"] = $this->modAdmin->getCategories();
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newProduct', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function addProduct(){
        if (adminLoggedIn()) {
            $data["pName"] = $this->input->post("productName", true);
            $data["pCompany"] = $this->input->post("company", true);
            $data["categoryId"] = $this->input->post("categoryId", true);
            if (!empty($data["pName"]) && !empty($data["pCompany"]) && !empty($data["categoryId"])) {
                $path = realpath(APPPATH."../assets/images/products/");
                $config["upload_path"] = $path;
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                $this->load->library("upload", $config);
                if (!$this->upload->do_upload("prodDp")) {
                    $error = $this->upload->display_errors();
                    setFlashData("alert-danger", $error, "admin/newProduct");
                } else {
                    $fileName = $this->upload->data();
                    $data["pDp"] = $fileName["file_name"];
                    $data["pDate"] = date("Y-m-d H-i-s");
                    $data["adminId"] = getAdminId();
                }
                $addData = $this->modAdmin->checkProduct($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Product already exist.", "admin/newProduct");
                } else {
                    // 開発用
                    // ここが原因
                    $addData = $this->modAdmin->addProduct($data);
                    if ($addData) {
                        setFlashData("alert-success", "You have successfully added your Product", "admin/newProduct");
                    } else {
                        setFlashData("alert-danger", "You can\'t add your product right now", "admin/newProduct");
                    }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/newProduct");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function allProducts()
    {
        if (adminLoggedIn()) {
            $config["base_url"] = site_url("admin/allProducts");
            $totalRows = $this->modAdmin->getAllProducts();
            $config["total_rows"] = $totalRows;
            $config["per_page"] = 2;
            $config["uri_segment"] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["allProducts"] = $this->modAdmin->fetchAllProducts($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/allProducts', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function editProduct($pId)
    {
        if (adminLoggedIn()) {
            if (!empty($pId) && isset($pId)) {
                $data["product"] =  $this->modAdmin->checkProductById($pId);
                if (count($data["product"]) == 1) {
                    // 開発用
                    // echo "working..";
                    // newCategoryから持ってきた
                    $data["categories"] = $this->modAdmin->getCategories();
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editProduct', $data);
                    $this->load->view('admin/header/footer');
                    $this->load->view('admin/header/htmlclose');
                } else {
                    setFlashData("alert-danger", "Product not found", "admin/allProducts");
                }
            } else {
                setFlashData("alert-danger", "Something went wrong", "admin/allProducts");
            }
        } else {
            setFlashData("alert-danger", "Please login first to edit your category", "admin/login");
        }
    }

    public function updateProduct(){
        if (adminLoggedIn()) {
            $data["pName"] = $this->input->post("productName", true);
            $data["pCompany"] = $this->input->post("company", true);
            $data["categoryId"] = $this->input->post("categoryId", true);
            $pId = $this->input->post("xid", true);
            $oldImage = $this->input->post("oldImg", true);
            // 開発用
            // var_dump($data);
            // var_dump($pId);
            // var_dump($oldImage);
            // exit;
            if (!empty($data["pName"]) && !empty($data["pCompany"]) && !empty($data["categoryId"])) {
                $addData = $this->modAdmin->checkProduct($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Product already exist.", "admin/allProducts");
                } else {
                    // 開発用
                    // ここが原因
                    $addData = $this->modAdmin->updateProduct($data,$pId);
                    if ($addData) {
                        $path = realpath(APPPATH."../assets/images/products/");
                        if (!empty($data["pDp"]) && isset($data["pDp"])) {
                            if (file_exists($path."/".$oldImage)) {
                                unlink($path."/".$oldImage);
                            }
                        }
                        setFlashData("alert-success", "You have successfully updated your Product", "admin/allProducts");
                    } else {
                        setFlashData("alert-danger", "You can\'t update your product right now", "admin/allProducts");
                    }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/allProducts");
            }
        } else {
            setFlashData("alert-danger", "Please login first to update your Product", "admin/login");
        }
    }

    public function deleteProduct(){
        if (adminLoggedIn()) {
            if($this->input->is_ajax_request()){
                $this->input->post("id", true);
                $pId = $this->input->post("text", true);
                if(!empty($pId) && isset($pId)){
                    $pId = $this->encryption->decrypt($pId);
                    $oldImage = $this->modAdmin->getProductImage($pId);
                    // 開発用
                    // var_dump($oldImage);
                    // die();
                    if(!empty($oldImage) && count($oldImage) == 1){
                        $realImage = $oldImage[0]["pDp"];
                    }
                    $checkMd = $this->modAdmin->deleteProduct($pId);
                    if($checkMd){
                        $path = realpath(APPPATH."../assets/images/products/");
                        if (!empty($realImage) && isset($realImage)) {
                            if (file_exists($path."/".$realImage)) {
                                unlink($path."/".$realImage);
                            }
                        }
                        $data["return"] = true;
                        $data["message"] = "successfully deleted";
                        echo json_encode($data);
                    }else{
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your product";
                        echo json_encode($data);
                    }
                }else{
                    $data["return"] = true;
                        $data["message"] = "value not found";
                        echo json_encode($data);
                }
            }else{
                setFlashData("alert-danger", "Something went wrong ", "admin");
            }
        } else {
            setFlashData("alert-danger", "Please login first ", "admin/login");
        }
    }
}
