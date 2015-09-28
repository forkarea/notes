# Better Programmer

*Clean Code & Good Practices & Pragmatic Programmer*

Dokument ten jest zbiorem dobrych rad i przemyśleń dotyczących wytwarzania oprogramownia oraz postępowania zawodowego programisty. To efekt zdobytego doświadczenia poprzez:

- pracę nad nowymi projektami,
- rozwój odziedziczonych aplikacji,
- czytanie artykułów i książek,
- udział w konferencjach i szkoleniach,
- a co najważniejsze - możliwość pracy z bardziej doświadczonymi ludźmi.

Pewne punkty są "zainspirowane" oryginalnym źródłem z którego pochodzą - traktuj to raczej jako zbiór pomocnych informacji niżeli w pełni autorską pracę.

## Spis treści

- Podstawowe zasady
- Rekrutacja
- ~~Testowanie oprogramowania~~
- ~~Komentowanie kodu~~
- ~~Standard kodowania~~
- ~~Code Review~~
- ~~Refaktoryzacja~~
- ~~Wymiana i zdobywanie wiedzy~~
- DOJO programowania
- ~~Automatyzacja~~
- ~~Bazy danych~~
- Narzędzia
- ~~Projekty i ich prowadzenie~~
- Spotkania
- ~~Szacowanie~~
- ~~Zarządzanie czasem~~
- ~~Klient vs Pracodawca vs Programista~~
- ~~Współpraca~~
- ~~Debugowanie~~
- ~~Praca nad kodem~~
- ~~Programowanie obiektowe~~
- ~~Motywacja~~
- ~~Metodyki~~
  - ~~Agile i Scrum~~
  - ~~TDD~~
  - ~~BDD~~

## Podstawowe zasady

**Dziel i zwyciężaj** - większe elementy rozbijaj na mniejsze, pracuj nad mniejszymi w odpowiedniej kolejności.

**Pamiętaj o priorytetach** - te z większym priorytetem wykonuj najpierw, niezależnie od Twojego "widzi mi się" i samopoczucia, dopiero potem zabierz się za te z niższym priorytetem.

**DRY - Don't Repeat Yourself** - automatyzuj procesy tak często jak to się tylko da. Jeżeli powtarzasz daną czynność kilka razy - pomyśl nad zautomatyzowaniem jej (skrypt bash/bat, prosta własna lub gotowa aplikacja). Nie dotyczy ona tylko Twojego kodu - dotyczy także każdego innego aspektu związanego z Twoją pracą.

**Brzytwa Ockhama** - spośród wielu możliwych najlepsze jest wyjaśnienie najprostsze.

**S.M.A.R.T.** - każdy wyznaczany cel powinien być:

- Simple - jednoznaczny, jasno sformułowany
- Measurable - mierzalny, można zmierzyć postęp
- Achievable - osiągalny, realistyczny, wykonalny w określonym czasie
- Relevant - istotny, ważny krok w przód
- Timely defined - określony w czasie, ma swoją "datę zakończenia"

**Zasada Pareto (zasada 80/20)** - 20% pracy przynosi 80% zysku

## Rekrutacja

- Warto zadbać o listę przygotowanych pytań, które zadajemy każdemu kandydatowi. Pod każdą z technologii (z której nasza wiedza pozwala na rekrutowanie :-)) przygotowujemy pytania o formie otwartej. Ważne aby pytania pogrupować według poziomu - rozpoczynając od tych najłatwiejszych, kończąc na tych najtrudniejszych. Takie pogrupowanie bardzo pomaga w przełamywaniu pierwszych lodów dodatkowo dajesz czas kandydatowi na obycie się z Twoją własną osobą.
- Podczas rekrutacji możesz poprosić kandydata o wykonanie którego z następujących zadań:
  - **Code Review** - kandydat otrzymuje fragment kodu łamiący ogólnoprzyjete standardy i dobre praktyki. Jego zadaniem jest przeprowadzenie procesu Core Review, wytykając jak największa ilość uchybień i możliwych usprawnień.
  - **Live Coding** - podczas spotkania rekrutacyjnego kandydat otrzymuje zadanie/problem do rozwiązania na komputerze. Ma na to X czasu. Może to być kilka mniejszych zadań programistycznych np. przerobienie jakiegoś wzoru matematycznego na kod, operacje na tablicach itp.
  - **Zadanie z modelowania** - kandydat dostaje zadanie którego celem jest zaprojektowania systemu (pod względem architektury niższego lub wyższego poziomu - klasy/wzorce projektowe lub architektura elementów systemu - serewer www, serwer kolejki, aplikacja).
  
##  DOJO programowania

- *"Ćwiczenia wykonuje nie wtedy gdy Ci za to płacą. Wykonuj je po to aby uzyskać dobrą zapłatę za swoją pracę"* ~ Robert C. Martin
- **Kata** - Jedna osoba pisze kod, reszta uczestników powtarza za nim te czynności. Ćwiczenie polega na rozwiązywaniu dobrze znanego problemu. Nie chodzi o wymyślenie rozwiązania problemu - rozwiązanie jest dobrze znane, ale o wyćwiczenie związanych z nim ruchów oraz decyzji. Celem jest także dążenie do perfekcji - powtarzasz ćwiczenie raz za razem. Dobre na nauczenie się skrótów klawiszowych IDE, idiomów nawigacyjnych, TDD oraz CI.
- **Wasa** - Dwóch programistów odgrywa role agresora a drugi próbuje się bronić. Jeden z nich pisze test jednostkowy, drugi musi sprawić, że zostanie on zaliczony. Zmieniając się co jakiś czas rolami. Proces, który może wspomagać naukę takich metodologii jak TDD.
- **Randori** - Zawartość ekranu rzutowana jest na ścianę. Jedna osoba pisze test i siada na swoje miejsce. Następna osoba sprawia, że test zostaje zaliczony i pisze kolejny test. Można powtarzać w odpowiedniej kolejności lub poszczególne osoby mogą się po prostu zgłaszać, jeżeli czują taką potrzebę.
- [devblogi.pl/2010/10/ostateczne-programistyczne-kata.html](http://www.devblogi.pl/2010/10/ostateczne-programistyczne-kata.html)
- [solidsoft.wordpress.com/2010/12/09/czym-jest-coding-dojo-i-code-kata](https://solidsoft.wordpress.com/2010/12/09/czym-jest-coding-dojo-i-code-kata/)

## Narzędzia

- Poznaj swoje narzędzia - **dobrze** je poznaj. Są twoim przyjacielem. To one mogą wspomagać i ułatwiać Twoja codzienna pracę
- Poznaj skróty klawiszowe IDE z którego korzystasz
- Dobrze poznaj możliwości języka programowania oraz frameworka
- Wykorzystaj dowolny system wersjonowania
- Używaj systemu zarządzania projektami, zgłaszania błędów

## Spotkania

- Jeżeli jesteś uczestnikiem spotkania staraj się do niego przygotować, przejrzyj dostępne Ci materiały na temat spotkania, stwórz notatki na temat swoich przemyśleń - pomysłów na usprawnienia, dobrych i złych stron
- Jeżeli prowadzisz spotkanie, wyślij agende spotkania uczestnikom. Opisz krótko każdy z punktów. Podziel czas spotkania w odpowiedni sposób pomiędzy konkretnymi punktami agendy. Zdefiniuj główny cel spotkania