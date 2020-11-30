<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];
    // Удаление ключей из этого магазина
    $result = $mysqli->query("DELETE FROM film_session WHERE room_id='$id'");
    // Удаление самого магазина
    $result = $mysqli->query("DELETE FROM rooms WHERE id='$id'");

    header("Location: rooms.php");
    exit;
?>