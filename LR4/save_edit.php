<html>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $id = $_GET['id'];

            $name = $_GET['name'];
            $genre = $_GET['genre'];
            $director = $_GET['director'];
            $release_date = $_GET['release_date'];
            $box_office = $_GET['box_office'];

            $result = $mysqli->query("UPDATE films
                SET name='$name', genre='$genre', director='$director',
                release_date='$release_date', box_office='$box_office'
                WHERE id='$id'"
            );

            if ($result){
                echo 'Все сохранено.';
            }
            else{
                echo 'Ошибка сохранения.';
            }
        ?>
        <a href="index.php"> Вернуться к списку фильмов</a>
    </body>
</html>