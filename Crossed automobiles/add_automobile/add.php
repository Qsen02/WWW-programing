<?php
    include "../constants.php";
    $number = $_POST["number"];
    $type = $_POST["type"];
    $trailer = intval($_POST["trailer"]);
    $passengers = intval($_POST["passengers"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $month = intval($_POST["month"]);
    $city = $_POST["city"];
    $country = $_POST["country"];
    $driver_name = "{$firstname} {$lastname}";
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
?>
<script>
    window.location.replace("http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/automobile_list/automobile_list.php");
</script>