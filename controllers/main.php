<?php

class main{
    public static function login(){
        include('./views/login.html');
    }
    public static function validate($db){
        if($_POST){
            $userName = $_POST['username'];
            $password = $_POST['password'];

            $validatedEmail = filter_var($userName, FILTER_VALIDATE_EMAIL);
            $validatedMobile = is_numeric($userName) && strlen($username) == 11;

            $validatedUsername = $validatedEmail || $validatedMobile;
            $validatedPassword = strlen($password) < 15;
            
            $validatedInput = $validatedUsername && $validatedPassword;
            
            if($validatedInput){
                main::authenticate($db);
            }
            else{
                main::login();
            }
        }
        else{
            die();
        }
    }
    public static function authenticate($db){
        print_r($db);
        if($_POST){

        }
    }
}