<?php
$rows = (int)explode(": ", readline())[1];
$even = 1;
$odd = 0;

for ($row = 1; $row <= $rows; $row++) {
    $data = explode("-", readline());
    $num = $data[0] - $data[1] - $data[2] - $data[3] - $data[4];//array_sum(array_slice($data, 2));
    echo $num . "\n";
}
?>