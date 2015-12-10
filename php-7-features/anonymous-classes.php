<?php

/**
 * PHP 7
 * Anonymous classes.
 */

interface NamedObject {
	public function __construct(string $name);
	public function name() : string;
}

var_dump(new class('Foo Bar') implements NamedObject {
	private $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	public function name() : string {
		return $this->name;
	}
});