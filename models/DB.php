<?php


class DB{
    public function __construct(){

    }

    public function connect(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'vu_university_pharmacy_db';

        $mysqli = new mysqli($servername, $username, $password, $database);
        unset($servername, $username, $password, $database);
        // print_r($mysqli);

        $error = $mysqli->connect_error;
        $errorNo = $mysqli->connect_errno;
        if($error){
            echo 'Error connecting the Database<br>';
            echo 'Error No: '.$errorNo.'<br>';
            echo 'Error Description: '.$error;
            die();
        }
        return $mysqli;
    }
}