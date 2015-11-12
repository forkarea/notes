# PHP - Bitwise Operators

Operacje na bitach. 

## Przykłady

Operatory operacji bitowych umożliwiają manipulację na konkretnych bitach w liczbie. W praktyce dość rzadko spotykane w rzeczywistych projektach PHP. Jednak ze względu na rozwiązywane przeze mnie testy (Elance, testy przygotowujące do certyfikatu Zend) postanowiłem przybliżyć sobie zasadę ich działania.

### $a & $b (bitowe AND)

Ustawione zostaną bity, które ustawione są w obu zmiennych.

*Przykład:*

```php
$a = 10; // 1010
$b = 15; // 1111

var_dump(decbin($a & $b)); // 1010
```

### $a | $b (bitowe OR)

Ustawione zostaną bity, które ustawione są w jednej lub drugiej zmiennej.

*Przykład:*

```php
$a = 121; // 1111001
$b = 8; // 1000

var_dump(decbin($a | $b)); // 1111001
```

### $a ^ $b (bitowe XOR)

Ustawione zostaną bity, które ustawione są w jednej lub drugiej zmiennej ale nie w obu jednocześnie.

```php
$a = 109; // 1101101
$b = 71; // 1000111

var_dump(decbin($a ^ $b)); // 101010
```

### ~ $a (bitowe NOT)

Ustawione zostaną bity, które nie są ustawione w zmiennej i odwrotnie (0 na 1, 1 na 0).

*Przykład:*

```php
$a = 109; // 1101101

var_dump(decbin(~ $a)); // 11111111111111111111111110010010
```

### $a << $b

Przesunięcie w lewo. Przesuwa bity z zmiennej $a $b-razy w lewo. Każdy z kroków oznacza pomnożenie przez 2.

*Przykład:*

```php
$a = 1; // 1
$b = 4; // 100

var_dump(decbin($a << $b)); // 10000
```

### $a >> $b

Przesunięcie w prawo. Przesuwa bity z zmiennej $a $b-razy w prawo. Każdy z kroków oznacza podzielenie przez 2.

*Przykład:*

```php
$a = 16; // 10000
$b = 3; // 11

var_dump(decbin($a >> $b)); // 10
```