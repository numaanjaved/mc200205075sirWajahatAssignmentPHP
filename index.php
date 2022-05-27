<?php
// error_reporting(E_ERROR | E_PARSE);
include_once('setup.php');

$url = $_SERVER['REQUEST_URI'];
$url_temp = explode("/",$url);
$url_reversed = array_reverse($url_temp); 
$called_url = $url_reversed[0];

    // main::displayMain();
        if($called_url == 'logout'){
            main::logout();
        }
        // print_r($called_url);
        
    if(isset($_POST)){
        main::validate();
    }
    
    

