<?php

/**
 * PHP 7.0
 * Defining return type for: method, functions and closure.
 * Supported return types: class & interface name, self, parent, array, string, int, float, bool, callable, Closure
 */

//
// self
// 
class Base {
    public static function factory() : self {
        return new Base();
    }
}

var_dump(Base::factory());

//
// parent
//
class Child extends Base {
    public static function factory() : parent {
        return new Child();
    }
}

var_dump(Child::factory());

//
// interface name, array, scalar types
//
interface Product {
    public function name() : string;
    public function ammount() : int;
    public function isAvailable() : bool;
    public function warehouses() : array;
}

class Foo implements Product {
    public function name() : string {
        return 'FooProduct';
    }

    public function ammount() : int {
        return 15;
    }

    public function isAvailable() : bool {
        return $this->ammount > 0;
    }

    public function warehouses() : array {
        return ['PL', 'DE', 'CZ'];
    }
}

class ProductFactory {
    public static function fromName($name) : Product {
        return new $name();
    }
}

$fooProduct = ProductFactory::fromName('Foo');
echo $fooProduct->name() . ', ammount = ' . $fooProduct->ammount();