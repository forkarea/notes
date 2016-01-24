# PHP - SPL - Functions

## class_implements()

Zwraca listę interfejsów, które zostały zaimplementowane przez klasę lub obiekt.

```php
interface Foo {}
class Bar implements Foo {}

var_dump(class_implements(new Bar));

/* Result:
array(1) {
  'Foo' =>
  string(3) "Foo"
}
*/
```

## iterator_to_array()

Konwertuje interator na tablicę.

```php
$it = new ArrayIterator(['name' => 'Lorem Ipsum', 'Foo', 'Bar']);

var_dump(iterator_to_array($it));

/* Result:
array(3) {
  'name' =>
  string(11) "Lorem Ipsum"
  [0] =>
  string(3) "Foo"
  [1] =>
  string(3) "Bar"
}
*/
```

## spl_autoload_register()

Umożliwia rejestrowanie funkcji (jednej i więcej) które obsługują automatyczne dołączanie plików klas w momencie gdy tworzymy obiekt danej klasy. Funkcje ładujące będą wykonywane w kolejności w jakiej zostały zarejestrowane, tak długo aż zostanie załadowana żądana klasa.

```php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});
```

## spl_object_hash()

Zwraca unikalny identyfikator obiektu, którego można używać do identyfikacji obiektu.

```php
$object1 = new stdClass;
$object1->name = 'Foo Bar';
$object1->age = 20;

var_dump(md5(spl_object_hash($object1)));

$object2 = clone $object1;

var_dump(md5(spl_object_hash($object2)));

/* Result:
string(32) "3b4ac85bf676cb8b44cb87fc1fd41c66"
string(32) "e0f906c44e99a93d4e01d6f5f41a9ec2"
*/
```