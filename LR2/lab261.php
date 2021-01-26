<p> Вариант 7
<p> 
<?php
    require_once "lib/lib1.php";

    print_task();

    $N = rand(1, 10);

    $a = create_matrix($N);

    echo "<p> Исходная матрица";
    print_matrix($a, $N);

    $result = correct($a, $N);

    echo "<p> Результат: ";

    for ($c = 0; $c < $N; $c++){
        echo $result[$c].", ";
    }
?>
