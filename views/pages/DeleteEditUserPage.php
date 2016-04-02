
<html>
    <head>
        <title>MyFirstWebSite - Delete User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="/assets/css/stylesheet.css">
    </head>
    <body>
        <h1> Delete or Edit User</h1>
        <form action="/deleteeditform" method ="POST">
            <fieldset>
                <legend>Delete User</legend>
                Username:
                <input type="text" name="username"><br><br>
                Password:
                <input type="password" name="password"><br><br>
                <input type="submit" value="Delete"> 
            </fieldset>
        </form>  
        
        <form action="/editform" method ="POST">
            <fieldset>
                <legend>Edit User</legend>
                <input type="hidden" name="id" value="<?$id;?>">
                Username:
                <input type="text" name="username"><br><br>
                Password:
                <input type="password" name="password"><br><br>
                <input type="submit" name="edit_button" value="Edit" >
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

