<?php

spl_autoload_register(function ($className){
    
    $className = str_replace('//',DIRECTORY_SEPARATOR, $className);
    $fileName = 'controllers'.DIRECTORY_SEPARATOR.$className.'.php';
    if(is_readable($fileName)){
        include($fileName);
    }
});