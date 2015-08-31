# PHP - DateTime Class

Obsługa dat w PHP.

## Przykłady

Kontekst przykładów

```php
$datetime = new DateTime();
```

Formatowanie i wyświetlenie daty

```php
echo $datetime->format("Y-m-d H:i:s"); // 2015-08-27 13:05:34
```

Ustawianie strefy czasowej

```php
$datetime ->setTimezone(new DateTimeZone("Europe/Warsaw")); // ok
$datetime ->setTimezone(new DateTimeZone("Sun/Silesia")); // Unknown or bad timezone (Sun/Silesia)
```

Ustawienie daty (int $year, int $month, int $day = 1)

```php
echo $datetime->setDate(2015, 6, 15)->format("Y-m-d"); // 2015-06-15
echo $datetime->setDate(2000, 13, 30)->format("Y-m-d"); // 2001-01-30
```

Ustawienie czasu (int $hour, int $minute, int $second = 0)

```php
echo $datetime->setTime(6, 15, 30)->format("H:i:s"); // 06:15:30
echo $datetime->setTime(25, 59, 0)->format("H:i:s"); // 01:59:00
echo $datetime->setTime(7, 67, 0)->format("H:i:s"); // 08:07:00
```

Timestamp

```php
echo $datetime->getTimestamp(); // 1440674742
echo $datetime->setTimestamp(0)->format("Y-m-d H:i:s"); // 1970-01-01 01:00:00
```

Modyfikacja daty

```php
echo $datetime->setDate(2015, 8, 27)->modify("+1 day")->format("Y-m-d"); // 2015-08-28
echo $datetime->setDate(2015, 8, 27)->modify("-1 week")->format("Y-m-d"); // 2015-08-20
```

Obliczanie różnic między datami

```php
$interval = $datetime->diff(new DateTime("-38 days"));

// total days
echo $interval->days; // 38 

// years, months, days
echo $interval->format("%yY, %mM, %dD"); // 0Y, 1M, 7D
```

Porównanie dat

```php
$d1 = new DateTime();
$d2 = new DateTime();

$d1->setDate(2015, 8, 27);
$d2->setDate(2015, 8, 27);

var_dump($d1 == $d2); // true
var_dump($d1 === $d2); // false

var_dump($d1->format("U") === $d2->format("U")); // true
```

## Linki

* http://php.net/manual/en/class.datetime.php