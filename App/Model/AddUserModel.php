<?php
namespace App\Model;
use PDO;

class AddUserModel{
    
    public function addUser(){
        
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $q = $query->query("SELECT * FROM users WHERE username = '$userinput'");
        
        if($userinput && $passinput){
        
            //$check = mysql_num_rows($result);
            $check = $q->fetchColumn();
            if($check == 0){
                //Add user here
                mysql_query("INSERT INTO users (username,password) VALUES ('$userinput', '$passinput')" );
                header('Location: GalleryPage.php');
                //mysql_close($connect);
            }else{
                die("The Username is already being used. Try again !");
            }
        }
    }
}