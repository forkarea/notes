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

## var

```cs
var age = 29;
var user = new User();
var list = new List<int>();
var anonymous = new { FirstName = "Adrian", LastName = "" };
```

> Słowo kluczowe *var* nie oznacza "variant" i nie wskazują, że zmienna jest "loosely typed" (typowanie słabe) lub "late bound".
> Oznacza tylko, że kompilator określa i przypisuje najbardziej odpowiedni typ.

Kiedy warto używać?

- local variables - method scope
- using statement
  - ```using (var file = new StreamReader("file.txt")) { /* ... */ }```
- for, foreach
  - ```for(var i = 1; i < 10; i++) { /* ... */ }
  - ```foreach(var user in users) { /* ... */ }
