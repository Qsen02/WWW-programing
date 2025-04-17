<?php
    include "../constants.php";
    if (isset($_GET["id"])) {
        $automobile_id = $_GET["id"];
        $driver_id= $_GET["driver_id"];
        $deleteAutomobileQuery = "DELETE FROM automobile WHERE id={$automobile_id};";
        if (!mysqli_query($dbConnection, $deleteAutomobileQuery)) {
            echo "<h2 align='center'>Грешка при изтриването на данните!</h2>";
        }
        $deleteDriverQuery = "DELETE FROM drivers WHERE id={$driver_id};";
        if (!mysqli_query($dbConnection, $deleteDriverQuery)) {
            echo "<h2 align='center'>Грешка при изтриването на данните!</h2>";
        }
    }else{
        echo "<h2 align='center'>Липсва id за изтриване!</h2>";
    }
    mysqli_close($dbConnection);
    header("Location:../automobile_list/automobile_list.php");
?>
