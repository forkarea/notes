# Domain-Driven Design

Notatki na temat DDD.

## DDD - a co to jest?

*@todo*

## Index

- [Aggregate](aggregate.md)
- [Entity](entity.md)
- [Value Objects](value-objects.md)

## Przykładowa separacja w projekcie

```
src/
   /Application
      /Controllers
   /Domain
      /Aggregate
      /Entity
      /Repository
      /ValueObject
   /Infrastructure
      /Adapter
         /MongoDbStorage.php
         /PhpArrayAuthInfoProvide.php
         /PhpUniqidGenerator.php
      /Factory
         /MessageCollection.php
      /Repository
         /FilesystemPlugins.php
         /MongoDbMessages.php
```

## Inne przykłady

- [DDD with Symfony2: Folder Structure And Code First](http://williamdurand.fr/2013/08/07/ddd-with-symfony2-folder-structure-and-code-first/)
- [DDD with Symfony2: Making Things Clear](http://williamdurand.fr/2013/08/20/ddd-with-symfony2-making-things-clear/)