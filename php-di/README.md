# PHP-DI

Dependency Injection Container

## Wstęp

* aktualna stabilna wersja - 5.0 (na dzień 04/08/2015)
* wymaga PHP >= 5.4.0
* możliwość integracji z frameworkami: Symfony 2, Silex, Zend Framework 1, Zend Framework 2 (beta), Silly
* wykorzystuje Doctrine Cache, zalecane jest użycie cache w aplikacji uruchomionej na serwerze produkcyjnym:
  * instalacja: ```$: composer require doctrine/cache```
  * włączenie ```$builder->setDefinitionCache(new Doctrine\Common\Cache\ApcCache());```
  * wsparcie dla różnych driverów cache (APC, Memcached, Redis, Filesystem etc.)

Linki:

* [http://php-di.org/](http://php-di.org/)
* [https://github.com/PHP-DI/PHP-DI](https://github.com/PHP-DI/PHP-DI)

## Instalacja

```
$: composer require php-di/php-di
```

## Inicjalizacja PHP-DI

Poniższy kod to także kontekst dla zawartych w tym artykule fragmentów kodu.

```php
$builder = new DI\ContainerBuilder();
// konfiguracja, włączanie/wyłączanie metod
$container = $builder->build();
```

## Metody tworzenia instancji klas oraz wstrzykiwania zależności

### Autowiring

* automatyczne wstrzykiwanie zależności
* wykorzystuje mechanizm Refleksji (skanuje kod, cachuje rezultaty) oraz Type Hinting
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

$head = $container->get('Head');
```

* wynikiem powyższego kodu będzie exception *Entry Head cannot be resolved: The parameter 'charset' of Head::__construct has no value defined or guessable*
* drugi parametr konstruktora ```$charset``` klasy *Head* uniemożliwia wykorzystanie metody *autowiring* - PHP-DI nie jest w stanie okreslić jakiego typu jest ten parameter - brakuje Type Hinting
* metoda ```setRevisions()``` nie zostanie uruchomiona
* powyższy przykład powinien wykorzystać metodę *PHP definitions*

### Annotations

* wstrzykiwanie zależności oparte o adnotacje w komentarzach - @Inject
* wykorzystuje dodatkową, zewnętrzną zależność ```doctrine/annotations```
  * instalacja: ```$: composer require doctrine/annotations```
* metoda ta jest domyślnie wyłączona, jej włącznie odbywa się w następujący sposób: ```$builder->useAnnotations(true);```
* wspiera wstrzykiwania:
  * constructor injection
  * setter/method injection
  * property injection
* nie wspiera mapowania interfejsu na konkretną implementację
  
### PHP Definitions

* pomocne tam gdzie metody Autowiring i Annotations nie wystarczają
* wczytywanie definicji może odbywać się na dwa sposoby:
  * bezpośrednie deklarowanie definicji: ```$builder->addDefinitions([ /* ... */ ]);```
  * ładowanie definicji z pliku: ```$builder->addDefinitions('config.php');```
  * istnieje możliwość bezpośredniego dopisywania wartości do kontenera: ```$container->set('database.host', 'localhost');```

Wybrane typy definicji:

*Values*
 
```php
[
    'database.host' => 'localhost',
    'database.port => 5000,
    'report.recipients' => ['test@mail.com', 'root@mail.com']
]
```
 
*String expressions*

```php
[
    'path.tmp' => '/tmp',
    'log.file' => DI\string('{path.tmp}/app.log')
]
```
 
*Creating objects directly*

```php
[
    'Foo' => new Foo()
]
```
   
*Factories*

```php
[
    'Foo' => [DI\get('FooFactory'), 'create'],
    'Foo' => ['FooFactory', 'create']
]
```

*Mapping an interface to an implementation*

```php
[
    'LoggerInterface' => DI\object('MyLogger')
]
```
    
*Injections*

```php
[
    // setter injection
    'Database' => DI\object()
        ->method('setLogger', DI\get('Logger')),
    
    // constructor injection
    'Logger' => DI\object()
        ->constructor('app.log', DI\get('log.level'), DI\get('FileWriter')),
        
    // property injection
    'Foo' => DI\object()
        ->property('bar', DI\get('Bar'))
]
```
    
*Aliases*

```php
[
    'doctrine.entity_manager' => DI\get('Doctrine\ORM\EntityManager')
]
```
   
*Environment variables*

```php
[
    'database.url' => DI\env('DATABASE_URL', 'default@value')
]
```

*Wildcards*

```php
[
    'Blog\Domain\*RepositoryInterface' => DI\object('Blog\Architecture\*DoctrineRepository')
]
```

*Blog\Domain\PostRepositoryInterface* zostanie zmapowany na *Blog\Architecture\PostDoctrineRepository*.