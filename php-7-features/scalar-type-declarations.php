<?php

/**
 * PHP 7
 * Added support to declarations type: int, string, float, bool.
 * Two flavours:
 * - coercive - default behaviour, auto convert type of value,
 * - strict - throw TypeError when passed value of invalid type.
 */

// setup strict, declare must be at the top of file
declare(strict_types=1);

// It's only an example class.
// $price shouldn't be a float value.
class Product
{
    public function __construct(string $name, int $ammount, float $price, bool $available)
    {
        // ...
    }
}

try
{
    // Ok
    new Product('Product 1', 1, 1.55, true);

    // Fatal error: Uncaught TypeError: Argument 2 passed to Product::__construct()
    // must be of the type integer, string given
    new Product('Product 1', '1', 1.55, true);
}
catch (TypeError $e)
{
    echo $e->getMessage();
}