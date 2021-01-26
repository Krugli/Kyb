<p> Вариант 7
<p> 
<?php
    function F($u, $t){
        if ($u >= 0){
            if ($t >= 0){
                return ($u + $t) / $u * $t;
            }
            else{
                return $u + 2 * $t;
            }
        }
        else{
            if ($t >= 0){
                return $u * $u + $t / $u;
            }
            else{
                return ($u + $t * $t) / (pow($u, 3) * pow($t, 4));
            }
        }
    }

    $a = rand(-10, 10);
    $b = rand(-10, 10);

    echo "<p> Аргумент A = ".$a;
    echo "<p> Аргумент B = ".$b;

    $z = F($a/$b, (pow($b,8)-pow($a,7))/($b*$a)) + F((pow($a,10)-pow($b,12))/($b*$b*$a-$a), $b);

    echo "<p> Результат = ".$z;
?>
