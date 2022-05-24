<?php
// error_reporting(E_ERROR | E_PARSE);
include_once('setup.php');

if($_POST){
    main::validate($mysqli);
}
else{
    main::login();
}

// print_r(get_defined_vars());