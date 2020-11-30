<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    // Удаление ключей этой игры
    $result = $mysqli->query("DELETE FROM film_session WHERE film_id='$id'");
    // Удаление самой игры
    $result = $mysqli->query("DELETE FROM films WHERE id='$id'");

    header("Location: films.php");
    exit;
?>