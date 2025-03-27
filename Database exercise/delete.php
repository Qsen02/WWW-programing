<?php
if (isset($_GET["id"])) {
	include "constants.php";
	$id = intval($_GET["id"]);
	$sql = "delete from participients where id=$id";
	if (mysqli_query($dbConnection, $sql)) {
		echo "<script>alert(\"Данните са успешно изтрити\")</script>";
	} else {
		echo "<script>alert(\"Грешка при изтриване!\")</script>";
	}
}
mysqli_close($dbConnection);
?>
<script>
	window.opener.location.reload();
	window.close();
</script>