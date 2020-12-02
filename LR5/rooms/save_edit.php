<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $name = $_GET['name'];
    $category = $_GET['category'];

    $result = $mysqli->query("UPDATE rooms SET name='$name', category='$category' WHERE id='$id'");

    header("Location: rooms.php");
    exit;
?>