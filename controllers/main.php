<?php

class main{
    public static function login(){
        $root = dirname(__FILE__,2);
        if(!isset($_SESSION)){
            include($root.'/views/login.html');
        } 
    }
    public static function validate(){
        if($_POST){
            $userName = $_POST['username'];
            $password = $_POST['password'];

            $validatedEmail = filter_var($userName, FILTER_VALIDATE_EMAIL);
            $validatedMobile = is_numeric($userName) && strlen($userName) == 11;

            $validatedUsername = $validatedEmail || $validatedMobile;
            $validatedPassword = strlen($password) < 15;
            
            $validatedInput = $validatedUsername && $validatedPassword;
            
            if($validatedInput){
                main::authenticate($userName, $password);
            }
            else{
                echo "Incorrect Username or Password";
            }
        }
        else{
            main::login();
        }
    }
    public static function authenticate($username, $password){
        $loginUser = new Users($username, $password);
        $users = new Users();
        $isRegistered = $users->findUser($username); 
        
        if(!$isRegistered){
            echo "You are not registered with the system";
        }
        else{
           
            $loginPassword = $loginUser->password;
            $registeredPassword = $isRegistered->password;
            $passwordMatch = $loginPassword == $registeredPassword;

            if(!$passwordMatch){
                echo "It seems you forgot your password";
            }
            else{
                main::createSession($isRegistered);   

                dashboard::loggedIn();
            }
        }
        //unset($users, $loginUser);
        
    }
    public static function createSession($isRegistered){
        $_SESSION['page'] = 'login';
        $_SESSION['username'] = $isRegistered->username;
        $_SESSION['status'] = $isRegistered->status;
        $_SESSION['level'] = $isRegistered->level;
    }
    public static function logout(){
        if(isset($_SESSION)){
            session_destroy();
            main::login();
        }
        else{
            main::login();
        }
        
    }
    
}