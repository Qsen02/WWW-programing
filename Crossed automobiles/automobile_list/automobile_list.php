<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="automobile_list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        function confirmDeletion(id, driver_id) {
            const isAccept = confirm("Сигурни ли сте, че искате да изтриете този автомобил?");
            if (isAccept) {
                location.replace(`http://localhost/WWW%20%d0%bf%d1%80%d0%be%d0%b3%d1%80%d0%b0%d0%bc%d0%b8%d1%80%d0%b0%d0%bd%d0%b5/Crossed%20automobiles/delete_automobile/delete_automobile.php?id=${id}&driver_id=${driver_id}`);
            }
        }
    </script>
</head>

<body>
    <?php
    include "../constants.php";
    $sql = "";
    if (!isset($_GET["query"])) {
        $sql = "SELECT * FROM automobile ORDER BY number ASC";
    } else {
        $sql = "SELECT * FROM automobile ORDER BY {$_GET["query"]} ASC";
    }
    $result = mysqli_query($dbConnection, $sql);
    session_start();
    if (!$result) {
        echo "<h2 align='center'>Няма автомобили все още</h2>";
    } else {
        ?>
        <header>
            <p>Преминали автомобили</p>
            <?php
            if($_SESSION["user"]){
                echo "<a href='#' class='link'>Изход</a>";
            }else{
                echo "<a href='../login/login.html' class='link'>Вход</a>";
                echo "<a href='../register/register.html' class='link'>Регистрация</a>";
            } 
            ?>
        </header>
        <h2 class="title">Списък с автомобили преминали границата.</h2>
        <div class="add">
            <p>Добави нов автомобил:</p>
            <a href="../add_automobile/add_automobile.php" class="link"><i class="fa-solid fa-plus"></i></a>
        </div>
        <section class="container">
            <section class="header">
                <div class="header-items">
                    <p>Номер</p>
                    <a href="./automobile_list.php?query=number" class=<?php if (!isset($_GET["query"]) || $_GET["query"] == "number")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Тип автомобил</p>
                    <a href="./automobile_list.php?query=type" class=<?php if (isset($_GET["query"]) && $_GET["query"] == "type")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Ремарке</p>
                    <a href="./automobile_list.php?query=trailer" class=<?php if (isset($_GET["query"]) && $_GET["query"] == "trailer")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Брой пътници</p>
                    <a href="./automobile_list.php?query=passengers" class=<?php if (isset($_GET["query"]) && $_GET["query"] == "passengers")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Име на шофьор</p>
                    <a href="./automobile_list.php?query=driver_name" class=<?php if (isset($_GET["query"]) && $_GET["query"] == "driver_name")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Месец на преминаване</p>
                    <a href="./automobile_list.php?query=month" class=<?php if (isset($_GET["query"]) && $_GET["query"] == "month")
                        echo "active";
                    else
                        echo "link"; ?>>
                        <i class="fa-solid fa-sort"></i>
                    </a>
                </div>
                <div class="header-items">
                    <p>Опции за шофьор</p>
                </div>
            </section>
            <section class="body">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<article class='body-row'>";
                    echo "<div class='body-data'>
                                <p>{$row["number"]}</p>
                            </div>";
                    echo "<div class='body-data'>
                                <p>{$row["type"]}</p>
                            </div>";
                    if (intval($row["trailer"]) == 0) {
                        echo "<div class='body-data'>
                                    <p>Няма</p>
                                </div>";
                    } else {
                        echo "<div class='body-data'>
                                    <p>Има</p>
                                </div>";
                    }
                    echo "<div class='body-data'>
                                <p>{$row["passengers"]}</p>
                            </div>";
                    echo "<div class='body-data'>
                                <p>{$row["driver_name"]}</p>
                            </div>";
                    echo "<div class='body-data'>
                                <p>{$row["month"]}</p>
                            </div>";
                    echo "<div class='body-data'>
                                <a href='../driver_info/driver_info.php?id={$row['driver_id']}' class='link'><i class='fa-solid fa-info'></i></a>
                                <a  href='javascript:void(0);' onclick='confirmDeletion({$row['id']},{$row['driver_id']})' class='link'><i class='fa-solid fa-trash'></i></a>
                                <a href='../edit_automobile/edit_automobile.php?id={$row['id']}' class='link'><i class='fa-solid fa-pen-to-square'></i></a>
                            </div>";
                    echo "</article>";
                }
                mysqli_close($dbConnection);
    } ?>
        </section>
    </section>
</body>

</html>