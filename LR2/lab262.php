<p> Вариант 2
<p> 
<?php
    require_once "lbry/lbr2.php";

    print_task();

    $N = rand(1, 10);
    $a = create_matrix($N);

    echo "<p> Исходная матрица";
    print_matrix($a, $N);

    $sum = correct($a, $N);

    echo "<p> Результат: ". $sum;
?>
