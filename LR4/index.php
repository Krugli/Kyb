<html>
    <head> <title> Сведения о фильмах </title> </head>

    <!-- Фильмы (Название, жанр, режиссёр, год выпуска, кассовые сборы) -->

    <h2>Список фильмов:</h2>
    <table border="1">
        <tr>
            <th> Название </th> <th> Жанр </th> <th> Режиссёр </th>
            <th> Год выпуска </th> <th> Кассовые сборы </th> <th> Редактировать </th> <th> Уничтожить </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $result = $mysqli->query("SELECT id, name, genre, director, release_date, box_office FROM films");

            $counter=0;

            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $genre = $row['genre'];
                    $director = $row['director'];
                    $release_date = $row['release_date'];
                    $box_office = $row['box_office'];

                    $release_date = date('d.m.Y', strtotime($release_date));

                    $counter++;

                    echo "<tr>";
                    echo "<td>$name</td><td>$genre</td><td>$director</td><td>$release_date</td><td>$box_office</td>";
                    echo "<td><a href='edit.php?id=$id'>Редактировать</a></td>";
                    echo "<td><a href='delete.php?id=$id'>Удалить</a></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего фильмов: $counter </p>");
        ?>
        <p> <a href='new.php'> Добавить фильм </a> </p>
</html>