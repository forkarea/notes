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

## Embeddables

- columnPrefix:
  - domyślny - nazwa obiektu embedded ("Address" -> "address_")
  - własny prefix - "delivery_"
  - wyłączony - false

```php
/** @Entity */
class Order {
    /** @Embedded(class="Address", columnPrefix="delivery_") */
    private $deliveryAddress;
}

/** @Embeddable */
class Address
{
    /** @Column(type="string") */
    private $street;

    /** @Column(type="string") */
    private $postalCode;

    /** @Column(type="string") */
    private $city;

    /** @Column(type="string") */
    private $country;
}
```

DQL example:

```
SELECT o FROM Order o WHERE o.deliveryAddress.city = :myCity
```