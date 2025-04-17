<?php
    include "../constants.php";
    $number = mysqli_real_escape_string($dbConnection,$_POST["number"]);
    $type = mysqli_real_escape_string($dbConnection,$_POST["type"]);
    $trailer = mysqli_real_escape_string($dbConnection,intval($_POST["trailer"]));
    $passengers = mysqli_real_escape_string($dbConnection,intval($_POST["passengers"]));
    $firstname =mysqli_real_escape_string($dbConnection, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($dbConnection,$_POST["lastname"]);
    $month = mysqli_real_escape_string($dbConnection,intval($_POST["month"]));
    $city = mysqli_real_escape_string($dbConnection,$_POST["city"]);
    $country = mysqli_real_escape_string($dbConnection,$_POST["country"]);
    $driver_name = mysqli_real_escape_string($dbConnection,"{$firstname} {$lastname}");
    $automobile_id = mysqli_insert_id($dbConnection);
    $createDriverQuery = "INSERT INTO `drivers` (`id`,`firstname`,`lastname`,`city`,`country`) VALUES (NULL,'$firstname','$lastname','$city','$country')";
    if (!mysqli_query($dbConnection, $createDriverQuery)) {
        echo "<h2 align='center'>Грешка при добавянето на данните!</h2>";
    }
    $driver_id = mysqli_insert_id($dbConnection);
    $createAutomobileQuery = "INSERT INTO `automobile` (`id`,`number`,`type`,`trailer`,`passengers`,`driver_name`,`month`,`driver_id`) VALUES
    (NULL,'$number','$type','$trailer','$passengers','$driver_name','$month','$driver_id')";
    if (!mysqli_query($dbConnection, $createAutomobileQuery)) {
        echo "<h2 align='center'>Грешка при добавянето на данните!</h2>";
    }
    mysqli_close($dbConnection);
    header("Location:../automobile_list/automobile_list.php");
?>