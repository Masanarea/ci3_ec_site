<?php

function setFlashData($class, $message, $url)
{
    $CI = get_instance();
    $CI->load->library("session");
    $CI->session->set_flashdata("class", $class);
    $CI->session->set_flashdata("message", $message);
    redirect($url);
}

function adminLoggedIn()
{
    $CI = get_instance();
    $CI->load->library("session");
    if ($CI->session->userdata("aId")) {
        return true;
    }else{
        return false;
    }
}

function getAdminId()
{
    $CI = get_instance();
    $CI->load->library("session");
    if ($CI->session->userdata("aId")) {
        return $CI->session->userdata("aId");
    }else{
        return false;
    }
}

function userLoggedIn()
{
    $CI = get_instance();
    $CI->load->library("session");
    if ($CI->session->userdata("uId")) {
        return true;
        
    }else{
        return false;
    }
}

function checkFlash(){
    $CI = get_instance();
    $CI->load->library("session");
    if ($CI->session->userdata("class")) {
        $data["class"] = $CI->session->userdata("class");
        $data["message"] = $CI->session->userdata("message");
        $CI->load->view("flashdata", $data);
    }
}

function getSpecs($modelId){
    $CI = get_instance();
    // $CI->load->library("database");
        // return $CI->db->get_where("specs", array("spStatus" => 1, "modelId" => $modelId));
        return $CI->db->get_where("specs", array("spStatus" => 1, "modelId" => $modelId));
}

// 開発用
function d($data)
{
    echo "<pre>";
    echo "dataの中身";
    echo "<pre>";
    var_dump($data) ;
    echo "<pre>";
}
// 開発用
function dd($reason,$data)
{
    echo "<pre>";
    echo "使用用途・・・$reason";
    echo "<pre>";
    echo "dataの中身";
    echo "<pre>";
    var_dump($data) ;
    echo "<pre>";
}
// 開発用
function w(){
    echo "<pre>";
    echo "working..";
    echo "<pre>";
}
// 開発用
function nw(){
    echo "<pre>";
    echo "Not working..";
    echo "<pre>";
}
// 開発用
function e(){
    exit;
}
// 開発用
function ee(){
    echo "<pre>";
    exit("working..");
}
?>