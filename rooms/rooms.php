<html>
    <head> <title> Сведения о кинозалах </title> </head>

    <h2>Список кинозалов:</h2>
    <table border="1">
        <tr>
            <th> ID </th><th> Название </th> <th> Категория </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, name, category FROM rooms");

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $category = $row['category'];

                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$category</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего кинозалов: $counter </p>");
        ?>

    <body>
        <h2>Добавление нового кинозала</h2>
        <form action="save_new.php" metod="get">
            <table border="0">
                <th> Название: </th> <th><input name='name' size='50' type='text'></th>
                <tr><th> Категория: </th> <th><input name='category' size='50' type='text'></th>
            </table>
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
    </body>

    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться к киносеансам</button></td>
</html>