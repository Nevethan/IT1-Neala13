<?php
namespace App\Model;
use PDO;

class LoginModel{
    
    public function getlogin() {
        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
        $password = hash("sha256", $password);
       
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        $q = $database->query('SELECT * FROM users WHERE username="'.$username.'" && password ="'.$password.'";');
        $q->setFetchMode(PDO::FETCH_ASSOC);
            
        //$usernameDb = $q['username'];
        //$passwordDb = $q['password'];
            
        if($username && $password){
            $this->validateUser($q);
            
            return true;
        }else{
            die("Please Enter username and password, please! <a href='/'> Return to Login.</a>");
        }
        
    }
    
    function validateUser($query){
            $rowsnumber = $query->fetchColumn();
                if ($rowsnumber != 0) {
                    while ($info = $query->fetch(PDO::FETCH_ASSOC)) {
                        $usernameDb = $info['username'];
                        $_SESSION['username'] = $usernameDb;
                    }
                }else{
                    die("Username does not exist. Do you want to <a href='/userform'> Register?</a> " .  "or <a href='/'> Go Back?");
                }
        }
}

