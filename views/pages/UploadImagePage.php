<html>
    <head>
        <title>MyFirstWebSite - Upload Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="stylesheet.css">
    </head>
    
    <body>
        <h1> UpLoad Your own Picture </h1>
        
        <form action="UploadFormPage.php" method ="POST" enctype='multipart/form-data'>
            <fieldset>
                <legend> Upload File </legend>
                    <input type="file" name="image"><br><br>
                    <input type="submit" value='Upload'> 
                    
                    <ul>
                        <li>File name: <?php echo $_FILES["image"]["name"];?>
                        <li>File size: <?php echo $_FILES["image"]["size"];?>
                        <li>File type: <?php echo $_FILES["image"]["type"];?>
                    </ul>
            </fieldset>
        </form>
    </body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

