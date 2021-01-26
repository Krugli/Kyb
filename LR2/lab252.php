<p> Вариант 16
<p> 
<?php
    function F($u, $t){
        if ($u <= $t){
            return (pow($u, 4) + $t) / cos($u + pi()/4);
        }
        else{
            return log(abs($u + 4)) / sqrt(abs($t-4));
        }
    }

    $a = rand(-10, 10);
    $b = rand(-10, 10);

    echo "<p> Аргумент A = ".$a;
    echo "<p> Аргумент B = ".$b;

    $z = log(F($a / $b, sin($a))) + F($b, sqrt($a + $b));

    echo "<p> Результат = ".$z;
?>
