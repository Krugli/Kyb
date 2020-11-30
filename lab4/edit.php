<html>
    <head> <title> Редактирование данных о фильме </title> </head>
    <body>
        <form action='save_edit.php' metod='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT name, genre, director, release_date, box_office FROM films WHERE id='$id'");

                if ($result){
                    while ($st = $result->fetch_array()) {
                        $name = $st['name'];
                        $genre = $st['genre'];
                        $director = $st['director'];
                        $release_date = $st['release_date'];
                        $box_office = $st['box_office'];
                    }
                }

                print "Название: <input name='name' size='50' type='text' value='$name'>";
                print "<br>Жанр: <input name='genre' size='20' type='text' value='$genre'>";
                print "<br>Режиссёр: <input name='director' size='20' type='text' value='$director'>";
                print "<br>Тип: <input name='release_date' size='30' type='date' value='$release_date'>";
                print "<br>Диаметр: <input type='text' name='box_office' size='20' value='$box_office'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <input type='submit' name='save' value='Сохранить'>
        </form>
        <p><a href='index.php'> Вернуться к списку фильмов </a>
    </body>
</html>