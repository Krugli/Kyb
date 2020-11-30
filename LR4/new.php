<html>
    <head> <title> Добавление нового фильма </title> </head>
    <body>
        <H2>Добавление нового фильма:</H2>
        <form action="save_new.php" metod="get">
            Название: <input name="name" size="50" type="text">
            <br>Жанр: <input name="genre" size="20" type="text">
            <br>Режиссёр: <input name="director" size="20" type="text">
            <br>Год выпуска: <input name="release_date" size="30" type="date">
            <br>Кассовые сборы: <input name="box_office" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p> <a href="index.php"> Вернуться к списку фильмов </a> </p>
    </body>
</html>