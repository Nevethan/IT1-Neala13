<?php

namespace App\Controller;

require MODEL_DIR .'/LoginModel.php';

class LoginController{
    
    private $login = null;
            
    //NOTE: The Type of the parameter was behaving differently. It wound only accept by writting \App... 
    public function __construct(\App\Model\LoginModel $login) {
        $this->login = $login;
    }
    
    public function showPage(){
        require VIEW_DIR . '/pages/Login.php';  
    }
    
    public function invoke(){
        $result = $this->login->getLogin();
        if($result){
            //header('Location: Gallery.php');
            if($_SESSION['username']){
                echo "Welcome to the Gallery " . $_SESSION['username']. "!";
            }else{
                die("You are already logged in! <a href = 'Gallerypage.php'> To the Gallery </a>");
            }
            require VIEW_DIR . '/pages/GalleryPage.php';  
        }else{
            die("Unable to login");
        }
        
    }
    
    public function logOut(){
        session_destroy();
        
        require VIEW_DIR . '/pages/Login.php';
    }
    
    
    
    
    
}

