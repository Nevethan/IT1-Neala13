<html>
    <head>
        <title>MyFirstWebSite - Upload Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="/assets/css/stylesheet.css">
    </head>
    
    <body>
        <h1> UpLoad Your own Picture </h1>
        
        <form method="POST" action="/upload" enctype="multipart/form-data">
            <input type="file" name="filename" accept="image/gif, image/jpeg, image/png"><br>
            <input type="text" name="title" id="title" placeholder="Insert Title" maxlength="100" />
            <br><br>
            <input type="submit" value="Upload"/>
        </form>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

