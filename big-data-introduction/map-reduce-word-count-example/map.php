<?php

while(($line = fgets(STDIN)) !== false) {
    $words = explode(' ', trim($line));
    
    foreach($words as $word) {
        $word = mb_strtolower(str_replace(['.', ','], '', $word));
        echo sprintf("%s\t%d".PHP_EOL, $word, 1);
    }
}