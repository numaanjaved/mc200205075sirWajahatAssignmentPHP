<?php

class main{
    public static function login(){
        include('./views/login.html');
    }
    public static function displayMain(){
        if(!isset($_SESSION)){
            main::login();
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
        ?> <pre> <?php print_r($loginUser); print_r($isRegistered);
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

                main::loggedIn();
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
        session_destroy(); die("You Logged Out");
    }
    public static function loggedIn(){
        if(isset($_SESSION)){
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
           echo "<a href='index.php/logout'>Logout</a>";
       }
    }
}