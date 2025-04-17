<?php
include "../constants.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_GET["id"])) {
    $number = mysqli_real_escape_string($dbConnection, $_POST["number"]);
    $type = mysqli_real_escape_string($dbConnection, $_POST["type"]);
    $trailer = mysqli_real_escape_string($dbConnection, intval($_POST["trailer"]));
    $passengers = mysqli_real_escape_string($dbConnection, intval($_POST["passengers"]));
    $firstname = mysqli_real_escape_string($dbConnection, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($dbConnection, $_POST["lastname"]);
    $month = mysqli_real_escape_string($dbConnection, intval($_POST["month"]));
    $city = mysqli_real_escape_string($dbConnection, $_POST["city"]);
    $country = mysqli_real_escape_string($dbConnection, $_POST["country"]);
    $automobile_id = mysqli_real_escape_string($dbConnection, $_GET["id"]);
    $driver_id = mysqli_real_escape_string($dbConnection, $_POST["driver_id"]);
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
header("Location:../automobile_list/automobile_list.php");
?>