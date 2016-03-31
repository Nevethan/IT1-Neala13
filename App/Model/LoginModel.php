<?php
namespace App\Model;

require 'App\DBConnection\Config.php';

class LoginModel{
    
    public function getlogin() {
        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
        
        $query = mysql_query("SELECT * FROM users WHERE username='$username'");
        $info = mysql_fetch_assoc($query);
            
        $usernameDb = $info['username'];
        $passwordDb = $info['password'];
            
            
        if($username && $password){
            $this->validateUser($usernameDb, $passwordDb, $query);
            return true;
        }else{
            die("Please Enter username and password, please! <a href='/'> Return to Login.</a>");
        }
        
    }
    
    function validateUser($usernameDb, $passwordDb, $query){
            $rowsnumber = mysql_num_rows($query);
                if ($rowsnumber != 0) {
                    while ($info = mysql_fetch_assoc($query)) {
                        $usernameDb = $info['username'];
                        $passwordDb = $info['password'];
                        $_SESSION['username'] = $usernameDb;
                    }
                }else{
                    die("Username does not exist");
                }
        }
}

