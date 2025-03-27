<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="add_automobile.css">
</head>

<body>
    <form action="add.php" method="post" class="form">
        <h2>Добавете автомобил от тук</h2>
        <p class="input">
            <label>Номер</label>
            <input type="text" name="number" required>
        </p>
        <p class="input">
            <label>Тип автомобил</label>
            <select name="type">
                <option value="лек" selected>лек</option>
                <option value="товарен">товарен</option>
                <option value="автобус">автобус</option>
            </select>
        </p>
        <p class="input">
            <label>Ремарке</label>
            <div class="radio">
                <p>
                    <input type="radio" name="trailer" value="0" checked>
                    <label>Няма</label>
                </p>
                <p>
                    <input type="radio" name="trailer" value="1">
                    <label>Има</label>
                </p>
            </div>
        </p>
        <p class="input">
            <label>Брой пътници</label>
            <input type="number" name="number" required>
        </p>
        <p class="input">
            <label>Име на шофьор</label>
            <input type="text" name="number" required>
        </p>
        <p class="input">
            <label>Месец на преминаване</label>
            <input type="number" name="number" required min="1" max="12">
        </p>
        <p class="input">
            <label>Град на шофьора</label>
            <input type="text" name="number" required>
        </p>
        <p class="input">
            <label>Държава на шофьора</label>
            <input type="text" name="number" required>
        </p>
        <div class="buttons">
            <a href="../automobile_list/automobile_list.php">
                <button type="submit">Запиши</button>
            </a>
            <a href="../automobile_list/automobile_list.php">
                Отмени
            </a>
        </div>
    </form>
</body>

</html>