# Unnamed Notes

O wszystkim i o niczym.

### Event Sourcing

> ES is simple: our domain is producing events that represent every change made in system. If we take every event from the beginning of the system and replay them on initial state, we will get to the current state of the system. 
> -- via https://www.future-processing.pl/blog/cqrs-simple-architecture/

### Transformacja Domain Object => DTO

- extension method ```var userDto = userDomain.AsDTO();```
- explict operator ```(MyDTO)MyDomainObject```
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
