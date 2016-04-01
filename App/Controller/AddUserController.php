<?php

namespace App\Controller;

require MODEL_DIR . '/AddUserModel.php';

class AddUserController{
    
    private $addUser = null;
    
    public function __construct(\App\Model\AddUserModel $addUser) {
        $this->addUser = $addUser;
    }
    
    public function showPage(){
        require VIEW_DIR . '/pages/AddUserPage.php';
    }
    
    public function invoke(){
        $result = $this->addUser->addUser();
        
        if($result){
            echo "You have been succesfully Registered. <a href='/'> Click here to Login >";
        }else{
            die("Unable to Register you. Please <a href='/userform'> Try Again!>");
        }
    }
    
    
    
}