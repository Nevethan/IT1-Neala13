<html>
    <head>
        <title>MyFirstWebSite - Upload Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="/assets/css/stylesheet.css">
    </head>
    
    <body>
        <h1> UpLoad Your own Picture </h1>
        
        <form action="/uploadImage" method ="POST" enctype="multipart/form-data">
            <fieldset>
                <legend> Upload File </legend>
                    <input type="text" id="title" placeholder="Title"/><br><br> 
                    <input type="file" name="image" accept="image/gif, image/jpeg, image/png"/><br><br>
                    <input type="submit" value='Upload'> 
                 
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

