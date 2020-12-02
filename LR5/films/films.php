<html>
    <head> <title> Сведения об фильмах </title> </head>

    <h2>Список фильмов:</h2>
    <table border="1">
        <tr>
            <th> ID </th> <th> Название </th> <th> Жанр </th> <th> Режиссёр </th>
            <th> Год выпуска </th> <th> Кассовые сборы </th>
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

                    $counter++;

                    $release_date = date('d/m/Y', strtotime($release_date));

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$genre</td><td>$director</td><td>$release_date</td><td>$box_office</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего фильмов: $counter </p>");
        ?>

    <body>
        <h2>Добавление нового фильма</h2>
        <form action="save_new.php" method="get">
            <table border="0">
                <th> Название: </th> <th><input name='name' size='50' type='text'></th>
                <tr><th> Жанр: </th> <th><input name='genre' size='50' type='text'></th>
                <tr><th> Режиссёр: </th> <th><input name='director' size='50' type='text'></th>
                <tr><th> Год выпуска </th> <th><input name='release_date' size='50' type='date'></th>
                <tr><th> Кассовые сборы: </th> <th><input name='box_office' size='50' type='text'></th>
            </table>
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
    </body>

    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться к киносеансам</button></td>
</html>