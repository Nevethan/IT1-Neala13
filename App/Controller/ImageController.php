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
    
    public function invokeUploadImagePage() {
        $info = $this->image->uploadImage();
        if ($info) {
            header('Location: /gallery');
        } else {
            echo "Image cannot be added";
            echo "<br><a href='/showUpload'> Go back to upload page to try again.";
        }
    }

    public function invokeDeleteImage(){
        $info = $this->image->deleteImage();
        
        if($info){
            header('Location: /gallery');
        }else{
            echo "Unable to delete Image. Please <a href='/gallery'> Try Again.";
        }
    }
    
    /*public function invokeUploadImage(){
        $info = $this->galleryVar->uploadImage();
        if ($info) {
            header('Location: /gallery');
        } else {
            echo "Image cannot be added";
            echo "<br><a href='/showUpload'> Go back to upload page to try again.";
        }
    }*/
}
    

