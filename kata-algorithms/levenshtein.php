<?php

// Levenshtein distance:
// https://en.wikipedia.org/wiki/Levenshtein_distance

// Internal implementation in PHP (does not support for utf8 string)
// http://php.net/manual/en/function.levenshtein.php

function distance($word1, $word2) {
    if ($word1 === $word2) {
        return 0;
    }
    
    $word1len = mb_strlen($word1);
    $word2len = mb_strlen($word2);
    
    if (!$word1len) return $word2len;
    if (!$word2len) return $word1len;
    
    $distance = [];
    
    for ($i = 0; $i <= $word1len; $i++) $distance[$i][0] = $i;
    for ($j = 0; $j <= $word2len; $j++) $distance[0][$j] = $j;
    
    for ($i = 1; $i <= $word1len; $i++) {
        for($j = 1; $j <= $word2len; $j++) {
            $cost = mb_substr($word1, $i - 1, 1) === mb_substr($word2, $j - 1, 1) ? 0 : 1;
            $distance[$i][$j] = min(
                $distance[$i - 1][$j] + 1,
                $distance[$i][$j - 1] + 1,
                $distance[$i - 1][$j - 1] + $cost
            );
        }
    }
    
    return $distance[$word1len][$word2len];
}

$data = [
    ['', '', 0],
    ['kot', '', 3],
    ['', 'pies', 4],
    ['ptak', 'ptak', 0],
    ['granat', 'granit', 1],
    ['orczyk', 'oracz', 3],
    ['marka', 'ariada', 4],
    ['łabądź', 'łabędź', 1],
    ['łabądź', 'łabędz', 2],
    ['gęś', 'kęs', 2]

];

foreach($data as $input) {
    $distance = distance($input[0], $input[1]);
    echo $distance === $input[2] ? '[OK]' : '[FAIL]';
    echo ' '.$input[0].':'.$input[1].' expected: '.$input[2].', result: '.$distance.PHP_EOL;
}