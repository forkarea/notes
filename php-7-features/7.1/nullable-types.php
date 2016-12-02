<?php

/**
 * PHP 7.1
 * Nullable types - type can also be null.
 * Question mark symbol (?) to indicate that a type can also be null
 */

declare(strict_types=1);

class User {
    public $name;
}

function createNullUser(): ?User {
    return null;
}

function createUser(): ?User {
    $user = new User();
    $user->name = 'User Name';
    
    return $user;
}

function nullableAge(?int $age): ?int {
    return $age;
}

var_dump(createNullUser()); // NULL
var_dump(createUser()); // object(User) (...)

var_dump(nullableAge(18)); // int(18)
var_dump(nullableAge(null)); // NULL
var_dump(nullableAge((int)'18')); // int(18)
var_dump(nullableAge('18')); // Uncaught TypeError: Argument 1 passed to nullableAge() must be of the type integer or null, string given