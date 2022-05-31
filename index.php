<?php
// error_reporting(E_ERROR | E_PARSE);
include_once('setup.php');
include_once('.config/base_url.php');
$url = $_SERVER['REQUEST_URI'];
$url_temp = explode("/",$url);
$url_reversed = array_reverse($url_temp); 
$called_url = $url_reversed[0];
$root = dirname(__FILE__);
    //main::displayMain();
    if($called_url == 'logout'){
        main::logout();
    }
    if($called_url == 'login'){
        main::login();
    } 
    if(isset($_POST)){
        main::validate();
    }
    
    
    

