# Better Programmer

Clean Code & Good Practices & Pragmatic Programmer

## Przedmowa

Dokument ten jest zbiorem dobrych rad i przemyśleń dotyczących wytwarzania oprogramownia oraz postępowania zawodowego programisty. To efekt zdobytego doświadczenia poprzez:

- pracę nad nowymi projektami,
- rozwój odziedziczonych aplikacji,
- czytanie artykułów i książek,
- udział w konferencjach i szkoleniach,
- a co najważniejsze - możliwość pracy z bardziej doświadczonymi ludźmi.

Pewne punkty są "zainspirowane" oryginalnym źródłem z którego pochodzą - traktuj to raczej jako zbiór pomocnych informacji niżeli w pełni autorską pracę.

## Spis treści

- [Podstawowe zasady](#podstawowe-zasady)
- [Rekrutacja](#rekrutacja)
- ~~Testowanie oprogramowania~~
- ~~Komentowanie kodu~~
- ~~Standard kodowania~~
- [Code Review](#code-review)
- [Refaktoryzacja](#refaktoryzacja)
- [Wymiana i zdobywanie wiedzy](#wymiana-i-zdobywanie-wiedzy)
- [DOJO programowania](#dojo-programowania)
- [Automatyzacja](#automatyzacja)
- [Baza danych](#baza-danych)
- [Narzędzia](#narzędzia)
- ~~Projekty i ich prowadzenie~~
- [Spotkania](#spotkania)
- ~~Szacowanie~~
- ~~Zarządzanie czasem~~
- [Klient vs Pracodawca vs Programista](#klient-vs-pracodawca-vs-programista)
- [Współpraca](#współpraca)
- ~~Debugowanie~~
- ~~Praca nad kodem~~
- [Programowanie obiektowe](#programowanie-obiektowe)
- ~~Motywacja~~
- ~~Agile i Scrum~~
- [TDD](#tdd)
- ~~BDD~~

## Podstawowe zasady

**Dziel i zwyciężaj** - większe elementy rozbijaj na mniejsze, pracuj nad mniejszymi w odpowiedniej kolejności.

**Pamiętaj o priorytetach** - te z większym priorytetem wykonuj najpierw, niezależnie od Twojego "widzi mi się" i samopoczucia, dopiero potem zabierz się za te z niższym priorytetem.

**DRY - Don't Repeat Yourself** - automatyzuj procesy tak często jak to się tylko da. Jeżeli powtarzasz daną czynność kilka razy - pomyśl nad zautomatyzowaniem jej (skrypt bash/bat, prosta własna lub gotowa aplikacja). Nie dotyczy ona tylko Twojego kodu - dotyczy także każdego innego aspektu związanego z Twoją pracą.

**Brzytwa Ockhama** - spośród wielu możliwych najlepsze jest wyjaśnienie najprostsze.

**S.M.A.R.T.** - każdy wyznaczany cel powinien być:

- Simple - jednoznaczny, jasno sformułowany,
- Measurable - mierzalny, można zmierzyć postęp,
- Achievable - osiągalny, realistyczny, wykonalny w określonym czasie,
- Relevant - istotny, ważny krok w przód,
- Timely defined - określony w czasie, ma swoją "datę zakończenia".

**Zasada Pareto (zasada 80/20)** - 20% pracy przynosi 80% zysku.

**KISS** - Keep It Simple, Stupid.

**Too Many Targets** - Skupiaj się na jednej rzeczy. Rozpocznij ją i skończ. Nie zostawiaj rzeczy częściowo zrealizowanych - ciężko się do nich wraca.

**Latency Numbers Every Programmer Should Know** - [via Jonas Bonér](https://gist.github.com/jboner/2841832)

## Rekrutacja

- Warto zadbać o listę przygotowanych pytań, które zadajemy każdemu kandydatowi. Pod każdą z technologii (z której nasza wiedza pozwala na rekrutowanie :-)) przygotowujemy pytania o formie otwartej. Ważne aby pytania pogrupować według poziomu - rozpoczynając od tych najłatwiejszych, kończąc na tych najtrudniejszych. Takie pogrupowanie bardzo pomaga w przełamywaniu pierwszych lodów dodatkowo dajesz czas kandydatowi na obycie się z Twoją własną osobą.
- Podczas rekrutacji możesz poprosić kandydata o wykonanie którego z następujących zadań:
  - **Code Review** - kandydat otrzymuje fragment kodu łamiący ogólnoprzyjete standardy i dobre praktyki. Jego zadaniem jest przeprowadzenie procesu Core Review, wytykając jak największa ilość uchybień i możliwych usprawnień.
  - **Live Coding** - podczas spotkania rekrutacyjnego kandydat otrzymuje zadanie/problem do rozwiązania na komputerze. Ma na to X czasu. Może to być kilka mniejszych zadań programistycznych np. przerobienie jakiegoś wzoru matematycznego na kod, operacje na tablicach itp.
  - **Zadanie z modelowania** - kandydat dostaje zadanie którego celem jest zaprojektowania systemu (pod względem architektury niższego lub wyższego poziomu - klasy/wzorce projektowe lub architektura elementów systemu - serewer www, serwer kolejki, aplikacja).

## Code Review

> Ask a developer to review 10 lines of code and he’ll find 10 issues, ask him to review 500 lines and he’ll say it looks good.

- Systematycznie wykonywany proces mający na celu:
  - znalezienie i naprawienie błędów,
  - poprawienie jakości kodu - spójność, wzorce, dobre praktyki
  - zwiększenie wiedzy i umiejętności programistów - "Jedna rozmowa z mądrym człowiekiem jest lepsza niż dziesięć lat studiów"
  - uczynienie kodu tak dobrym, jak to tylko możliwe
- Przegląd kodu wykonywany powinien być zanim zaimplementowane zmiany trafią do QA
- Zawsze rób Code Review - nawet dla zmian w jednym wierszu. Często jeden wiersz może mieć konsekwencje w całym systemie. Przemyśl wszystkie możliwe skutki takiej zmiany.
- Niech review dotyczy commitów / merge request dla konkretnej jednej funkcjonalności, nie zbioru ostatnich zmian z ostatniego tygodnia. Łatwiej odnaleźć kontekst i szukać potencjalnych defektów.
- Autor kodu niech opisze co wprowadza konkretny commit / merge request - niech opisze funkcjonalność która została dodana / zmieniona. Nie rozchodzi się o komentarze w kodzie per klasa/metoda/argument lecz o kontekst wykonanej zmiany i sposób jej wykonania (zmiany dotyczą YYY, w tym wypadku zastosowałem wzorzec XXX ponieważ ....). Często opisując kod w taki sposób sami jesteśmy w stanie wyłapać wiele defektów, których nie zauważyliśmy podczas programowania.
- Code Review to także dobry moment aby razem usiąść nad kodem i podyskutować o podjętych decyzjach i rozwiązaniach.

### Code Review Checklist

Przygotuj listę rzeczy o których warto pamiętać podczas inspekcji kodu. Może to być na przykład zbiór najczęściej pojawiających się defektów w waszym kodzie. Warto pomyśleć o liście ogólnej jak i również dla każdego z autorów (częste defekty które wykonuje dany programista - choć powinien nad nimi pracować aby eliminować powtarzające się problemy :-))

### Przydatne definicje

- Inspection Rate - jak szybko dokonujemy inspekcji, ilość linii kodu na godzinę
- Defect Rate - ile defektów jesteśmy w stanie odnaleźć w jednostce czasu, ilość defektów na godzinę
- Defect Density - ile defektów jesteśmy w stanie odnaleźć w danej ilości kodu (o ile istnieją takowe), ilość defektów na tysiąc linii kodu
  
## Refaktoryzacja

Proces wprowadzania zmian w kodzie - nie wprowadzający funkcjonalności lecz wprowadzający ulepszenia w kwestii **jakości kodu**.

### Co daje nam refaktoryzacja?

- poprawia jakość kodu, a tym samym oprogramowania
- kod jest bardziej czytelny, można go szybciej zrozumieć
- może wpłynąć na szybsze wprowadzanie kolejnych zmian w oprogramowaniu (wpływa na to m.in czytelność kodu, jego ujednolicenie)

### Zagrożenia jakie niesie za sobą refaktoryzacja

- duża refaktoryzacja wykonana wraz z wprowadzeniem nowej funkcjonalności
  - bałagan w commitach, wykonaj te czynności osobno!
  - zrób refaktoryzację -> commit
  - zaimplementuj nową funkcjonalność -> commit
- późno wprowadzona refaktoryzacja jest ciężka do przeprowadzenia i nie koniecznie musi przynieść korzyści ponieważ możemy mieć za dużo do zrobienia
- testy też się refaktoryzuje - cykl refactor metodyki TDD nie dotyczy tylko produkcyjnego kodu
- może spowodować większe lub mniejsze problemy z wydajnością aplikacji (więcej wywołań metod, wiekszy poziom abstrakcji)

### Jak unikać ryzyka?

- małe kroki, małe commity
- miej wcześniej przygotowane testy - tak aby mieć pewność, że wprowadzane zmiany nie wprowadzą błędów
- systematycznie wykonuj refaktoryzację
- musimy wiedzieć kiedy zacząć, kiedy kończyć, kiedy nie refaktoryzować
- ustalaj osiągalne cele w kwestii refaktoryzacji (zasada S.M.A.R.T)
- pamiętaj, że refaktoryzacja nie poprawia błędów funkcjonalnych
- jeżeli nie masz czasu, który możesz specjalnie święcić na refaktoryzację, to refaktoryzuj *przy okazji* - przed/po dodaniem nowej funkcjonalności - jeżeli trzeba zrefaktoruj "otoczenie" w którym dana funkcjonalność zostanie zaimplementowana

### Na co zwracać uwagę?
  
- klarmy dla instrukcji warunkowej ```if``` są bardzo ważne! nawet dla *jednolinijkowca*, ich brak sprawia problemy z czytelnością kodu
- długa lista obiektów od których jest zależna klasa
- duplikacja (np. ekstrakcja klasy bazowej jeżeli w wielu klasach używamy tego samego kodu, opakowanie często wykonywanych instrukcji w funkcję)
- martwy kod (usuń go),
- łańcuchy wiadomości ```->get()->get()```,
- nieadekwatne komentarze do tego co faktycznie robi kod
- długie metody/funkcje/klasy (rozbij na kilka mniejszych)
- magic numbers (zmiana na stałe, zmienne)
- długa lista parametrów (wprowadzenie obiektu)
- ```switch``` / długa lista instrukcji ```if``` (zmiana na *wzorzec strategii*)

### Refactoring w parach

- jeżeli partner nie rozumie tego co robisz - to robisz to prawdopodobnie źle
- szybciej idetyfikujecie możliwe problemy
- co dwie pary oczu to nie jedna - Twój partner może dostrzegać szerszy kontekst wprowadzanych zmian
- pobudzanie pewności siebie + praca nad współpracą

## Wymiana i zdobywanie wiedzy

- Miej mentora - kogoś kto doradzi Ci w rozwoju Twojej kariery jako programista
- Dobrze jest pracować z lepszymi od siebie - wtedy najszybciej się uczysz, a przy okazji podświadomie starasz się nie odstawać od reszty, w drugą stronę działa to identycznie - "jeśli wejdziesz między wrony, musisz krakać tak jak one"
- Prowadź bloga
  - swojego prywatnego
  - wewnątrz firmowego dotyczącego projektu i zespołu
- Gromadź wiedzę która zdobywasz - prowadź swoja wiki, notuj je na Google Drive, Evernote
- Posiadaj listę artykułów do przeczytania - może to być folder "READ LATER" z zakładkami w przeglądarce internetowej lub skorzystaj z getpocket.com
- Obserwuj i czytaj blogi, zapisuj ważniejsze rzeczy tak aby w przyszłości móc do nich szybko powrócić
- Twórz listę terminów, narzędzi, wzorców projektowych, rozwiązań itp. których jeszcze nie przyswoiłeś - tak aby w wolnej chwili wiedzieć o czym możesz poczytać
- Według *Roberta C. Martina* minimalna lista rzeczy, które powinien wiedzieć każdy zawodowy twórca oprogramowania wygląda następująco:
  - Wzorce projektowe - wszystkie 24 opisane w książce GOF i mieć doświadczenie z wieloma wzorcami opisywanymi w książkach POSA
  - Zasady projektowania. Musisz znać zasady SOLID
  - Metody. Metodologie - XP, Scrum, Lean, Kanban, wodospadu, analizy strukturalnej i projektowania strukturalnego
  - Dziedziny. Korzystanie z TDD, projektowania obiektowego, programowania strukturalnego, ciągłej integracji i programowania w parach
  - Artefakty. Umiejętność korzystania z UML, DFD, wykresów struktur, sieci Petriego, diagramów i tabel przejść stanów, diagramów przepływu oraz tabeli decyzji
- "Nie mam czasu" - nie jest wymówką, prawdopodobnie źle zarządzasz swoim czasem. MUSISZ mieć czas na rozwój, naukę nowych technologii/narzędzi, w innym wypadku - wypadniesz z gry.
- Wymyślaj MAŁE i PROSTE projekty które możesz szybko zrealizować w nieznanych Ci językach programowania, z wykorzystaniem nieznanych Ci narzędzi. To świetna okazja na naukę czegoś nowego. Przykłady takich projektów? Proszę:
  - komunikacja z API - np. GitHub, Twitter,
  - analiza wydźwięku komentarzy - np. znajdujących się w bazie noSQL,
  - RealTime Chat - np. websockets, TCP/IP,
  - klient któregoś z protokołów - np. HTTP, IRC, FTP,
  - lista ToDo (nazywana ostatnio nowym "Hello Worldem" programowania)
- Jednak nie nauczysz się niczego, jeżeli będzie próbował nauczyć się wszystkiego.

### Wymiana wiedzy - *Show And Tell*
  - spotkanie podczas którego jedna osoba (lub więcej) opracowuje prezentację (najlepiej live) przedstawiająca interesujący temat (narzędzie, rozwiązanie problemu itp.)

### Wymiana wiedzy - *Technical Meeting*
  - spotkania dotyczące tego co dzieje się w projekcie, napotkanych problemów i zastosowanych rozwiązań - pod względem technicznym!
  - jeżeli omawiacie na bieżąco występujące problemy to spotkanie niech będzie podsumowaniem wykonanych akcji
  - notujcie gdzieś poruszone kwestie
  - spotkanie powinno posiadać formę dyskusji

##  DOJO programowania

*"Ćwiczenia wykonuje nie wtedy gdy Ci za to płacą. Wykonuj je po to aby uzyskać dobrą zapłatę za swoją pracę"* ~ Robert C. Martin

### Kata

Jedna osoba pisze kod, reszta uczestników powtarza za nim te czynności. Ćwiczenie polega na rozwiązywaniu dobrze znanego problemu. Nie chodzi o wymyślenie rozwiązania problemu - rozwiązanie jest dobrze znane, ale o wyćwiczenie związanych z nim ruchów oraz decyzji. Celem jest także dążenie do perfekcji - powtarzasz ćwiczenie raz za razem. Dobre na nauczenie się skrótów klawiszowych IDE, idiomów nawigacyjnych, TDD oraz CI.

### Wasa

Dwóch programistów odgrywa role agresora a drugi próbuje się bronić. Jeden z nich pisze test jednostkowy, drugi musi sprawić, że zostanie on zaliczony. Zmieniając się co jakiś czas rolami. Proces, który może wspomagać naukę takich metodologii jak TDD.

### Randori

Zawartość ekranu rzutowana jest na ścianę. Jedna osoba pisze test i siada na swoje miejsce. Następna osoba sprawia, że test zostaje zaliczony i pisze kolejny test. Można powtarzać w odpowiedniej kolejności lub poszczególne osoby mogą się po prostu zgłaszać, jeżeli czują taką potrzebę.

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
- Wykorzystaj *.bash_profile* dodając do niego np. aliasy dla długich poleceń. Jako przykład może posłużyć Ci: https://jtreminio.com/2012/04/my-bash-aliases-file/
- Ciężko jest zbudować coś "na już" od zera. Naucz się korzystać z Boilerplate Code, a nawet stówrz własny z ulubionym zestawem narzędzi - wtedy start nad koncepcyjnym rozwiązaniem będzie o wiele łatwiejszy i szybszy. Po co, po raz kolejny tworzyć konfigurację z często używanymi rozwiązaniami dla Grunta, Bowera, Composera itp?

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
- Bądź częścią zespołu nie samotnikiem z słuchawkami na uszach - jako zespół np. siedźcie razem, twarzą do siebie czyli tworząc okrąg - tak aby podsłuchać mamrotanie kolegi, prowadzić spontaniczną werbalna i niewerbalna komunikacje
- Nucz się przyjmować pomoc oraz o nią prosić. Jeżeli siedzisz z zespołem w jednym pokoju wstań i powiedz "Potrzebuje pomocy". Wykorzystaj dostępne Ci media - StackOverflow, Facebook, Twitter, fora internetowe, e-mail, telefon. *"Zdecydownie nieprofesjonalne jest stanie w miejscu, podczas gdy pomoc jest tak łatwo dostępna"* ~ Robert C. Martin

### Praca w parach
  
- Efektywny sposób rozwiązywania problemów - nawet jeżeli jeden z programistów jest znużony pracą nad problemem
- Dobry moment na dokonywanie inspekcji kodu na bieżąco
- Świetny sposób na dzielenie się wiedza
- Odpowiedni czas na poznawanie rożnych (nieznanych Ci) części systemu
- Pamiętaj - co dwie głowy to nie jedna!

## Programowanie obiektowe

- przekładanie kompozycji ponad dziedziczenie
- luźne zależności pomiędzy obiektami

### Zasady SOLID

### Reuse/Release Equivalence Principle (REP)

- Kod nie powinien być ponownie wykorzystany przez skopiowanie go z jednego miejsca i wklejenie do drugiego - wyodrębnianie do postaci reużywalnych komponentów, bibliotek
- Autor odpowiedzialny jest za utrzymywanie takiego kodu
- Na przykładzie korzystania z gotowej biblioteki:
  - oczekujemy, że znalezione błędy będą naprawiane,
   - dodawane będą rozszerzenia które nie spowodują problemów z kompatybilnością
- Wymusza to na autorach bibliotek/komponentów:
  - wersjonowania wydań
  - pozwolenie na wykorzystywanie starszych wersji

### Common Reuse Principle (CRP)

- Klasy które ściśle współdziałają ze sobą, muszą być umieszczone razem w komponencie, takie klasy powinny być nierozłączne
- Klasy które nie są ze sobą powiązane nie powinny być umieszczane razem

### Common Closure Principle (CCP)

- SRP na poziomie pakietów/bibliotek
- Klasy które zmieniają się razem z tego samego powodu powinny być umieszczone razem w jednym komponencie
- Przy ewentualnych zmianach liczba komponentów, które należy przetestować i wydać (w postaci nowej wersji) będzie ograniczona

### Acyclic Dependencies Principle (ADP)

- Unikaj wszelkich cykli w grafie zależności komponentu
po czym poznać ADP? po prostu moduł pośrednio zależy sam od siebie

### Stable-Dependencies Principle (SPD)

- Powinno się tworzyć zależności do pakietów stabilnych a nie takich których API często ulega zmianom
- Jeżeli uzależniamy się od pakietu niestabilnego musimy przy każdej aktualizacji gruntownie przetestować pakiety od niego zależne a w gorszym przypadku nawet część z nich przepisać (warto opakowywać pakiety wzorcem mediatora lub adapteru, wtedy zmianę dokonujemy tylko w jednym miejscu a nie w każdym zależnym pakiecie)

### Stable-Abstractions Principle (SAP)

- Dopiero stabilny komponent powinien dążyć do abstrakcyjności
- Stabilny = abstrakcyjny, interfejs oparty o klasy abstrakcyjne
- Komponent niestabilny powinien składać się z klas konkretnych
- Uważaj jednak z wczesnym wdrażaniem abstrakcyjności - w momencie gdy zaczynasz abstrachować możesz nie mieć pełnej wiedzy domenowej i w późniejszym czasie możliwe, że abstrakcja którą wdrożyłeś jest wystarczająca

## TDD

### Red-Green-Refactor

- RED
  - Napisz test (jeden! mały!), nastepnie uruchom go - powinneś otrzymać FAIL
- GREEN
  - Zaimplementuj testowana funkcjonalność - zadbaj najpierw o to aby spełniała warunki testu, nie zamartwiaj się optymalizacją i refaktoryzacją to nie ten moment - uruchom go, test powinien zakończyć się sukcesem
- REFACTOR
  - Zrefaktoryzuj napisany kod. To jest ten czas aby wyglądał on pięknie a zarazem schludnie. Zrefaktoryzuj kod testu jak i również kod zaimplementowanej funkcjonalności, ale pamiętaj - nie zmieniaj zachowania kodu!

### Trzy prawa TDD

1. Nie można napisać nawet linii kodu produkcyjnego jeżeli wcześniej nie napisałeś do niego testu jednostkowego, który rzuca failem
2. Nie możesz napisać więcej testu jednostkowego niżeli jest to wymagane - nieudana kompilacja/interpretacja też powoduje, że test jest niezaliczony
3. Nie możesz napisać więcej kodu produkcyjnego niżeli jest to wymagane do zaliczenia wcześniej oblanego testu

### Zalety TDD

- Pewność, że wprowadzona zmiana niczego nie zepsuła - ponieważ tworzysz na bieżąco testy jednostkowe
- Współczynnik znajdowanych błędów - redukcja błędów w pisanym kodzie
- Dodaje odwagi podczas poprawiania kodu, którego nie znamy. Mamy pewność, że jeżeli coś zaczynamy poprawiać i nam się nie uda to po uruchomieniu testów jednostkowych mamy od razu informację na ten temat. Dzięki temu, jesteśmy bardziej skłonni do poprawiania bałaganu w kodzie - mam więcej odwagi aby go wyeliminować nie narażając aplikacji na nowe błędy
- Testy jednostkowe są bardzo dobrą dokumentacją kodu dla innych programistów. Opisują najniższy poziom projektu
- Napisanie testu jednostkowego przed implementacją kodu produkcyjnego zmusza Cię do przemyślenia jego architektury - piszesz dzięki temu testowalny kod - pamiętasz o dobrych praktykach m.in. Dependency Injection, Single Responsibility Principle
- Można napisać testy po implementacji ale wtedy testujesz kod który dobrze znasz - znasz jego dobre i złe strony. Na pewno nie napiszesz wtedy testu który celowo nie przechodzi - unikasz takich sytuacji ponieważ wiesz, że musisz wrócić do implementacji i ją poprawić

### Uwaga

Pamiętaj zawodowy programista nigdy nie stosuje metodologii, jeżeli sprawia mu ona kłopoty - ona ma ułatwiać pracę! Czasem pisanie w TDD jest uciążliwe i dobry programista potrafi to zrozumieć oraz dostosować proces tak aby był jak najbardziej odpowiedni do zaistniałych sytuacji.