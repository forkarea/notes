# Domain-Driven Design - Aggregate

## Notatki

* Grupa obiektów powi¹zanych ze sob¹ biznesowo. Razem tworz¹ sens
* Agregatem jest np. obiekt Faktura i lista powi¹zanych obiektów PozycjaFaktury. W tym wypadku Faktura jest tak¿e Aggregate Root
* Aggregate Root to korzeñ agregatu, jedyny obiekt z ca³ego agregatu, do którego mog¹ odnosiæ siê obiekty z poza tego agregatu
* Aggregate w Aggregate Root mog¹ byæ ³adowane od razy (eager loading) lub w momencie kiedy s¹ potrzebne (lazy loading)
* Usuwaj¹c Aggregate Root usuwasz ca³y agregat
* £atwiejsza praca nad jednym mniejszym wycinkiem kodu, ni¿eli nad ca³oœci¹