# Domain-Driven Design - Aggregate

## Notatki

* Grupa obiektów powiązanych ze sobą biznesowo. Razem tworzą sens
* Agregatem jest np. obiekt Faktura i lista powiązanych obiektów PozycjaFaktury. W tym wypadku Faktura jest także Aggregate Root
* Aggregate Root to korzeń agregatu, jedyny obiekt z całego agregatu, do którego mogą odnosić się obiekty z poza tego agregatu
* Aggregate w Aggregate Root mogą być ładowane od razy (eager loading) lub w momencie kiedy są potrzebne (lazy loading)
* Usuwając Aggregate Root usuwasz cały agregat
* Łatwiejsza praca nad jednym mniejszym wycinkiem kodu, niżeli nad całością