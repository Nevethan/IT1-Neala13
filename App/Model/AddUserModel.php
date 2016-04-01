<?php
namespace App\Model;
use PDO;

class AddUserModel{
    
    public function addUser(){
        
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $q = $database->query("SELECT * FROM users WHERE username = '$userinput'");
        
        
        
        if($userinput && $passinput){
        
            //$check = mysql_num_rows($result);
            $check = $q->fetchColumn();
            if($check == 0){
                //Add user here
                $passinput = hash("sha256", $passinput);
                $stm = $database->query("INSERT INTO users (username,password) VALUES ('$userinput', '$passinput')" );
                $database = null;
                return true;
                //header('Location: GalleryPage.php');
            }else{
                die("The Username is already being used. <a href='/userform'> Try Again!");
            }
        }
    }
}