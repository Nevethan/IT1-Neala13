<?php

namespace App\Controller;

require MODEL_DIR . '/ImageModel.php';

class ImageController{
    
    private $image = null;
    
    public function __construct(\App\Model\ImageModel $image) {
        $this->image = $image;
    }
    
    public function showPage(){
        require VIEW_DIR . '/pages/UploadImagePage.php';
    }
    
    public function showGallery(){
        require VIEW_DIR . '/pages/GalleryPage.php';
    }
    
    public function invokeUploadImage(){
        $result = $this->image->uploadImage();
        
        if($result){
            require VIEW_DIR . '/pages/UploadImagePage.php';
        }
        
    }
    
    
    
    
}


