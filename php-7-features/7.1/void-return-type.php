<?php

/**
 * PHP 7.1
 * void return type.
 * Void cannot be used as a parameter type.
 */

declare(strict_types=1);

// non of return
function nonOfReturn(): void { }
var_dump(nonOfReturn()); // NULL

// empty return
function emptyReturn(): void { return; }
var_dump(emptyReturn()); // NULL

// return null
function returnNull(): void { return null; }
var_dump(returnNull()); // A void function must not return a value (did you mean "return;" instead of "return null;"?)

// return false
function returnFalse(): void { return false; }
var_dump(returnFalse()); // A void function must not return a value 

// return 0
function returnZero(): void { return 0; }
var_dump(returnZero()); // A void function must not return a value 

// return 1
function returnOne(): void { return 1; }
var_dump(returnOne()); // A void function must not return a value 