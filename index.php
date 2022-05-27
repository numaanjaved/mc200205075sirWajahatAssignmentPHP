<?php
// error_reporting(E_ERROR | E_PARSE);
include_once('setup.php');


if($_POST){
    main::validate();
}
if(!$_SESSION){
    main::login();
}
else{
    echo "Logged In! ";

    $level = $_SESSION['level'];
    $user = ''; 
    if($level == 3){
       $user = 'Admin';
    }
    else if($level == 2){
        $user = 'Pharmacist';
    }
    else if($level == 1){
        $user = 'Costumer';
    }
    echo "Welcome to the ".$user." Panel<br>";
    echo "<a href=".main::logout().">Logout</a>";
}
//login

// print_r(get_defined_vars());