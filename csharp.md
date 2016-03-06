# C# - Notes

Notatki dotyczące języka C#

## Object Initializers

```cs
class User
{
    public string Nick { get; set; }
    public string FirstName { get; set; }
    public string LastName { get; set; }
    public int Age { get; set; }
    public string Email { get; set; }
    
    public User(string nick)
    {
        Nick = nick;
    }
}

// object initializer way
User me = new User("adex")
{
    FirstName = "Adrian",
    LastName = "Pietka",
    Age = 27,
    Email = "adrian@pietka.me"
};

// standard way
User me = new User("adex");
me.FirstName = "Adrian";
me.LastName = "Pietka";
me.Age = 27;
me.Email = "adrian@pietka.me";
```

Jeżeli przypisanie wartości do którejś właściwości wygeneruje wyjątek to:

- Object initializer way:
  - zmienna ```me``` będzie miała wartość ```NULL```
- Standard way:
  - zmienna ```me``` będzie posiadała utworzony obiekt klasy ```User```
  - właściwość któa wywołała wyjątek będzie ```NULL```

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
