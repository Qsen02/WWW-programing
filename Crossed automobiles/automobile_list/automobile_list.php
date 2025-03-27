<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преминали автомобили</title>
    <link rel="stylesheet" href="automobile_list.css">
</head>

<body>
    <?php
    include "../constants.php";
    $sql = "SELECT * FROM automobile";
    $result = mysqli_query($dbConnection, $sql);
    if (!$result) {
        echo "<h1>Няма автомобили все още</h1>";
    } else {
        ?>
        <h2 class="title">Списък с автомобили преминали границата.</h2>
        <div class="add">
            <p>Добави нов автомобил:</p>
            <a href="../add_automobile/add_automobile.php" class="link">+</a>
        </div>
        <section class="container">
            <section class="header">
                <div class="header-items">
                    <p>Номер</p>
                </div>
                <div class="header-items">
                    <p>Тип автомобил</p>
                </div>
                <div class="header-items">
                    <p>Ремарке</p>
                </div>
                <div class="header-items">
                    <p>Брой пътници</p>
                </div>
                <div class="header-items">
                    <p>Име на шофьор</p>
                </div>
                <div class="header-items">
                    <p>Месец на преминаване</p>
                </div>
                <div class="header-items">
                    <p>Информация за шофьор</p>
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
                                <a href='../driver_info/driver_info.php?id={$row['driver_id']}' class='link'>info</a>
                            </div>";
                    echo "</article>";
                }
    } ?>
        </section>
    </section>
</body>

</html>