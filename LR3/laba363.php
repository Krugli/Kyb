<HTML>
    <BODY>
        <H1> Вариант 16 </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            <p>Предложение: <INPUT type="text" name="sentence" maxlength="40"></p>
            <p><INPUT type="submit" name="count" value="Перемешать"></p>
        </FORM>

        <?php
            if (isset($_POST["count"])){
                $sentence = trim($_POST["sentence"]);

                $words = explode(" ", $sentence);

                echo "Новое предложение: ";

                for ($c = count($words)-1; $c >= 0; $c--){
                    echo $words[$c].' ';
                }
            }
        ?>
    </BODY>
</HTML
