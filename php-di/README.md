# PHP-DI

Dependency Injection Container

## Wstęp



## Instalacja

```
$: composer require php-di/php-di
```

## Inicjalizacja DIC

Poniższy kod to także kontekst dla zawartych w tym artykule fragmentów kodu.

```php
$builder = new DI\ContainerBuilder();
// konfiguracja, włączanie/wyłączanie metod
$container = $builder->build();
```

## Metody tworzenia instancji klas oraz wstrzykiwania zależności

### Autowiring

* automatyczne wstrzykiwanie zależności
* wykorzystuje mechanizm Refleksji (skanuje kod, cachuje rezultaty (?w obrębie requestu?)) oraz Type Hinting
* zależności muszą być wstrzykiwane jako argumenty konstruktora
* konstruktor służy w tym wypadku wyłącznie do wstrzykiwania zależności, nie może zawierać innych parametrów
* nie wymaga żadnej dodatkowej konfiguracji - działa "od strzału" :-)
* autowiring jest domyślnie włączony
  * istnieje możliwość wyłączenia go: ```$builder->useAutowiring(false);```

Pełny przykład metody autowiring: [autowiring.php](autowiring.php)

```php
// Standardowy sposób wstrzykiwania zależności:
$author = new Author;
$body = new Body;
$head = new Head($author);
$document = new Document($head, $body);

// PHP-DI - autowiring:
$document = $container->get('Document');
```

Niedziałający przykład autowiringu przedstawiony został na poniższym przykładzie:

```php
class Head {
   public function __construct(Author $author, $charset) {
     // ...
   }
   
   public function setRevisions(Revisions $revisions) {
     // ...
   }
}
```

* drugi parametr konstruktora ```$charset``` klasy *Head* uniemożliwia wykorzystanie metody *autowiring*
* nawet gdyby parametr ```$charset``` przyjmował obiekt, to PHP-DI nie jest w stanie okreslić jakiego typu on jest - brakuje Type Hinting
* metoda ```setRevisions()``` nie zostanie uruchomiona
* powyższy przykład powinien wykorzystać metodę *PHP definitions*

### Annotations

* wstrzykiwanie zależności oparte o adnotacje w komentarzach - w identyczny sposób jak ma to miejsce np. w Doctrine, PHPUnit
* wykorzystuje dodatkową, zewnętrzną zależność ```doctrine/annotations```
  * instalacja: ```$: composer require doctrine/annotations```
* metoda ta jest domyślnie wyłączona, jej włącznie odbywa się w następujący sposób: ```$builder->useAnnotations(true);```