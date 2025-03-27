<html>

<head>
	<meta charset="utf-8">
	<title>Database exercise</title>
</head>

<body>
	<h2>Регистрация на участник</h2>
	<form action="add.php" method="post">
		Име: <input type="text" name="firstname"><br>
		Фамилия:<input type="text" name="lastname"><br>
		Тема: <input type="text" name="topic"><br>
		Заглавие: <input type="text" name="title"><br>
		Специалност: <input type="text" name="spec"><br>
		Курс: <input type="number" name="course" min="1" max="5" value="1"><br>
		Начин на представяне: <br>
		Присъствено:<input type="radio" name="virtual" checked value="0"><br>
		Онлайн:<input type="radio" name="virtual" value="1"><br>
		Резюме: <textarea type="text" name="abstract" row="5" col="30"></textarea><br>
		<input type="submit" name="submit" value="Запиши">
		<input type="reset" name="submit" value="Изтрий">
	</form>
</body>

</html>