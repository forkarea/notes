# Unnamed Notes

O wszystkim i o niczym.

### Event Sourcing

> ES is simple: our domain is producing events that represent every change made in system. If we take every event from the beginning of the system and replay them on initial state, we will get to the current state of the system. 
> -- via https://www.future-processing.pl/blog/cqrs-simple-architecture/

### Transformacja Domain Object => DTO

- extension method ```var userDto = userDomain.AsDTO();```
- explict operator ```(MyDTO)MyDomainObject```
- metody fabrykujące wyciągnięte do zewnętrznej klasy (fabryki) ```public class UserDtoFabric() {} ```
- metody fabrykujące na poziomie DTO poprzez przeciążanie konstruktorów

```
public class UserDTO {
    public UserDTO(UserDomain from) {
        public string Name { get; set; }

        public UserDTO(UserDomain from)
        {
            Name = from.FirstName + " " + from.LastName;
        }
    }
}

var userDomain = new UserDomain();
var userDTO = new UserDTO(userDomain);
```

### Eventual consistency

- dane będą spójne, ale bez żadnych wskazówek co do czasu kiedy to nastąpi,
- przykład do zoobrazowania: tranzakcja obejmuje operację zapisu informacji do bazy danych oraz generowanie raportu w formie PDF:
  - zapis do DB możemy potraktować jako coś co zostanie wykonane natychmiast, 
  - wygenerowanie PDF nastąpi dopiero za X czasu,
  - użytkownik poinformowany zostaje komunikatem "Trwa generwoanie raportu PDF",
  - tranzakcja zostaje uznana zakończoną dopiero gdy dwie w.w operacje zostaną wykonane,
- "model wykorzystywany" w wysokodostępnych, rozproszonych systemach,
- często utażsamiane z BASE (Basically Available, Soft state, Eventual consistency), przeciwnie niż w tradycyjnym ACID (Atomicity, Consistency, Isolation, Durability)
