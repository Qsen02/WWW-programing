<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="driver_info.css">
</head>

<body>
    <header>
        <p>Преминали автомобили</p>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            echo "<a href='#' class='link'>Изход</a>";
        } else {
            echo "<a href='../login/login.php' class='link'>Вход</a>";
            echo "<a href='../register/register.php' class='link'>Регистрация</a>";
        }
        ?>
    </header>
    <section class="driver-container">
        <?php
        include "../constants.php";
        $driverId = $_GET["id"];
        $sqlQuery = "SELECT * FROM drivers WHERE id=$driverId";
        $result = mysqli_query($dbConnection, $sqlQuery);
        $info = mysqli_fetch_assoc($result);
        echo "<h2>Информация за шофьор {$info["firstname"]} {$info["lastname"]}</h2>";
        echo "<p>Град: {$info["city"]}</p>";
        echo "<p>Държава: {$info["country"]}</p>";
        mysqli_close($dbConnection);
        ?>
        <a href="../automobile_list/automobile_list.php">Назад</a>
    </section>
</body>

</html>