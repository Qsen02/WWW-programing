<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../add_automobile/add_automobile.css">
    <script src="../register_validation.js"></script>
    <script>
        function confirmLogout() {
            const isAccept = confirm("Сигурни ли сте, че искате да излезете от профила си?");
            if (isAccept) {
                location.replace(`http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/logout/logout.php`);
            }
        }
    </script>
    <title>Преминали автомобили</title>
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
    <form action="register.php" method="post" class="form">
        <h2>Тук можете да се регистрирате</h2>
        <p class="input">
            <label>Малко име</label>
            <input type="text" name="firstname" required>
        </p>
        </p>
        <p class="input">
            <label>Фамилия</label>
            <input type="text" name="lastname" required>
        </p>
        <p class="input">
            <label>Имейл</label>
            <input type="text" name="email" required>
        </p>
        <p class="input">
            <label>Парола</label>
            <input type="password" name="password" required>
        </p>
        <p class="input">
            <label>Повтори паролата</label>
            <input type="password" name="repass" required>
        </p>
        <div class="buttons">
            <button type="submit">Регистрация</button>
        </div>
    </form>
</body>

</html>