<html>

<head>
	<meta charset="utf-8">
	<title>Database exercise</title>
</head>

<body>
	<?php
	include "constants.php";
	if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["id"])) {
		$id = intval($_GET["id"]);
		$sql = "select * from participients where id=$id";
		$result = mysqli_query($dbConnection, $sql);
		if (!$result) {
			echo "Не е намерен такъв участник";
		} else {
			$row = mysqli_fetch_assoc($result);
			?>
			<h2>Регистрация на участник</h2>
			<form action="" method="post">
				Име: <input type="text" name="firstname" value="<?php echo $row["firstname"]; ?>"><br>
				Фамилия:<input type="text" name="lastname" value="<?php echo $row["lastname"]; ?>"><br>
				Тема: <input type="text" name="topic" value="<?php echo $row["topic"]; ?>"><br>
				Заглавие: <input type="text" name="title" value="<?php echo $row["title"]; ?>"><br>
				Специалност: <input type="text" name="spec" value="<?php echo $row["spec"]; ?>"><br>
				Курс: <input type="number" name="course" min="1" max="5" value="<?php echo $row["course"]; ?>"><br>
				Начин на представяне: <br>
				Присъствено:<input type="radio" name="virtual" value="0" <?php if ($row["virtual"] == 0)
					echo "checked";
				else
					echo ""; ?>><br>
				Онлайн:<input type="radio" name="virtual" value="1" <?php if ($row["virtual"] == 1)
					echo "checked";
				else
					echo ""; ?>><br>
				Резюме: <textarea type="text" name="abstract" row="5" col="30"><?php echo $row["abstract"]; ?></textarea><br>
				<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
				<input type="submit" name="submit" value="Запиши">
				<input type="reset" name="submit" value="Изтрий">
			</form>
			<?php
		}
	} else {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$topic = $_POST["topic"];
		$title = $_POST["title"];
		$spec = $_POST["spec"];
		$course = intval($_POST["course"]);
		$virtual = intval($_POST["virtual"]);
		$abstract = $_POST["abstract"];
		$id = $_POST["id"];
		$sql = "UPDATE `participients` SET `firstname` = '$firstname', 
		`lastname` = '$lastname', `topic` = '$topic', `title` = '$title', 
		`spec` = '$spec', `course` = '$course', `virtual` = '$virtual', `abstract` = '$abstract' 
		WHERE `participients`.`id` = '$id';";
		if (mysqli_query($dbConnection, $sql)) {
			echo "<script>alert(\"Данните са успешно редактирани\")</script>";
		} else {
			echo "<script>alert(\"Грешка при редактирането!\")</script>";
		}
		mysqli_close($dbConnection);
		?>
		<script>
			window.opener.location.reload();
			window.close();
		</script>
	<?php } ?>
</body>

</html>