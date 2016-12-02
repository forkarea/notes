<?php

/**
 * PHP 7.0
 * Short notation for performing isset()
 */

// old way
$value = isset($_GET['key']) ? $_GET['key'] : 'default';

// new way
$value = $_GET['key'] ?? 'default'; 

// ...
$value = null ?? 'default'; // result: default 
$value = false ?? 'default'; // result: false