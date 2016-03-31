<?php

require 'App\DBConnection\Config.php';

class AddUserModel{
    
    public function addUser(){
        
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
    
        $query = mysql_query("SELECT * FROM users WHERE username = '$userinput'");
    
        if($userinput && $passinput){
        
            $check = mysql_num_rows($query);
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