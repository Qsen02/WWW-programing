<?php
include "../constants.php";
header("Content-Type: application/json");
$sql = "SELECT a.number,d.firstname,d.lastname,d.city,d.country 
        FROM `automobile` AS a 
        JOIN `drivers` AS d ON a.driver_id=d.id 
        ORDER BY d.firstname ASC";
if (!$result = mysqli_query($dbConnection, $sql)) {
    echo json_encode("Грешка при взимането на шофьорите!");
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = ["message" => "Няма намерени записи"];
}
mysqli_close($dbConnection);
echo json_encode($data);
?>