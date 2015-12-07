# Domain-Driven Design - Entity

## Notatki

Reprezentacja bytów posiadających tożsamości - unikalny identyfikator.

## Przykład

```php
namespace BusinessName/Domain/Entity;

class User
{
    // ...
    
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
```