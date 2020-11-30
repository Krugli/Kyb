<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $show_time = $_GET['show_time'];
    $film_id = $_GET['film_id'];
    $room_id = $_GET['room_id'];
    $seats = $_GET['seats'];
    $busy_seats = $_GET['busy_seats'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO film_session
        SET
        show_time='$show_time',
        film_id='$film_id',
        room_id='$room_id',
        seats='$seats',
        busy_seats='$busy_seats'"
    );

    header("Location: films.php");
    exit;
?>