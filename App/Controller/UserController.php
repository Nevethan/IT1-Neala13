<?php

namespace App\Controller;

require MODEL_DIR . '/UserModel.php';

class UserController{
    
    private $addUser = null;
    
    public function __construct(\App\Model\UserModel $addUser) {
        $this->addUser = $addUser;
    }
    
    public function showPage(){
        
        //if(filter_input(INPUT_SESSION, 'username')){
            require VIEW_DIR . '/pages/AddUserPage.php';  
        //}else{
            //die("No Access <a href='/'> Try Again!");
        //}
        
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
        require VIEW_DIR . '/pages/DeleteEditUserPage.php';
    }
    
    public function invokeDelete(){
        $result = $this->addUser->deleteUser();
        
        if($result){
            echo "The User has been successfully Deleted. Have a Nice Day <a href='/'> Click here to Login";
        }else{
            die("Unable to Delete User. Please <a href='/deleteeditform'> Try Again!");
        }
    }
    
    public function invokeEdit(){
        $r = $this->addUser->editUser();
        
        if($r){
            session_destroy();
            echo "The User has been successfully Updated. Please <a href='/'>Login Again.";
        }else{
            die("Unable to Update User. Please <a href='/editform'> Try Again!"); 
        }
    }
}