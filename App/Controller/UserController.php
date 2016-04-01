<?php

namespace App\Controller;

require MODEL_DIR . '/UserModel.php';

class UserController{
    
    private $addUser = null;
    
    public function __construct(\App\Model\UserModel $addUser) {
        $this->addUser = $addUser;
    }
    
    public function showPage(){
        require VIEW_DIR . '/pages/AddUserPage.php';
        $this->addUser->showUsers();
    }
    
    public function invoke(){
        $result = $this->addUser->addUser();
        
        if($result){
            echo "You have been succesfully Registered. <a href='/'> Click here to Login";
        }else{
            die("Unable to Register you. Please <a href='/userform'> Try Again!");
        }
    }
    
    public function showDeletePage(){
        require VIEW_DIR . '/pages/DeleteUserPage.php';
    }
    
    public function invokeDelete(){
        $result = $this->addUser->deleteUser();
        
        if($result){
            echo "The User has been successfully Deleted. Have a Nice Day <a href='/'> Click here to Login";
        }else{
            die("Unable to Delete User. Please <a href='/deleteform'> Try Again!");
        }
        
    }
}