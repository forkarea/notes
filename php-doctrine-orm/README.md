# PHP - Doctrine ORM

Object Relational Mapper for PHP that sits on top of a powerful database abstraction layer.

## Entity states

- NEW - nowa encja, nie zapisana w DB, nie związana z EntityManager, UnitOfWork,
- MANAGED - encja która istnieje w DB, związana z EntityManager,
- DETACHED - encja która istnieje w DB, nie powiązana z EntityManager, UnitOfWork
- REMOVED - encja która istniej w DB, związana z EntityManager, która zostanie usunięta z DB podczas potwierdzania transakcji.

```php
$entityManager->getUnitOfWork()->getEntityState($entity);

// UnitOfWork::STATE_NEW
// UnitOfWork::STATE_MANAGED
// UnitOfWork::STATE_DETACHED
// UnitOfWork::STATE_REMOVED
```

## Doctrine CLI commands

Management of database schema:

```
$: vendor/bin/doctrine orm:schema-tool:create [--dump-sql]

$: vendor/bin/doctrine orm:schema-tool:drop --force [--dump-sql]

$: vendor/bin/doctrine orm:schema-tool:update --force [--dump-sql]
```

## CRUD

Zarządzanie artykułami:

- [Create - Nowy artykuł](examples/crud/create_article.php)
- [Read - Lista artykułów, pobranie pojedyńczego artykułu](examples/crud/read_article.php)
- [Update - Zaktualizuj informacje na temat artykułu](examples/crud/update_article.php)
- [Delete - Usuń wybrany artykuł](examples/crud/delete_article.php)

## Embeddables

- klasa którą można wykorzystać w encji, ale sama w sobie encją nie jest
- obejmowanie pól w wspólną "grupę" np:
  - zakres dat ([zobacz przykład](examples/embeddables/date-period.php))
  - adres ([zobacz przykład](examples/embeddables/address.php))
  - pieniądze ([zobacz przykład](examples/embeddables/money.php))
- można wykorzystywać odniesienia do pól w DQLu
- @columnPrefix:
  - domyślny - nazwa obiektu embedded ("Address" -> "address_")
  - własny prefix - "delivery_"
  - wyłączony - false
- Doctrine automatycznie generuje pola z Embeddable (np. Price) to tabeli encji (np. Product)

DQL examples:

```sql
SELECT r FROM Reservation r WHERE r.reservation.start = :myReservationStart;

SELECT o FROM Order o WHERE o.delivery.city = :myCity;

SELECT p FROM Product p WHERE p.price.value > :myValue AND p.price.currency = :myCurrency;
```