<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }
    $name = $_GET['name'];
    $genre = $_GET['genre'];
    $director = $_GET['director'];
    $release_date = $_GET['release_date'];
    $box_office = $_GET['box_office'];

    $result = $mysqli->query("INSERT INTO films
        SET name='$name', genre='$genre', director='$director',
        release_date='$release_date', box_office='$box_office'"
    );

    if ($result){
        print "<p>Вы успешно внесли фильм в базу данных.";
    }
    else{
        print "Ошибка сохранения.";
    }
?>
<a href='index.php'> Вернуться к списку фильмов </a>