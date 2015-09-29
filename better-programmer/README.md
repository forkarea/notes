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
- Automatyzacja
- Bazy danych
- Narzędzia
- ~~Projekty i ich prowadzenie~~
- Spotkania
- ~~Szacowanie~~
- ~~Zarządzanie czasem~~
- Klient vs Pracodawca vs Programista
- Współpraca
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

## Automatyzacja

- Automatyzacja powinna odbywać się na każdym poziomie procesu wytwarzania programowania:
  - na poziomie rozstawiania środowiska developerskiego
  - na poziomie deployu aplikacji
  - na poziomie budowania aplikacji
  - na poziomie statycznej analizy kodu
  - na poziomie testowania - jednostkowego, akceptacyjnego (w oparciu o acceptance criteria), funkcjonalnego
- Zwróć uwagę na zrównoleglenie procesów automatycznych. W przypadku testów automatycznych opartych o Selenium można wykorzystać Selenium-Grid w celu równoległego uruchomienia testów na różnych komputerach (z różnymi przeglądarkami, systemami operacyjnymi).

## Baza danych

- Tak samo jak wersjonujesz kod, wersjonuj bazę danych korzystając np. z LiquidBase

## Narzędzia

- Poznaj swoje narzędzia - **dobrze** je poznaj. Są twoim przyjacielem. To one mogą wspomagać i ułatwiać Twoja codzienna pracę
- Poznaj skróty klawiszowe IDE z którego korzystasz
- Dobrze poznaj możliwości języka programowania oraz frameworka
- Wykorzystaj dowolny system wersjonowania
- Używaj systemu zarządzania projektami, zgłaszania błędów

## Spotkania

- Jeżeli jesteś uczestnikiem spotkania staraj się do niego przygotować, przejrzyj dostępne Ci materiały na temat spotkania, stwórz notatki na temat swoich przemyśleń - pomysłów na usprawnienia, dobrych i złych stron
- Jeżeli prowadzisz spotkanie, wyślij agende spotkania uczestnikom. Opisz krótko każdy z punktów. Podziel czas spotkania w odpowiedni sposób pomiędzy konkretnymi punktami agendy. Zdefiniuj główny cel spotkania

## Klient vs Pracodawca vs Programista

- *"Interesuj się statkiem którym przyszło Ci płynąć"* ~ Robert c. Martin
- Staraj się zrozumieć biznes, cel i potrzeby klienta. Ciężko rozwiązywać problemy klientów, jeśli ich wcześniej dobrze nie zrozumiemy...
- Znaj cele i wymagania pracodawcy, myśl tymi kategoriami. Profesjonalny programista poświęca czas na poznanie swojej firmy i branży, rozmawia o problemach, stara się je zrozumieć i proponuje możliwości ich rozwiązania mając na uwadze swoja wiedzę o technologi: problem + software = rozwiązanie problemu.

## Współpraca

- Zadaj pytanie > Daj wypowiedzieć się reszcie > Podsumuj oraz dodaj swoje za i przeciw
- Decyzje powinny zostać podjęte przez zespół - tak aby każdy z członków utożsamiał się z decyzją
- Podchodź do każdego swojego współpracownika w inny - najbardziej dostosowany sposób. Każdy człowiek jest inny. Pamiętaj o tym.
- Kod jest własnością zespołu a nie poszczególnych jego członków.
  - Jeżeli napotykasz komentarze w stylu @TODO, @FIXME, nazwy zmiennych, funkcji, metod lub klas nie spełniają konwencji - zmień je.
  - Jeżeli w którymś z fragmentów kodu napotykasz błąd, nie identyfikuj go z osobą która go popełniła.
  - Nie ustrzegaj się poprawy błędów w kodzie który nie został napisany przez Ciebie.
  - Pamiętaj to kod zespołu - każdy z członków odpowiada za całość, a nie tylko za wybrane fragmenty.
- Praca w parach to:
  - Efektywny sposób rozwiązywania problemów - nawet jeżeli jeden z programistów jest znużony pracą nad problemem
  - Dobry moment na dokonywanie inspekcji kodu na bieżąco
  - Świetny sposób na dzielenie się wiedza
  - Odpowiedni czas na poznawanie rożnych (nieznanych Ci) części systemu
  - Pamiętaj - co dwie głowy to nie jedna!
- Bądź częścią zespołu nie samotnikiem z słuchawkami na uszach - jako zespół np. siedźcie razem, twarzą do siebie czyli tworząc okrąg - tak aby podsłuchać mamrotanie kolegi, prowadzić spontaniczną werbalna i niewerbalna komunikacje
- Nucz się przyjmować pomoc oraz o nią prosić. Jeżeli siedzisz z zespołem w jednym pokoju wstań i powiedz "Potrzebuje pomocy". Wykorzystaj dostępne Ci media - StackOverflow, Facebook, Twitter, fora internetowe, e-mail, telefon. *"Zdecydownie nieprofesjonalne jest stanie w miejscu, podczas gdy pomoc jest tak łatwo dostępna"* ~ Robert C. Martin