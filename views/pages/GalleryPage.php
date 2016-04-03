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
        <a href="/deleteeditform"> Delete/Edit User </a>
    <?php
        require CONTROLLER_DIR . '/DBConnection/Config.php';
        
        $query = "SELECT * FROM images";
        $stm = $database->prepare($query);
        $stm->execute();
        $dbinfo = $stm->fetch(PDO::FETCH_ASSOC);
        
        while($dbinfo){
            echo    '<img src="data:image;base64,'.$dbinfo['image'].' "alt="'.$dbinfo['title'].'" width="300" height="300">';
            echo    '<label> Title - </lable>'.$dbinfo['title']. '<br><br>';
            
            echo    '<form action="delete_image" method="POST">';
            echo        '<input type="hidden" name="id" value="'.$dbinfo['id'].'"/>';
            echo        '<button type="submit" value="Delete Image">';
            echo    '</form>';
                    
        }
        ?>
        
    </body>
</html>
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

