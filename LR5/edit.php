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

                    $session_id = $_GET['id'];

                    $result = $mysqli->query("SELECT
                        show_time,
                        film_id,
                        room_id,
                        seats,
                        busy_seats
                        FROM film_session
                        WHERE id=$session_id"
                    );

                    if ($result && $st = $result->fetch_array()){
                        $show_time = $st['show_time'];
                        $film_id = $st['film_id'];
                        $room_id = $st['room_id'];
                        $seats = $st['seats'];
                        $busy_seats = $st['busy_seats'];
                    }

                    $date = date("Y-m-d\TH:i",strtotime($show_time));

                    // Создание формы
                    print "<th> Начало показа: </th> <th><input name='show_time' type='datetime-local' value='$date'></th>";

                    echo "<tr><th>Фильм: </th><th><select name='film_id'>";
                    $result = $mysqli->query("SELECT id, name FROM films WHERE id=$film_id");
                    if ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];
                        echo "<option selected value='$id'>$name</option>";
                    }

                    $result = $mysqli->query("SELECT id, name FROM films WHERE id<>$film_id");
                    if ($result){
                        while ($row = $result->fetch_array()){
                            $id = $row['id'];
                            $name = $row['name'];

                            echo "<option value='$id'>$name</option>";
                        }
                    }
                    echo "</select></th>";

                    echo "<tr><th>Кинозал: </th><th><select name='room_id'>";

                    $result = $mysqli->query("SELECT id, name FROM rooms WHERE id=$room_id");
                    if ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];
                        echo "<option selected value='$id'>$name</option>";
                    }
                    
                    $result = $mysqli->query("SELECT id, name FROM films WHERE id<>$room_id");
                    if ($result){
                        while ($row = $result->fetch_array()){
                            $id = $row['id'];
                            $name = $row['name'];

                            echo "<option value='$id'>$name</option>";
                        }
                    }
                    echo "</select></th>";

                    print "<tr><th> Количество мест: </th> <th><input name='seats' size='50' type='text' value='$seats'></th>";
                    print "<tr><th> Количество занятых мест: </th> <th><input name='busy_seats' size='50' type='text' value='$busy_seats'></th>";

                    print "<input type='hidden' name='id' size='30' value='$session_id'>";
                ?>
            </table>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">Вернуться к списку киносеансов</button></td></p>
    </body>
</html>
