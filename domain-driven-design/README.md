# Domain-Driven Design

Notatki na temat DDD

## Co to jest DDD?

## Index

* [Value Objects](value-objects.md)
* [Aggregate](aggregate.md)

## Przykładowa separacja w projekcie

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