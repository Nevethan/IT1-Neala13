<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<html>
    <head>
        <title>MyFirstWebSite - Add New User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1> Add New User</h1>
        <form action="/" method ="POST">
            <fieldset>
                <legend>Add new User</legend>
                Username:
                <input type="text" name="username"><br><br>
                Password:
                <input type="password" name="password"><br><br>
                <input type="submit" name='submit'>
            </fieldset>
        </form>   
    </body>
</html>

