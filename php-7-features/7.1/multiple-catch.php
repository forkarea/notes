<?php

/**
 * PHP 7.1
 * Catching Multiple Exception Types
 */

function tripleInteger($value) {
    if (!is_int($value)) {
        throw new InvalidArgumentException('Function only accepts integers');
    }
    
    if ($value > 100) {
        throw new RangeException('Value must be less than 1000');
    }
    
    return $value * 3;
}
 
try {
   tripleInteger('TEST');
} catch (InvalidArgumentException | RangeException $exception) {
   // Code to handle the exception
} catch (\Exception $exception) {
   // ...
}