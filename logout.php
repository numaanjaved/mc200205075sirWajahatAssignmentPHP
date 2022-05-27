<?php 
    $url =  $_SERVER['REQUEST_URI'];
    $url_parts = explode('/', $url);
    $url_reversed = array_reverse($url_parts);

    $extension_url = $url_reversed[0];
    $filtered_url = explode('.', $extension_url);
    $called_url = $filtered_url[0];

    header("Location: index.php/".$called_url);