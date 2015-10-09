# PHP - Doctrine ORM

Object Relational Mapper for PHP that sits on top of a powerful database abstraction layer.

## Doctrine CLI commands

Management of database schema:

```
$: vendor/bin/doctrine orm:schema-tool:create

$: vendor/bin/doctrine orm:schema-tool:drop --force

$: vendor/bin/doctrine orm:schema-tool:update --force
$: vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
```