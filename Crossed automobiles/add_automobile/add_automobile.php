<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="add_automobile.css">
    <script src="../automobile_validation.js"></script>
    <script>
        function confirmLogout() {
            const isAccept = confirm("Сигурни ли сте, че искате да излезете от профила си?");
            if (isAccept) {
                location.replace(`http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/logout/logout.php`);
            }
        }
    </script>
</head>

<body>
    <header>
        <p>Преминали автомобили</p>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            echo "<a href='javascript:void(0)' onclick='confirmLogout()' class='link'>Изход</a>";
        } else {
            echo "<a href='../login/login_form.php' class='link'>Вход</a>";
            echo "<a href='../register/register_form.php' class='link'>Регистрация</a>";
        }
        ?>
    </header>
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
            <input type="number" name="passengers" required>
        </p>
        <p class="input">
            <label>Малкото име на шофьора</label>
            <input type="text" name="firstname" required>
        </p>
        <p class="input">
            <label>Фамилия на шофьора</label>
            <input type="text" name="lastname" required>
        </p>
        <p class="input">
            <label>Месец на преминаване</label>
            <input type="number" name="month" required min="1" max="12">
        </p>
        <p class="input">
            <label>Град на шофьора</label>
            <input type="text" name="city" required>
        </p>
        <p class="input">
            <label>Държава на шофьора</label>
            <input type="text" name="country" required>
        </p>
        <div class="buttons">
            <button type="submit">Запиши</button>
            <a href="../automobile_list/automobile_list.php">
                Отмени
            </a>
        </div>
    </form>
</body>

</html>