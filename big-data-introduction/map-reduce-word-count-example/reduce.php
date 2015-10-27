<?php

$total = [];

while(($line = fgets(STDIN)) !== false) {
    list($word, $count) = explode("\t", $line);
    
    if (isset($total[$word])) {
       $total[$word] += $count;
    } else {
        $total[$word] = $count;
    }
}

ksort($total);

foreach($total as $word => $count) {
    echo sprintf("%s\t%d".PHP_EOL, $word, $count);
}