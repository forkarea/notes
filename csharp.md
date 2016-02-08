# C# - Notes

Notatki dotyczące języka C#

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

- *get* wywoływany w momencie pobierania wartość właściwości
- *set* wywoływany w momencie nadania wartości właściwości
- słowo kluczowe *value* - reprezentacja wartości przypisywanej do właściwości w akcesorze set

## Implicit - konwersja niejawna

```cs
class UserDomain
{
    public string FirstName { get; set; }
    public string LastName { get; set; }
}

class UserInfoDTO
{
    public string FullName { get; set; }

    public static implicit operator UserInfoDTO(UserDomain user)
    {
        return new UserInfoDTO {
            FullName = user.FirstName + " " + user.LastName
        };
    }
}

UserDomain userDomain = new UserDomain { FirstName = "Adrian", LastName = "Pietka" };
UserInfoDTO userDto = userDomain;
```

## Explicit - konwersja jawna


```cs
class UserDomain
{
    public string FirstName { get; set; }
    public string LastName { get; set; }
}

class UserInfoDTO
{
    public string FullName { get; set; }

    public static explicit operator UserInfoDTO(UserDomain user)
    {
        return new UserInfoDTO {
            FullName = user.FirstName + " " + user.LastName
        };
    }
}

UserDomain userDomain = new UserDomain { FirstName = "Adrian", LastName = "Pietka" };
UserInfoDTO userDto = (UserInfoDTO)userDomain;
```