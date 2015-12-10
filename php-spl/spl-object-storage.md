# PHP - SPL - SplObjectStorage

Mapa obiektów - dostarcza zarządzanie obiektami, zapewniając ich unikalność w storage - nie możemy dodać dwa razy tego samego obiektu.

## Podstawowe operacje

Kontekst przykładów

```php
$os = new SplObjectStorage();

for ($i = 1; $i <= 3; $i++) {
    $object = new StdClass();
    $object->name = 'Object - '.$i;

    $os->attach($object);
}
```

Dodaj obiekt do storage

```php
$os->attach(new StdClass());
```

Usuń obiekt z storage

```php
$stdObject = new StdClass();
$os->attach($stdObject);

$os->detach($stdObject);
```

Ilość obiektów w storage

```php
var_dump($os->count()); // 3
```

Dodaj wszystkie obiekty z innej instancji SplObjectStorage

```php
$os2 = new SplObjectStorage();
$os2->attach(new StdClass);
$os2->attach(new StdClass);

$os->addAll($os2);

echo $os->count(); // 5
```

Iterowanie po dodanych obiektach

```php
foreach($os as $item) {
    echo $item->name . PHP_EOL;
}
```

Sprawdź czy w storage istnieje konkretny obiekt

```php
$newObject = new StdClass();

var_dump($os->contains($newObject)); // false
$os->attach($newObject);
var_dump($os->contains($newObject)); // true
```

Serializacja

```php
echo $os->serialize();
// x:i:3;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 1";},N;;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 2";},N;;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 3";},N;;m:a:0:{}
```

Deserializacja

```php
$serialized = 'x:i:3;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 1";},N;;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 2";},N;;O:8:"stdClass":1:{s:4:"name";s:10:"Object - 3";},N;;m:a:0:{}';

$os->unserialize($serialized);

var_dump($os);

// wynikiem będzie storage z 3 obiektami posiadającymi następujące właściwości *name*: Object - 1; Object - 2; Object - 3
```

## Przykład użycia

[Implementacja wzorca *Observer* przy użyciu *SPL* (*SplObserver*, *SplSubject*, *SplObjectStorage*)](spl-observer-pattern.php)