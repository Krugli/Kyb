<p> Вариант 16
<p> 
<?php
    $N = rand(1,10); // Размер массива

    echo "Изначальный массив: ";
    $a[0] = rand(-10,10);
    echo $a[0];
    for ($c = 1; $c < $N; $c++){
        $a[] = rand(-10,10);
        echo ", ".$a[$c];
    }

    for ($c = 0; $c < ($N-1) / 2; $c++){
        $tmp = $a[2*$c+1];
        $a[2*$c+1] = $a[2*$c];
        $a[2*$c] = $tmp;
    }

    echo "<p> Новый массив: ";
    echo $a[0];
    for ($c = 1; $c < $N; $c++){
        echo ", ".$a[$c];
    }
?>
