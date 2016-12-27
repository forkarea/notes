<?php

/**
 * PHP 7.1
 * Support Class Constant Visibility
 */
 
class Enums {
	// Default, public
	const DEFAULT_VY = 0;
    
    // Public/Private/Protected visibility
    public const PUBLIC_VY = 1;
    private const PRIVATE_VY = 2;
    protected const PROTECTED_VY = 3;
        
    // Shortened declaration list
    private const PRIVATE_VYA = 4, PRIVATE_VYB = 5;
}

var_dump(Enums::DEFAULT_VY); // int(0)
var_dump(Enums::PUBLIC_VY); // int(1)

var_dump(Enums::PRIVATE_VY); // Fatal error: Uncaught Error: Cannot access private const Enums::PRIVATE_VY
var_dump(Enums::PROTECTED_VY); // Fatal error: Uncaught Error: Cannot access protected const Enums::PROTECTED_VY