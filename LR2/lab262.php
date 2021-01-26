<p> Вариант 16
<p> 
<?php
    require_once "lib/lib2.php";

    print_task();

    $N = rand(1, 10);
    $a = create_matrix($N);

    echo "<p> Исходная матрица";
    print_matrix($a, $N);

    $p = correct1($a, $N);

    $sum = correct2($a, $N);

    echo "<p> Сумма: ". $sum;
    echo "<p> Произведение: ". $p;
?>
