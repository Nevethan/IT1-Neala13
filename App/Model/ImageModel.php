<?php

namespace App\Model;
use PDO;

class ImageModel{
    
    public function uploadImage(){
		if (isset($_FILES['filename'], $_POST['title'])) {
	        if ($_FILES['filename'] != null && $_POST['title'] != null) {
		        $image= addslashes($_FILES['filename']['tmp_name']); // Prevents SQL Injection.
				$name= addslashes($_FILES['filename']['name']);
				$image= file_get_contents($image);
				$image= base64_encode($image);	
				$title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);
				try {
					require CONTROLLER_DIR . '/DBConnection/Config.php';
                                        
					$query = "INSERT INTO images (title, image) VALUES (?,?)";
					$parameters = array($title, $image);
					$statement = $database->prepare($query);
					$statement->execute($parameters);
			
					header ('Location: /gallery');
				
				} catch(Exception $e) {
					echo $e->getMessage();
				}		
	            return true;
	        } else {
	        	return false;
	        }
            }
	}
        
        public function deleteImage(){
            try{
                require CONTROLLER_DIR . '/DBConnection/Config.php';
                if(is_numeric(filter_input(INPUT_POST, 'id'))){
                    $id = $_POST['id'];
                    $q = "SELECT * FROM images WHERE id ='$id'";
                    $query = "DELETE FROM images WHERE id='$id'";
                    
                    $select = $database->query($q);
                    
                    if($select){
                        $database->query($query);
                        return true;
                    }
                    return false;
            }
        }  catch (Exception $e){
            echo "Problem with deleting the image";
        }
    }
}
    