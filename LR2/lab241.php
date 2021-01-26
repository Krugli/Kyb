<p> Вариант 7
<p> 
<?php
    $N = rand(1,10);

    echo "<p> Изначальный массив: ";
    $a[0] = rand(10,20);
    echo $a[0];
    for ($c = 1; $c < $N; $c++){
        $a[] = rand(10,20);
        echo ", ".$a[$c];
    }

    sort($a);

    echo "<p> Результат: ";

    echo $a[0];
?>
