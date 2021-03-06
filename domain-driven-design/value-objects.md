# Domain-Driven Design - Value Objects

## Notatki

- reprezentują byty, które nie posiadają własnej tożsamości i nie zmieniają wewnętrznego stanu - są obiektami
*immutable* czyli po utworzeniu instacji obiektu *Value Object* nie ma możliwości zmodyfikowania jego właściwości,
- *Value Object* może składać się z innych *Value Object* (przykład z VO *Money*),
- zawiera walidację, która defakto powinna być powielona/sprawdzona w warstwie aplikacyjnej, tak aby walidacja VO była ostatecznością (np. gdy programista zapomni o jej implementacji w warstwie wyżej),
- Side-Effect-Free, czyli zwracanie wyniku operacji bez modyfikowania aktualnej instancji obiektu - poprzez zwrócenie nowego obiektu, np. "dodawania" dwóch VO.

```php
// side-effect-free
// ...
public function add(Money $money)
{
    if ($this->currency !== $money->currency) {
        throw new InvalidArgumentException('Cant add money with different currency!');
    }
    
    $amount = $this->amount + $money->amount;
    
    return new Money($amount, $this->currency);
}
```

## Przykład zastosowania:

- id, guid,
- adres e-mail
- pesel, nip, regon,
- kasa $$

```php
new EmailAddress('valid@addressemail.com');

new Money(100, new Currency(Currency::USD));

new PESEL('44051401458');

new NIP('123-456-32-18');
```

```php
final class UserGuid
{
    private $userGuid;
    
    public function __construct($guid)
    {
        $this->guard($guid);
        $this->userGuid = $guid;
    }
    
    private function guard($guid)
    {
        if (!empty($guid) || !preg_match('/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/', $guid)) {
            throw new \InvalidArgumentException('Invalid guid.');
        }
    }
}
```

Metora *guard()* teoretycznie nie powinna rzucić wyjątku - pomijając fakt, że programista zapomniał ustawić walidacji na dane pochodzące z formularza.

## Linki

* http://it.esky.pl/2015/07/10/domain-driven-design-value-objects/
* http://devlab.pl/2011/12/23/domain-driven-design-value-object/
* http://aludwikowski.blogspot.com/2012/06/value-object-prawidowa-implementacja.html
* http://thepaulrayner.com/blog/why-value-objects/