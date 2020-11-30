<html>
    <head> <title> Редактирование данных о кинозалов </title> </head>
    <body>
        <h2>Список кинозалов:</h2>
        <form action='save_edit.php' method='get'>
            <table border="0">
                <?php
                    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
                    if ($mysqli->connect_errno) {
                        echo "Не удалось подключиться к БД";
                    }

                    $id = $_GET['id'];

                    $result = $mysqli->query("SELECT name, category FROM rooms WHERE id='$id'");

                    if ($result){
                        while ($st = $result->fetch_array()) {
                            $name = $st['name'];
                            $category = $st['category'];
                        }
                    }

                    print "<th> Название: </th> <th><input name='name' size='50' type='text' value='$name'></th>";
                    print "<th> Категория: </th> <th><input name='category' size='50' type='text' value='$category'></th>";
                    print "<input type='hidden' name='id' size='30' value='$id'>";
                ?>
            </table>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='rooms.php'">Вернуться к списку кинозалов</button></td></p>
    </body>
</html>