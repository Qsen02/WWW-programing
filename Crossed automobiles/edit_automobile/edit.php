<?php
include "../constants.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_GET["id"])) {
    $number = $_POST["number"];
    $type = $_POST["type"];
    $trailer = intval($_POST["trailer"]);
    $passengers = intval($_POST["passengers"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $month = intval($_POST["month"]);
    $city = $_POST["city"];
    $country = $_POST["country"];
    $automobile_id = $_GET["id"];
    $driver_id = $_POST["driver_id"];
    $editAutoMobile = "UPDATE `automobile` SET 
    `number`='$number', `type`='$type', `trailer`='$trailer',
    `passengers`='$passengers', `driver_name`='{$firstname} {$lastname}', `month`='$month' 
    WHERE id=$automobile_id;";
    if (!mysqli_query($dbConnection, $editAutoMobile)) {
        echo "<h2>Грешка при редактирането на данните!</h2>";
    }
    $editDriver = "UPDATE `drivers` SET 
    `firstname`='$firstname', `lastname`='$lastname', `city`='$city', `country`='$country' 
    WHERE id=$driver_id";
    if (!mysqli_query($dbConnection, $editDriver)) {
        echo "<h2>Грешка при редактирането на данните!</h2>";
    }
}
mysqli_close($dbConnection);
?>
<script>
    location.replace("http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/automobile_list/automobile_list.php");
</script>