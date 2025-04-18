<?php 
    session_start();
    unset($_SESSION["user"]);
    session_destroy();
    header("Location: ../login/login_form.php");
    exit;
?>