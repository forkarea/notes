# PHP - Doctrine ORM

Object Relational Mapper for PHP that sits on top of a powerful database abstraction layer.

## Entity states

- NEW - nowa encja, nie zapisana w DB, nie związana z EntityManager, UnitOfWork,
- MANAGED - encja która istnieje w DB, związana z EntityManager,
- DETACHED - encja która istnieje w DB, nie powiązana z EntityManager, UnitOfWork
- REMOVED - encja która istniej w DB, związana z EntityManager, która zostanie usunięta z DB podczas potwierdzania transakcji.

## Doctrine CLI commands

Management of database schema:

```
$: vendor/bin/doctrine orm:schema-tool:create [--dump-sql]

$: vendor/bin/doctrine orm:schema-tool:drop --force [--dump-sql]

$: vendor/bin/doctrine orm:schema-tool:update --force [--dump-sql]
```