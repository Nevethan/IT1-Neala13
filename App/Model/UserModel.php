<?php
namespace App\Model;
use PDO;

class UserModel{
    
    public function addUser(){
        
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $q = $database->query("SELECT * FROM users WHERE username = '$userinput'");
        
        if($userinput && $passinput){
        
            //$check = mysql_num_rows($result);
            $check = $q->fetchColumn();
            if($check == 0){
                //Add user here
                $passinput = hash("sha256", $passinput);
                $stm = $database->query("INSERT INTO users (username,password) VALUES ('$userinput', '$passinput')" );
                $database = null;
                return true;
                //header('Location: GalleryPage.php');
            }else{
                die("The Username is already being used. <a href='/userform'> Try Again!");
            }
        }
    }
    
    public function showUsers(){
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $sql = "SELECT id, username FROM users";
        $result = $database->query($sql);

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> Id: ". $row["id"]. " - Name: ". $row["username"]. " ";
        }
               
    }
    
    public function deleteUser(){
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
        $passinput = hash("sha256", $passinput);
        
        $q = $database->query("SELECT * FROM users WHERE username = '$userinput'&& password = '$passinput'");
        $query = "DELETE FROM users WHERE username = '$userinput'";
        
        if($userinput && $passinput){
            
            $check = $q->fetchColumn();
            if(!$check == 0){
                $database->exec($query);
                return true;  
            }
        }else{
            die("Unable to Delete user. Please <a href='/deleteeditform'> Try Again! </a>");
        }
        $database = null;
    }
    
    public function editUser(){
        $id = isset($_SESSION['id']);
        $userinput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passinput = filter_input(INPUT_POST,'password', FILTER_SANITIZE_NUMBER_INT);
        $passinput = hash("sha256", $passinput);
        
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $select = $database->query("SELECT * FROM users WHERE id ='$id'");
        
        $query = "UPDATE users SET username ='$userinput' , password ='$passinput' WHERE id = '$id'";
        
        $info = $select->fetchColumn();
        if($info == 1){
            //$stm = $database->prepare($query);
            $stm->bindParam(':username', $userinput, PDO::PARAM_STR);
            $stm->bindParam(':password', $passinput, PDO::PARAM_INT);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->exec($query);
            $database = null;
            return true;
        }else{
            die("Unable to Edit User. Please <a href='/deleteeditform'> Try Again!");
        }
    }
}
