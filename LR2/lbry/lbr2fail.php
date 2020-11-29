<?php
    function print_task(){
        echo "<p> В матрице К(n,n) присвоить каждому диагональному элементу разность между суммами элементов соответствующих строки и столбца.";
    }

    function create_matrix($N){
        $a = array();

        for ($i = 0; $i < $N; $i++){
            for ($j = 0; $j < $N; $j++){
                $a[$i][$j] = rand(1, 10);
            }
        }

        return $a;
    }

	
    function raschet($a, $N){
          for ($i=0; $i<$N; $i++){
            $sumstr = 0;
            for ($j=0; $j<$N; $j++){
               $sumstr = $sumstr + $a[$i][$j];
            }
	    $sumstlb=0;
            for ($j=0; $j<$N; $j++){
               $sumstlb = $sumstlb + $a[$j][$i];
            }
            $razsum = $sumstr - $sumstlb;
            $a[$i][$i] = $razsum;
          }
        return $a;
   }

    function print_matrix($a, $N){
        for ($i = 0; $i < $N; $i++){
            echo "<p>| ";
            for ($j = 0; $j < $N; $j++){
                echo $a[$i][$j]."  ";
            }
        }
    }
?>


	
