<?php

namespace App\Controller;
use PDO;

        $host = 'localhost';
        $root = 'root';
        $pass = 'Nevethan0010';
        $dbName = 'itassign';
        
        try{
            $database= new PDO('mysql:host='.$host.';dbname=' . $dbName, $root, $pass);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  catch (PDOException $pe){
            die("Unable to connect");
        }
?>



