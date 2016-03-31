<?php
$host = 'localhost';
$root = 'root';
$pass = 'Nevethan0010';

$connect = mysqli_connect($host, $root, $pass);

if(!$connect){
    die("Unable to connect" . mysqli_error());
}

mysqli_select_db('itassign', $connect) or die("Unable to find Database");
    


?>



