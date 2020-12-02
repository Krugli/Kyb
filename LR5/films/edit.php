<html>
    <head> <title> Редактирование данных о фильме </title> </head>
    <body>
        <h2> Редактирование данных о фильме </h2>
        <form action='save_edit.php' method='get'>
            <table border="0">
                <?php
                    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
                    if ($mysqli->connect_errno) {
                        echo "Не удалось подключиться к БД";
                    }

                    $id = $_GET['id'];

                    $result = $mysqli->query("SELECT name, genre, director, release_date, box_office FROM films WHERE id='$id'");

                    if ($result && $st = $result->fetch_array()){
                        $name = $st['name'];
                        $genre = $st['genre'];
                        $director = $st['director'];
                        $release_date = $st['release_date'];
                        $box_office = $st['box_office'];
                    }

                    print "<th> Название: </th> <th><input name='name' size='50' type='text' value='$name'></th>";
                    print "<tr><th> Жанр: </th> <th><input name='genre' size='50' type='text' value='$genre'></th>";
                    print "<tr><th> Режиссёр: </th> <th><input name='director' size='50' type='text' value='$director'></th>";
                    print "<tr><th> Год выпуска: </th> <th><input name='release_date' size='50' type='date' value='$release_date'></th>";
                    print "<tr><th> Кассовые сборы: </th> <th><input name='box_office' size='50' type='text' value='$box_office'></th>";
                    print "<input type='hidden' name='id' size='30' value='$id'>";
                ?>
            </table>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='films.php'">Вернуться к списку фильмов</button></p>
    </body>
</html>