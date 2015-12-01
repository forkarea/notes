# Domain-Driven Design - Entity

## Notatki

Reprezentacja bytów posiadaj¹cych to¿samoœci - unikalny identyfikator.

## Przyk³ad

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