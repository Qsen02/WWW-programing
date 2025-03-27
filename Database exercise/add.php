<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$topic = $_POST["topic"];
$title = $_POST["title"];
$spec = $_POST["spec"];
$course = intval($_POST["course"]);
$virtual = intval($_POST["virtual"]);
$abstract = $_POST["abstract"];

include "constants.php";
$sql = "INSERT INTO `participients` (`id`, `firstname`, `lastname`, `topic`, `title`, `spec`, `course`, `virtual`, `abstract`) VALUES (NULL, '$firstname', '$lastname', 
'$title', '$topic','$spec', '$course', '$virtual','$abstract');";
if (mysqli_query($dbConnection, $sql)) {
	echo "<script>alert(\"Данните са успешно добавени\")</script>";
} else {
	echo "<script>alert(\"Грешка при добавяне!\")</script>";
}
mysqli_close($dbConnection);
?>
<script>
	window.opener.location.reload();
	window.close();
</script>