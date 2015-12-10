<?php

// Optimized bubble sort
// https://en.wikipedia.org/wiki/Bubble_sort

function bubbleSort(array $data)
{
    $length = count($data);
    $swap = function (array &$data, $i1, $i2) {
        $tmp = $data[$i1];
        $data[$i1] = $data[$i2];
        $data[$i2] = $tmp;
    };

    for ($i = 0; $i < $length; $i++) {
        $n = 0;

        for ($j = 0; $j < $length; $j++) {
            if (isset($data[$j + 1]) && $data[$j] > $data[$j + 1]) {
                $swap($data, $j, $j + 1);
                $n += 1;
            }
        }

        if (!$n) {
            break;
        }
    }

    return $data;
}

var_dump(bubbleSort([7, 3, 6, 4, 9, 0, 1, 5, 2, 8]));