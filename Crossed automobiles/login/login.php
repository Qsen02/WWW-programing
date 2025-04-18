<?php 
    include "../constants.php";
    session_start();
    $email=mysqli_real_escape_string($dbConnection, $_POST["email"]);
    $password=$_POST["password"];

    $sql="SELECT * FROM `users` WHERE email='$email'";
    $res=mysqli_query($dbConnection, $sql);
    if(!$user=mysqli_fetch_assoc( $res)) {
        echo "<h2 align='center'>Грешка в имейла или паролата!</h2>";
    }

    if(!password_verify($password, $user["password"])) {
        echo "<h2 align='center'>Грешка в имейла или паролата!</h2>";
    }

    $_SESSION["user"]=$user;
    mysqli_close($dbConnection);
    header("Location: ../automobile_list/automobile_list.php");
?>