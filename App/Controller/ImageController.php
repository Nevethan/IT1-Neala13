<?php

namespace App\Controller;

require MODEL_DIR . '/ImageModel.php';

class ImageController{
    
    private $image;
    
    public function __construct(\App\Model\ImageModel $image) {
        $this->image = $image;
    }
    
    public function showPage(){
        //if(filter_input(INPUT_SESSION, 'username')){
            require VIEW_DIR . '/pages/UploadImagePage.php';  
        //}else{
          //  die("No Access <a href='/'> Try Again!");
        //}
        
    }
    
    public function showGallery(){
        require VIEW_DIR . '/pages/GalleryPage.php';
    }
    
    public function invokeUploadImage(){
        $result->$this->image->uploadImage();
        
        if($result){
            //header('Location: /gallery');
            require VIEW_DIR . '/pages/GalleryPage.php';
        }else{
            die("NOOOOOO");
        }
        
    }
}
    

