<html>
    <head> <title> Редактирование данных о киносеансе </title> </head>
    <h2> Редактирование данных о киносеансе </h2>
    <body>
        <form action='save_edit.php' method='get'>
            <table border="0">
                <?php
                    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
                    if ($mysqli->connect_errno) {
                        echo "Не удалось подключиться к БД";
                    }

                    $id = $_GET['id'];

                    $result = $mysqli->query("SELECT show_time, film_id,
                        room_id, seats, busy_seats FROM film_session
                        WHERE id=$id"
                    );

                    if ($result && $st = $result->fetch_array()){
                        $show_time = $st['show_time'];
                        $film_id = $st['film_id'];
                        $room_id = $st['room_id'];
                        $seats = $st['seats'];
                        $busy_seats = $st['busy_seats'];
                    }

                    // Создание формы
                    print "<th> Начало показа: </th> <th><input name='show_time' size='50' type='datetime-local' clss='date' value='$show_time'></th>";
                    print "<tr><th> ID фильма: </th> <th><input name='film_id' size='50' type='text' value='$film_id'></th>";
                    print "<tr><th> ID кинозала: </th> <th><input name='room_id' size='50' type='text' value='$room_id'></th>";
                    print "<tr><th> Количество мест: </th> <th><input name='seats' size='50' type='text' value='$seats'></th>";
                    print "<tr><th> Количество занятых мест: </th> <th><input name='busy_seats' size='50' type='text' value='$busy_seats'></th>";

                    print "<input type='hidden' name='id' size='30' value='$id'>";
                ?>
            </table>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">Вернуться к списку киносеансов</button></td></p>
    </body>
</html>
