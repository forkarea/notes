<?php

/**
 * PHP 7.1
 * Short list syntax & Allow specifying keys in list()
 */

// Short syntax
$array = [1, 2, 3];
[$a, $b, $c] = $array;

// Old way
public function __construct(array $attributes) {
    $this->name = $attributes["name"];
    $this->colour = $attributes["colour"];
    $this->age = $attributes["age"];
}

// New way
public function __construct(array $attributes) {
    list(
        "name" => $this->name,
        "colour" => $this->colour,
        "age" => $this->age
    ) = $attributes;
}