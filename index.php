<?php
// error_reporting(E_ERROR | E_PARSE);
include_once('setup.php');

$main = new Main_MODEL;
print_r($main->db()); exit;

if($_POST){
    main::validate($mysqli);
}
else{
    main::login();
}
//login

// print_r(get_defined_vars());