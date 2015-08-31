# Domain-Driven Design - Value Objects

## Notatki

Reprezentują byty, które nie posiadają własnej tożsamości i nie zmieniają wewnętrznego stanu.
Przykładem może być:

- adres e-mail


```php
new EmailAddress('valid@addressemail.com');
```

Jeżeli klasa EmailAddress będzie walidować adres e-mail to nie będzie potrzeby tej walidacji nigdzie indziej powielać.

- pesel, nip, regon,
- kasa $$


```php
new Money(100, new Currency(Currency::USD));
```

## Linki

* http://it.esky.pl/2015/07/10/domain-driven-design-value-objects/
* http://it.esky.pl/2015/07/10/domain-driven-design-value-objects/
* http://devlab.pl/2011/12/23/domain-driven-design-value-object/
* http://aludwikowski.blogspot.com/2012/06/value-object-prawidowa-implementacja.html
* http://thepaulrayner.com/blog/why-value-objects/