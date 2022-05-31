<?php 
function base_url(){ 
    $host =  $_SERVER['HTTP_HOST']; 

    $name = 'mc200205075sirWajahatAssignmentPHP';

    $base_url = 'http://'.$host.'/'.$name;
    return $base_url;   
}