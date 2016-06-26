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
  - ```for(var i = 1; i < 10; i++) { /* ... */ }```
  - ```foreach(var user in users) { /* ... */ }```

## Null Coalescing Operator

```cs
// set foo to the value of foobar if foo is NOT null 
// otherwise if foo = null, set foobar to -1.

int foobar = foo ?? -1;

// vs:

int foobar = foo ? foo : -1;
```

## yield return

Tworzenie "leniwych kolekcji". Poszczególne elementy kolekcji dodawane są do niej dopiero w momencie gdy jest na nie zapotrzebowanie 

```cs
static IEnumerable<int> GetData()
{
    for (int i = 1; i <= 5; i++)
    {
        Console.WriteLine("Generowanie wartości: " + i.ToString());
        yield return i;
    }
}

static void Main(string[] args)
{
    IEnumerable<int> data = GetData();
    foreach (int i in data)
    {
        Console.WriteLine("Pobieranie wartości: " + i.ToString());
    }
}
```

Rezultat:

```
Generowanie wartości: 1
Pobieranie wartości: 1
Generowanie wartości: 2

... itd.
```

## Nullable Types

Zmienne które mogą przyjmować wartości z zakresu wskazanego typu (int, string, etc.), plus wartość null

Definicja:

```cs
int? x = null;

// or

Nullable<int> y = null;
```

Przydatne metody dla nullable types:

- x.GetValueOrDefault() // zwraca konkretna wartość lub null
- x.HasValue // zwaraca true/false w zależności od tego czy ustawiono wartość

Przykład:

```cs
int? x = null;
Console.WriteLine("x = " + x.HasValue.ToString()); // x = False
Console.WriteLine("x = " + x.GetValueOrDefault().ToString()); // x = 0

int? y = 1;
Console.WriteLine("x = " + y.HasValue.ToString()); // x = True
Console.WriteLine("y = " + y.GetValueOrDefault().ToString()); // y = 1
```

## Null-conditional operators

> Used to test for null before performing a member access (?.) or index (?[) operation. 
> These operators help you write less code to handle null checks, especially for descending into data structures.

```cs
if (user != null && user.CurrentDebt != null) {
    return user.CurrentDebt.getValue();
} else {
    return 0;
}

// vs:

return user?.CurrentDebt?.getValue() ?? 0;
```

## Access Modifiers

- *public* - not restricted access
- *private* - class scope (i.e. accessible only from code in the same class)
- *protected* - class scope + types derived from the containing class
- *internal* - assembly scope (i.e. only accessible from code in the same .exe or .dll)
- *protected internal* - assembly scope + types derived from the containing class.

## JSON Payload to object - using extension method

```cs
using System.IO;
using System.Runtime.Serialization.Json;

namespace Larmo.Common
{
    public static class StringExtensions
    {
        public static TElement DeserializeJson<TElement>(this string json)
        {
            var bytes = Encoding.Unicode.GetBytes(json);
            var settings = new DataContractJsonSerializerSettings
            {
                DateTimeFormat = new System.Runtime.Serialization.DateTimeFormat("%Y-%m-%dT%H:%M:%SZ")
            };
            
            using (var stream = new MemoryStream(bytes))
            {
                var serializer = new DataContractJsonSerializer(typeof(TElement), settings);
                return (TElement)serializer.ReadObject(stream);
            }
        }
    }
}

namespace Larmo.Example
{
    [DataContract]
    public class GitUser
    {
        [DataMember(Name = "id")]
        public int Id { get; set; }
        
        [DataMember(Name = "name")]
        public string Name { get; set; }
    }
}

// Payload: {"id":1,"name":"Adrian Pietka"}

// Usage:
// var payload = await request.Content.ReadAsStringAsync();
// var user = payload.DeserializeJson<Larmo.Example.User>();
```
