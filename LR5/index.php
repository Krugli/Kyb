<html>
    <head> <title> Киносеансы </title> </head>

    <!-- Фильмы (id, Название, жанр, режиссёр, год выпуска, кассовые сборы);
        2.1. Кинозалы (id, название зала, категория)

        2.2. Киносеансы (id, дата и время начала показа фильма,
        id фильма, id кинозала, количество мест, количество занятых мест).
        Поля id фильма и id кинозала являются внешними ключами. При этом в одном кинозале может быть несколько киносеансов
        одного и того же фильма.

        2.3. При удалении кинозала или кинофильма удаляются все записи с этими внешними
        ключами из таблицы Киносеансы.

        2.4. Киносеансы (№ п/п, Название фильма, жанр, год выпуска, название зала,
        категория, дата и время начала показа, количество свободных мест)
    -->

    <h2>Ссылки</h2>
    <ul id="nav">
        <li><a href="films/films.php">Список фильмов</a>
        <li><a href="rooms/rooms.php">Список кинозалов</a>
    </ul>

    <h2> Список киносеансов: </h2>
    <table border="1">
        <tr>
            <th> ID </th> <th> Начало показа </th> <th> Фильм </th> <th> Кинозал </th>
            <th> Количество мест </th> <th> Количество занятых мест </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $result = $mysqli->query("SELECT
                film_session.id,
                film_session.show_time,
                film_session.seats,
                film_session.busy_seats,

                films.name as film,
                rooms.name as room
                FROM film_session
                LEFT JOIN films ON film_session.film_id=films.id
                LEFT JOIN rooms ON film_session.room_id=rooms.id"
            );

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $show_time = $row['show_time'];
                    $film = $row['film'];
                    $room = $row['room'];
                    $seats = $row['seats'];
                    $busy_seats = $row['busy_seats'];

                    $show_time = date("h:i - d/m/Y", strtotime($show_time));

                    echo "<tr>";
                    echo "<td>$id</td><td>$show_time</td><td>$film</td><td>$room</td><td>$seats</td><td>$busy_seats</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего фильмов: $counter </p>");
        ?>

    <button onclick="window.location.href='gen_pdf.php'">PDF-версия таблицы</button>
    <button onclick="window.location.href='gen_xls.php'">XML-версия таблицы</button>

    <body>
        <h2>Добавление нового киносеанса</h2>
        <form action="save_new.php" method="get">
            <table border="0">
                <tr><th> Начало показа:</th><th> <input type="datetime-local" class="date" name="show_time"></th>

                <?php
                    $result = $mysqli->query("SELECT id, name FROM films");
                    echo "<tr><th>Фильм: </th><th><select name='film_id'>";

                    if ($result){
                        while ($row = $result->fetch_array()){
                            $id = $row['id'];
                            $name = $row['name'];

                            echo "<option value='$id'>$name</option>";
                        }
                    }
                    echo "</select></th>";

                    $result = $mysqli->query("SELECT id, name FROM rooms");
                    echo "<tr><th>Кинозал: </th><th><select name='room_id'>";

                    if ($result){
                        while ($row = $result->fetch_array()){
                            $id = $row['id'];
                            $name = $row['name'];

                            echo "<option value='$id'>$name</option>";
                        }
                    }
                    echo "</select></th>";
                ?>
                <tr><th> Количество мест: </th> <th><input name='seats' size='50' type='text'></th>
                <tr><th> Количество занятых мест: </th> <th><input name='busy_seats' size='50' type='text'></th>
            </table>
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
    </body>
</html>
