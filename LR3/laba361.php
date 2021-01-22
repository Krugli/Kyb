<HTML>
    <BODY>
        <H1> Вариант 7 </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            <p>Предложение: <INPUT type="text" name="sentence" maxlength="40"></p>
            <p>Количество букв: <INPUT type="text" name="size" maxlength="40"></p>
            <p><INPUT type="submit" name="find" value="Найти"></p>
        </FORM>

        <?php
            if (isset($_POST["find"])){
                $sentence = trim($_POST["sentence"]);
                $size = trim($_POST["size"]);

                $words = explode(" ", $sentence);

                $f = false;
                foreach ($words as $word){
                    if ($size == strlen($word)){
                        $f = true;
                        break;
                    }
                }

                echo "Результат: ";

                if ($f){
                    echo $word;
                }
                else{
                    echo "Нет такого слова";
                }
            }
        ?>
    </BODY>
</HTML>
