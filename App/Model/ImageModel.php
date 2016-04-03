<?php

namespace App\Model;
use PDO;

class ImageModel{
    //File properties
    
    public function uploadImage(){
        if(isset($_FILES['image'], $_POST['title'])){
            $name = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];
            $temp = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            $image = addslashes($_FILES['image']['tmp_name']); 
            $image = file_get_contents($image);
            $image = base64_encode($image);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);


            if($error > 0)
            {
                die("Error occured when uploading file. Code $error. <br> Unable to upload Picture. Please <a href='/upload'> Try Again");
            }  
            if($size > 2000000)
            {   
                die("The size of the file is too great");
            }else
            {
                try {
                    require CONTROLLER_DIR . '/DBConnection/Config.php';
                    
                    $param = array($title, $image);
                    $stm = $database->prepare("INSERT INTO images (title, image) VALUES (?,?)");
                    $stm->execute($param);
                    return true;
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
            }
        }       
    }
}
    /*public function galleryUpload(){
        if(isset($_FILES['image'], $_POST['title'])){
            if($_FILES['image'] != null && $_POST['title'] != null) {
                $image = addslashes($_FILES['image']['tmp_name']); 
                //$name = addslashes($_FILES['filename']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);
                $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);


                try {
                    require CONTROLLER_DIR . '/DBConnection/Config.php';
                    
                    $param = array($title, $image);
                    $stm = $database->prepare("INSERT INTO images (title, image) VALUES (?,?)");
                    $stm->execute($param);

                    header('Location: /gallery');
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                return true;
            }else{
                return false;
            }
        }
    }*/
    /*
    public function galleryUpload(){
		if (isset($_FILES['image'], $_POST['title'])) {
	        if ($_FILES['image'] != null && $_POST['title'] != null) {
		        $image= addslashes($_FILES['image']['tmp_name']); // Prevents SQL Injection.
				$name= addslashes($_FILES['image']['name']);
				$image= file_get_contents($image);
				$image= base64_encode($image);	
				$title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);
				try {
					require CONTROLLER_DIR . '/DBConnection/Config.php';
			
					$query = "INSERT INTO images (title, image) VALUES (?,?)";
					$parameters = array($title, $image);
					$statement = $database->prepare($query);
					$statement->execute($parameters);
			
					//header ('Location: /gallery');
				
				} catch(Exception $e) {
					echo $e->getMessage();
					die("Database has died");
				}		
	            return true;
	        } else {
	        	return false;
	        }
		}
	}
    
}*/
