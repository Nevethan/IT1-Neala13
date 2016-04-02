<?php

namespace App\Model;
use PDO;

class ImageModel{
    //File properties
    
    public function uploadImage(){
        if(isset($_FILES['image'])){
            $name = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];
            $temp = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if($error > 0)
            {
                die("Error occured when uploading file. Code $error. <br> Unable to upload Picture. Please <a href='/upload'> Try Again");
            }
            if($size > 2000000)
            {   
                die("The size of the file is too great");
            }else
            { 
                move_uploaded_file($temp, IMAGE_DIR.'/Images'.$name);
            }
            return true;
        }
                
    }   
}


    


