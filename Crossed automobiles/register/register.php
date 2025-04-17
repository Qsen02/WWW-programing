<?php
session_start();
include "../constants.php";

$firstname = mysqli_real_escape_string($dbConnection, $_POST["firstname"]);
$lastname  = mysqli_real_escape_string($dbConnection, $_POST["lastname"]);
$email     = mysqli_real_escape_string($dbConnection, $_POST["email"]);
$password  = password_hash($_POST["password"], PASSWORD_DEFAULT);

$userRegister = "
    INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`)
    VALUES ('$firstname', '$lastname', '$email', '$password')
";
if (!mysqli_query($dbConnection, $userRegister)) {
    echo "<h2 align='center'>Грешка при регистрация!</h2>";
    exit;
}

$last_id = mysqli_insert_id($dbConnection);

$sql = "SELECT `id`, `firstname`, `lastname`, `email` 
        FROM `users` 
        WHERE `id` = $last_id";
$result = mysqli_query($dbConnection, $sql);

if ($user = mysqli_fetch_assoc($result)) {
    $_SESSION["user"] = $user;
} else {
    echo "<h2 align='center'>Не можа да се зареди данните на потребителя.</h2>";
    exit;
}

mysqli_close($dbConnection);

header("Location: ../automobile_list/automobile_list.php");
exit;
?>