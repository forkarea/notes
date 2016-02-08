# C# - Notes

Notatki dotycz¹ce jêzyka C#

## Accessors

```cs
class Person {
    public string FirstName { get; set; }
    
    private string lastname;
    public string LastName {
        get {
            return lastname;
        }
        set {
            lastname = value;
        }
    }
    
    private double age;
    public double Age {
        private set {
            age = Math.Ceiling(value / 12);
        }
        get {
            return age;
        }
    }
}
```

- *get* wywo³ywany w momencie pobierania wartoœæ w³aœciwoœci
- *set* wywo³ywany w momencie nadania wartoœci w³aœciwoœci
- s³owo kluczowe *value* - reprezentacja wartoœci przypisywanej do w³aœciwoœci w akcesorze set