<html>

<head>
	<meta charset="utf-8">
	<title>Database exercise</title>
	<script LANGUAGE="JavaScript" TYPE="text/JavaScript">
		function popupWin(url) {
			myWindow = window.open(url, 'mywin', 'width=450,height=350')
		}
	</script>
</head>

<body>
	<h2 align="center">Регистрирани участници</h2>
	<?php
	include "constants.php";
	$sql = "select * from participients";
	$result = mysqli_query($dbConnection, $sql);
	if (!$result) {
		echo "Няма регистрирани участници все още";
	} else {
		?>
		<table align="center" border="1">
			<tr>
				<th>Номер</th>
				<th>Име</th>
				<th>Фамилия</th>
				<th>Заглавие</th>
				<th>Тема</th>
				<th>Спецеиалност</th>
				<th>Курс</th>
				<th>Вид участие</th>
				<th>Резюме</th>
				<th>Изтриване</th>
				<th>Редакция</th>
			</tr>
			<?php
			$count = 1;
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>{$count}</td>";
				echo "<td>{$row["firstname"]}</td>";
				echo "<td>{$row["lastname"]}</td>";
				echo "<td>{$row["title"]}</td>";
				echo "<td>{$row["topic"]}</td>";
				echo "<td>{$row["spec"]}</td>";
				echo "<td>{$row["course"]}</td>";
				if ($row["virtual"] == 0) {
					echo "<td>Присъствено</td>";
				} else {
					echo "<td>Онлайн</td>";
				}
				echo "<td>{$row["abstract"]}</td>";
				echo "<td><a onclick=\"return confirm('Желаете ли да изтриете участника?')\" href=\"JavaScript:popupWin('delete.php?id={$row["id"]}')\">Изтрий</a></td>";
				echo "<td><a href=\"JavaScript:popupWin('edit.php?id={$row["id"]}')\">Редактирай</a></td>";
				echo "</tr>";
				$count++;
			}
			mysqli_close($dbConnection);
	}
	?>
	</table>
	<a href="JavaScript:popupWin('form.php')">Добавяне на нов участник</a>
</body>

</html>