<?php 
    $server="localhost";
    $username="root";
    $password= "";
    $dbName="cars-crossed";
    if(!$dbConnection=mysqli_connect($server,$username,$password, $dbName)){
        die("Не можем да се свържем с базата данни");
    }
?>