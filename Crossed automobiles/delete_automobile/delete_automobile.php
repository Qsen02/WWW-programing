<?php
    include "../constants.php";
    if (isset($_GET["id"])) {
        $automobile_id = $_GET["id"];
        $deleteQuery = "DELETE FROM automobile WHERE id={$automobile_id};";
        if (!mysqli_query($dbConnection, $deleteQuery)) {
            echo "<h2 align='center'>Грешка при изтриването на данните!</h2>";
        }
    }else{
        echo "<h2 align='center'>Липсва id за изтриване!</h2>";
    }
    mysqli_close($dbConnection);
?>
<script>
    location.replace("http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/automobile_list/automobile_list.php");
</script>