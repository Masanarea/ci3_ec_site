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
    

    public function deleteCategory()
    {
        if (adminLoggedIn()) {
            if ($this->input->is_ajax_request()) {
                $this->input->post("id", true);
                $cId = $this->input->post("text", true);
                if (!empty($cId) && isset($cId)) {
                    $cId = $this->encryption->decrypt($cId);
                    $oldImage = $this->modAdmin->getCategoryImage($cId);
                    // 開発用
                    // var_dump($oldImage);
                    // die();
                    if (!empty($oldImage) && count($oldImage) == 1) {
                        $realImage = $oldImage[0]["cDp"];
                    }
                    $checkMd = $this->modAdmin->deleteCategory($cId);
                    if ($checkMd) {
                        $path = realpath(APPPATH."../assets/images/categories/");
                        if (!empty($realImage) && isset($realImage)) {
                            if (file_exists($path."/".$realImage)) {
                                unlink($path."/".$realImage);
                            }
                        }
                        $data["return"] = true;
                        $data["message"] = "successfully deleted";
                        echo json_encode($data);
                    } else {
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your category";
                        echo json_encode($data);
                    }
                } else {
                    $data["return"] = true;
                    $data["message"] = "value not found";
                    echo json_encode($data);
                }
            } else {
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

    public function addProduct()
    {
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

    public function updateProduct()
    {
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
                // if (isset($_FILES["catDp"]) && is_uploaded_file($_FILES["catDp"]["tmp_name"])) {
                $addData = $this->modAdmin->checkProduct($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Product already exist.", "admin/allProducts");
                } else {
                    // 開発用
                    // ここが原因
                    $addData = $this->modAdmin->updateProduct($data, $pId);
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

    public function deleteProduct()
    {
        if (adminLoggedIn()) {
            if ($this->input->is_ajax_request()) {
                $this->input->post("id", true);
                $pId = $this->input->post("text", true);
                if (!empty($pId) && isset($pId)) {
                    $pId = $this->encryption->decrypt($pId);
                    $oldImage = $this->modAdmin->getProductImage($pId);
                    // 開発用
                    // var_dump($oldImage);
                    // die();
                    if (!empty($oldImage) && count($oldImage) == 1) {
                        $realImage = $oldImage[0]["pDp"];
                    }
                    $checkMd = $this->modAdmin->deleteProduct($pId);
                    if ($checkMd) {
                        $path = realpath(APPPATH."../assets/images/products/");
                        if (!empty($realImage) && isset($realImage)) {
                            if (file_exists($path."/".$realImage)) {
                                unlink($path."/".$realImage);
                            }
                        }
                        $data["return"] = true;
                        $data["message"] = "successfully deleted";
                        echo json_encode($data);
                    } else {
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your product";
                        echo json_encode($data);
                    }
                } else {
                    $data["return"] = true;
                    $data["message"] = "value not found";
                    echo json_encode($data);
                }
            } else {
                setFlashData("alert-danger", "Something went wrong ", "admin");
            }
        } else {
            setFlashData("alert-danger", "Please login first ", "admin/login");
        }
    }

    public function newModel()
    {
        if (adminLoggedIn()) {
            $data["products"] = $this->modAdmin->getProducts();
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newModel2', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function addModel()
    {
        if (adminLoggedIn()) {
            $data["mName"] = $this->input->post("modelName", true);
            $data["mDescription"] = $this->input->post("md", true);
            $data["productId"] = $this->input->post("productId", true);
            if (!empty($data["mName"]) && !empty($data["mDescription"]) && !empty($data["productId"])) {
                $path = realpath(APPPATH."../assets/images/models/");
                $config["upload_path"] = $path;
                $config["allowed_types"] = "gif|png|jpg|jpeg";
                $this->load->library("upload", $config);
                if (!$this->upload->do_upload("modelDp")) {
                    $error = $this->upload->display_errors();
                    setFlashData("alert-danger", $error, "admin/newModel");
                } else {
                    $fileName = $this->upload->data();
                    $data["mDp"] = $fileName["file_name"];
                    $data["mDate"] = date("Y-m-d H-i-s");
                    $data["adminId"] = getAdminId();
                }
                $addData = $this->modAdmin->checkModel($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Model already exist.", "admin/newModel");
                } else {
                    // 開発用
                    // ここが原因
                    $addData = $this->modAdmin->addModel($data);
                    if ($addData) {
                        setFlashData("alert-success", "You have successfully added your Model", "admin/newModel");
                    } else {
                        setFlashData("alert-danger", "You can\'t add your Model right now", "admin/newModel");
                    }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/newModel");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function allModels()
    {
        if (adminLoggedIn()) {
            $config["base_url"] = site_url("admin/allModels");
            $totalRows = $this->modAdmin->getAllModels();
            $config["total_rows"] = $totalRows;
            $config["per_page"] = 2;
            $config["uri_segment"] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["allModels"] = $this->modAdmin->fetchAllModels($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/allModels', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function deleteModel()
    {
        if (adminLoggedIn()) {
            if ($this->input->is_ajax_request()) {
                $this->input->post("id", true);
                $mId = $this->input->post("text", true);
                if (!empty($mId) && isset($mId)) {
                    $mId = $this->encryption->decrypt($mId);
                    $oldImage = $this->modAdmin->getModelImage($mId);
                    // 開発用
                    // var_dump($oldImage);
                    // die();
                    if (!empty($oldImage) && count($oldImage) == 1) {
                        $realImage = $oldImage[0]["pDp"];
                    }
                    $checkMd = $this->modAdmin->deleteProduct($mId);
                    if ($checkMd) {
                        $path = realpath(APPPATH."../assets/images/models/");
                        if (!empty($realImage) && isset($realImage)) {
                            if (file_exists($path."/".$realImage)) {
                                unlink($path."/".$realImage);
                            }
                            $data["return"] = true;
                            $data["message"] = "successfully deleted";
                            echo json_encode($data);
                        } else {
                            $data["return"] = false;
                            $data["message"] = "realImage not set";
                            echo json_encode($data);
                        }
                    } else {
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your product";
                        echo json_encode($data);
                    }
                } else {
                    $data["return"] = true;
                    $data["message"] = "value not found";
                    echo json_encode($data);
                }
            } else {
                setFlashData("alert-danger", "Something went wrong ", "admin");
            }
        } else {
            setFlashData("alert-danger", "Please login first ", "admin/login");
        }
    }

    public function editModel($mId)
    {
        if (adminLoggedIn()) {
            if (!empty($mId) && isset($mId)) {
                $data["model"] =  $this->modAdmin->checkModelById($mId);
                if (count($data["model"]) == 1) {
                    // ここはnewModelから持ってきた
                    $data["products"] = $this->modAdmin->getProducts();
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editModel', $data);
                    $this->load->view('admin/header/footer');
                    $this->load->view('admin/header/htmlclose');
                } else {
                    setFlashData("alert-danger", "Model not found", "admin/allModels");
                }
            } else {
                setFlashData("alert-danger", "Something went wrong", "admin/allModels");
            }
        } else {
            setFlashData("alert-danger", "Please login first to edit your category", "admin/login");
        }
    }

    public function updateModel()
    {
        // addModelより撮ってきた！
        if (adminLoggedIn()) {
            $data["mName"] = $this->input->post("modelName", true);
            $data["mDescription"] = $this->input->post("md", true);
            $data["productId"] = $this->input->post("productId", true);
            $modeId = $this->input->post("mDi", true);
            $oldImg = $this->input->post("oldImg", true);
            if (!empty($data["mName"]) && !empty($data["mDescription"]) && !empty($data["productId"])) {
                // 次を追加
                d(isset($_FILES["modelDp"]));
                d(is_uploaded_file($_FILES["modelDp"]["tmp_name"]));
                // ee();
                if (isset($_FILES["modelDp"]) && is_uploaded_file($_FILES["modelDp"]["tmp_name"])) {
                    $path = realpath(APPPATH."../assets/images/models/");
                    $config["upload_path"] = $path;
                    $config["allowed_types"] = "gif|png|jpg|jpeg";
                    $this->load->library("upload", $config);
                    if (!$this->upload->do_upload("modelDp")) {
                        $error = $this->upload->display_errors();
                        setFlashData("alert-danger", $error, "admin/allModels");
                    } else {
                        $fileName = $this->upload->data();
                        $data["mDp"] = $fileName["file_name"];
                        // d($fileName);
                        // d($data);
                        // ee();
                    }
                }
                $addData = $this->modAdmin->checkModel($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Model already exist.", "admin/allModels");
                } else {
                    // e();
                    // ここを変更
                    $addData = $this->modAdmin->updateModel($data, $modeId);
                    if ($addData) {
                        if (!empty($data["mDp"]) && isset($data["mDp"])) {
                            if (file_exists($path."/".$oldImg)) {
                                unlink($path."/".$oldImg);
                            }
                        }
                        setFlashData("alert-success", "You have successfully added your Model", "admin/allModels");
                    } else {
                        setFlashData("alert-danger", "You can\'t add your Model right now", "admin/allModels");
                    }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/allModels");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function newSpec()
    {
        if (adminLoggedIn()) {
            $data["models"] = $this->modAdmin->getModel();
            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/newSpec', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your category", "admin/login");
        }
    }

    public function addSpec()
    {
        if (adminLoggedIn()) {
            $data["spName"] = $this->input->post("sp_name", true);
            $specValues = $this->input->post("so_val", true);//array
            // 空白（false）を削除
            $specValues = array_filter($specValues);
            $data["modelId"] = $this->input->post("modelId", true);
            if (!empty($data["spName"]) && !empty($specValues) && !empty($data["modelId"])) {
                $data["spDate"] = date("Y-m-d H-i-s");
                $data["adminId"] = getAdminId();
                $addData = $this->modAdmin->checkSpec($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Model already exist.", "admin/newSpec");
                } else {
                    $specId = $this->modAdmin->checkSpecName($data);
                    if (is_numeric($specId)) {
                        $spec_values = array();
                        foreach ($specValues as $specVal) {
                            $spec_values[] = array(
                                "specId" =>$specId,
                                "adminId" => $data["adminId"],
                                "spvDate" => date("Y-m-d H-i-s"),
                                "spvName" => $specVal,
                            );
                        }
                        $specValStatus = $this->modAdmin->checkSpecValues($spec_values);
                        if ($specValStatus) {
                            setFlashData("alert-success", "You have successfully added your spec", "admin/newSpec");
                        } else {
                            setFlashData("alert-danger", "You can\'t add your spec value right now", "admin/newSpec");
                        }
                    } else {
                        setFlashData("alert-danger", "You can\'t add your spec name right now", "admin/newSpec");
                    }
                    // 開発用
                    // ここが原因
                    // $addData = $this->modAdmin->addProduct($data);
                    // if ($addData) {
                    //     setFlashData("alert-success", "You have successfully added your Product", "admin/newSpec");
                    // } else {
                    //     setFlashData("alert-danger", "You can\'t add your product right now", "admin/newSpec");
                    // }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/newSpec");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function allSpecs()
    {
        if (adminLoggedIn()) {
            $config["base_url"] = site_url("admin/allSpecs");
            $totalRows = $this->modAdmin->getAllSpecs();
            $config["total_rows"] = $totalRows;
            $config["per_page"] = 2;
            $config["uri_segment"] = 3;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["allSpecs"] = $this->modAdmin->fetchAllSpecs($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/header/header');
            $this->load->view('admin/header/css');
            $this->load->view('admin/header/navtop');
            $this->load->view('admin/header/navleft');
            $this->load->view('admin/home/allSpecs', $data);
            $this->load->view('admin/header/footer');
            $this->load->view('admin/header/htmlclose');
        } else {
            setFlashData("alert-danger", "Please login first to add your Product", "admin/login");
        }
    }

    public function deleteSpec()
    {
        if (adminLoggedIn()) {
            if ($this->input->is_ajax_request()) {
                $mId = $this->input->post("text", true);
                if (!empty($mId) && isset($mId)) {
                    $mId = $this->encryption->decrypt($mId);
                    $checkMd = $this->modAdmin->deleteSpec($mId);
                    if ($checkMd) {
                            $data["return"] = true;
                            $data["message"] = "successfully deleted";
                            echo json_encode($data);
                    } else {
                        $data["return"] = true;
                        $data["message"] = "You can\'t delete your product";
                        echo json_encode($data);
                    }
                } else {
                    $data["return"] = true;
                    $data["message"] = "value not found";
                    echo json_encode($data);
                }
            } else {
                setFlashData("alert-danger", "Something went wrong ", "admin");
            }
        } else {
            setFlashData("alert-danger", "Please login first ", "admin/login");
        }
    }

    public function editSpec($spId)
    {
        if (adminLoggedIn()) {
            if (!empty($spId) && isset($spId)) {
                $data["spec"] =  $this->modAdmin->checkSpecById($spId);
                // d($spId);
                // d($data["spec"]);
                // d(count($data["spec"]));
                // ee();
                if (count($data["spec"]) == 1) {
                    $data["models"] =  $this->modAdmin->getModel();
                    $this->load->view('admin/header/header');
                    $this->load->view('admin/header/css');
                    $this->load->view('admin/header/navtop');
                    $this->load->view('admin/header/navleft');
                    $this->load->view('admin/home/editSpec', $data);
                    $this->load->view('admin/header/footer');
                    $this->load->view('admin/header/htmlclose');
                } else {
                    setFlashData("alert-danger", "Spec not found", "admin/allSpecs");
                }
            } else {
                setFlashData("alert-danger", "Something went wrong", "admin/allSpecs");
            }
        } else {
            setFlashData("alert-danger", "Please login first to edit your Spec", "admin/login");
        }
    }

    public function updateSpec()
    {
        if (adminLoggedIn()) {
            $data["spName"] = $this->input->post("sp_name", true);
            // $specValues = $this->input->post("so_val", true);//array
            // 空白（false）を削除
            // $specValues = array_filter($specValues);
            $data["modelId"] = $this->input->post("modelId", true);
            $specId = $this->input->post("specId", true);
            if (!empty($data["spName"]) && !empty($specId) && !empty($data["modelId"])) {
                // $data["spDate"] = date("Y-m-d H-i-s");
                // $data["adminId"] = getAdminId();
                $addData = $this->modAdmin->checkSpec($data);
                if ($addData->num_rows() > 0) {
                    setFlashData("alert-danger", "The Model already exist.", "admin/allSpecs");
                } else {
                    // $specId = $this->modAdmin->checkSpecName($data);
                    // if (is_numeric($specId)) {
                        // $spec_values = array();
                        // foreach ($specValues as $specVal) {
                        //     $spec_values[] = array(
                        //         "specId" =>$specId,
                        //         "adminId" => $data["adminId"],
                        //         "spvDate" => date("Y-m-d H-i-s"),
                        //         "spvName" => $specVal,
                        //     );
                        // }
                        // $specValStatus = $this->modAdmin->checkSpecValues($spec_values);
                        $updateSpec = $this->modAdmin->updateSpec($data, $specId);
                        if ($updateSpec) {
                            setFlashData("alert-success", "You have successfully added your spec", "admin/allSpecs");
                        } else {
                            setFlashData("alert-danger", "You can\'t add your spec value right now", "admin/allSpecs");
                        }
                    // } else {
                    //     setFlashData("alert-danger", "You can\'t add your spec name right now", "admin/newSpec");
                    // }
                    // 開発用
                    // ここが原因
                    // $addData = $this->modAdmin->addProduct($data);
                    // if ($addData) {
                    //     setFlashData("alert-success", "You have successfully added your Product", "admin/newSpec");
                    // } else {
                    //     setFlashData("alert-danger", "You can\'t add your product right now", "admin/newSpec");
                    // }
                }
            } else {
                setFlashData("alert-danger", "Please check the required fields.", "admin/allSpecs");
            }
        } else {
            setFlashData("alert-danger", "Please login first to add your spec", "admin/login");
        }
    }
}
