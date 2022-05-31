<?php 

class dashboard{
    public static function loggedIn(){        
        if(isset($_SESSION)){
            // echo "Logged In! ";
   
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
        //    echo "Welcome to the ".$user." Panel<br>";
        //    echo "<a href='index.php/logout'>Logout</a>";
           include('./views/dashboard.html');
       }
    }
}