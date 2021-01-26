<?php
    function print_task(){
        echo "<p> Найти среднее арифметическое элементов каждой строки матрицы Q(n,m).";
    }

    function create_matrix($N){
        $a = array();

        for ($c = 0; $c < $N; $c++){
            for ($d = 0; $d < $N; $d++){
                $a[$c][$d] = rand(-10, 10);
            }
        }

        return $a;
    }

    function correct($a, $N){
        for ($c = 0; $c < $N; $c++){
            $sum = 0;
            for ($d = 0; $d < $N; $d++){
                $sum += $a[$c][$d];
            }
            $sums[] = $sum/$N;
        }

        return $sums;
    }

    function print_matrix($a, $N){
        for ($c = 0; $c < $N; $c++){
            echo "<p>| ";
            for ($d = 0; $d < $N; $d++){
                echo $a[$c][$d]." | ";
            }
        }
    }
?>