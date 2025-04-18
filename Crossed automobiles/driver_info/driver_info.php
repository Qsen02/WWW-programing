<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="driver_info.css">
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