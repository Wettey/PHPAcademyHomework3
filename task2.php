<h2>Task 2</h2>

<?php

$number = 5;

function numberFactorial($number) {
    if ($number === 0) {
        return 1;
    } else
        return $number * numberFactorial($number - 1);
}

echo numberFactorial($number);

?>
<br>
