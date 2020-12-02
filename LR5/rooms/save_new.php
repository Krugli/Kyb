<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $category = $_GET['category'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO rooms SET name='$name', category='$category'");

    header("Location: rooms.php");
    exit;
?>