<?php
    function print_task(){
        echo "<p> В квадратной матрице A порядка N найти сумму элементов, расположенных на главной диагонали, и произведение элементов, расположенных на побочной диагонали";
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

    function correct1($a, $N){
        $p = 1;
        // Проход по нижним диагоналям
        for ($c = $N - 1; $c > 0; $c--){
            for ($d = 0, $e = $c; $d < $N - $c; $d++, $e++){
                $p *= $a[$e][$d];
            }
        }
        // Проход по верхним диагоналям
        for ($d = 1; $d < $N; $d++){
            for ($c = 0, $e = $d; $c < $N - $d; $c++, $e++){
                $p *= $a[$c][$e];
            }
        }
        return $p;
    }

    function correct2($a, $N){
        $sum = 0;
        for ($c = 0; $c < $N; $c++){
            $sum += $a[$c][$c];
        }

        return $sum;
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