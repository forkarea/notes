<?php

/**
 * PHP 7.0
 * Short notation for performing three-way comparisons. Possible return value: 1, 0, -1.
 * Objects are not comparable in this case.
 */
 
var_dump(256 <=> 128); // 1
var_dump('def' <=> 'abc'); // 1
var_dump(['c', 'd'] <=> ['a', 'b']); // 1

var_dump(256 <=> 256); // 0
var_dump('abc' <=> 'abc'); // 0
var_dump(['a', 'b'] <=> ['a', 'b']); // 0

var_dump(128 <=> 256); // -1
var_dump('abc' <=> 'def'); // -1
var_dump(['a', 'b'] <=> ['c', 'd']); // -1

var_dump(true <=> false); // 1
var_dump(null <=> false); // 0
var_dump('' <=> false); // 0
var_dump([] <=> false); // 0