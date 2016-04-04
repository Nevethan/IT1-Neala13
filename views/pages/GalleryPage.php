<html>
    <head>
        <title>MyFirstWebSite - Gallery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="/assets/css/stylesheet.css">
    </head>
    <body>
        <h1> Gallery</h1>
        <a href = "/upload"> UpLoad a Picture</a>
        <a href= "/logout"> LogOut </a>
        <a href="/deleteeditform"> Delete/Edit User </a> <br><br>
        
        <div>
    <?php
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        /*$query = "SELECT * FROM images";
        $stm = $database->prepare($query);
        $stm->execute();
        $dbinfo = $stm->fetch(PDO::FETCH_ASSOC);*/
        
        $sql = "SELECT * FROM images";
        $result = $database->query($sql);

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo    '<img src="data:image;base64,'.$row['image'].' "alt="'.$row['title'].'" width="300" height="300"> <br><br>';
            
            echo    '<label> Title - </lable>'.$row['title']. '<br>';
            
            echo    '<form action="deleteimage" method="POST">';
            echo        '<input type="hidden" name="id" value="'.$row['id'].'"/>';
            echo        '<button type="submit" value="Delete Image">Delete Image </button>';
            echo    '</form>';
        }
        ?>
        </div>
    </body>
</html>
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

