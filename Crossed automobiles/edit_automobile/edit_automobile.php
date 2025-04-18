<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="../add_automobile/add_automobile.css">
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
    <?php
    include "../constants.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["id"])) {
        $automobile_id = intval($_GET["id"]);
        $sql = "SELECT * FROM automobile AS a JOIN drivers AS d ON a.driver_id=d.id WHERE a.id=$automobile_id;";
        $result = mysqli_query($dbConnection, $sql);
        if (!$result) {
            echo "<h2>Грешка при получаването на данни!</h2>";
        } else {
            $automobile = mysqli_fetch_assoc($result);
            ?>
            <header>
                <p>Преминали автомобили</p>
                <?php
                session_start();
                if (isset($_SESSION["user"])) {
                    echo "<a href='javascript:void(0)' onclick='confirmLogout()' class='link'>Изход</a>";
                } else {
                    echo "<a href='../login/login.php' class='link'>Вход</a>";
                    echo "<a href='../register/register.php' class='link'>Регистрация</a>";
                }
                ?>
            </header>
            <form action=<?php echo "edit.php?id={$automobile['id']}"; ?> method="post" class="form">
                <h2>Добавете автомобил от тук</h2>
                <p class="input">
                    <label>Номер</label>
                    <input type="text" name="number" value=<?php echo $automobile['number']; ?>>
                </p>
                <p class="input">
                    <label>Тип автомобил</label>
                    <select name="type">
                        <option value="лек" <?php if ($automobile["type"] == "лек")
                            echo "selected";
                        else
                            echo ""; ?>>лек</option>
                        <option value="товарен" <?php if ($automobile["type"] == "товарен")
                            echo "selected";
                        else
                            echo ""; ?>>
                            товарен</option>
                        <option value="автобус" <?php if ($automobile["type"] == "автобус")
                            echo "selected";
                        else
                            echo ""; ?>>
                            автобус</option>
                    </select>
                </p>
                <p class="input">
                    <label>Ремарке</label>
                <div class="radio">
                    <p>
                        <input type="radio" name="trailer" value="0" <?php if (intval($automobile["trailer"] == 0))
                            echo "checked";
                        else
                            echo ""; ?>>
                        <label>Няма</label>
                    </p>
                    <p>
                        <input type="radio" name="trailer" value="1" <?php if (intval($automobile["trailer"] == 1))
                            echo "checked";
                        else
                            echo ""; ?>>
                        <label>Има</label>
                    </p>
                </div>
                </p>
                <p class="input">
                    <label>Брой пътници</label>
                    <input type="number" name="passengers" value=<?php echo $automobile['passengers']; ?>>
                </p>
                <p class="input">
                    <label>Малкото име на шофьора</label>
                    <input type="text" name="firstname" value=<?php echo $automobile['firstname']; ?>>
                </p>
                <p class="input">
                    <label>Фамилия на шофьора</label>
                    <input type="text" name="lastname" value=<?php echo $automobile['lastname']; ?>>
                </p>
                <p class="input">
                    <label>Месец на преминаване</label>
                    <input type="number" name="month" value=<?php echo $automobile['month']; ?> min="1" max="12">
                </p>
                <p class="input">
                    <label>Град на шофьора</label>
                    <input type="text" name="city" value=<?php echo $automobile['city']; ?>>
                </p>
                <p class="input">
                    <label>Държава на шофьора</label>
                    <input type="text" name="country" value=<?php echo $automobile['country']; ?>>
                </p>
                <div class="buttons">
                    <button type="submit">Запиши</button>
                    <a href="../automobile_list/automobile_list.php">
                        Отмени
                    </a>
                </div>
                <input type="hidden" name="driver_id" value=<?php echo $automobile["driver_id"] ?>>
            </form>
            <?php
            mysqli_close($dbConnection);
        }
    }
    ?>
</body>

</html>