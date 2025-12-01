<?php
for ($k = 10; $k < 100; $k++) {
    $d1 = intval($k / 10);
    $d2 = intval($k % 10);

    $sum = $d1 + $d2;
    $product = $d1 * $d2;
        if ($sum + $product == $k) {
            echo "$k\n";
        }
    }
?>