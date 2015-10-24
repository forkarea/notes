# International PHP Conference 2015 Spring - Berlin

Data: *7 - 11 czerwca 2015*

Trendy: *Unit Testing*, *Domain-driven Development*, *Test-driven Development*, *Good Practice - SOLID*.

## Test-Driven Domain

warsztat: Sebastian Bergmann, Stefan Priebsch – thephp.cc

- Bizness zależny od technologii - ŹLE - w dupie masz z jakiego skorzysztasz framerowka/liba ? Abstrakcja. Nieuzależnianie się od technologii.
- Migracje zf1->sf2 (rewrite całego kodu), a powinismy zrobić write adapters do bissnes logic
- UI -> Bussines <- Infrastructure (odcinamy się od tego: framework, persistance – database)
- Analogia do piwa, skąd jest (czy z baru, sklepu, etc) – nikogo z nas to nie interesuje, ważne ze je mamy na wyciagnięcie reki i możemy ugasic pragnienie. Bar – to API, implementacja interfejsu
- Bussines opary o interface – ważne co chcemy, nie ważne w jaki sposób zostanie to zrealizowane ! (php 5.x w tym miejscu sssie, bo nie możesz okreslic ze oczekujesz kolekcji obiektów Y)
- Interfejsy i adaptery, Dependency inversion, Inversion of Control
- Co z libami zewnętrznymi od których uzależniony jest nasz BL? Np. new Data(), new Moment(). Podobnie jak z FV – czyli kolejny adapter
- „DDD” w PHPunit, bardziej opisowe testy, opisujące reguły biznesu (np. PremiumContract: - runs for twelve months, - can be renewed at any time, - cannot be downgraded to standard contract), uruchomiony z testdox parameter, output moze posluzyc wtedy juz jako opis regul biznesu na wiki
- w takim wypadku testy jednostkowe nie są tylko dokumentacją dla programisty ale także dla biznesu
- phpab – PHP Autoload Builder
- PHPUnit - @depends tag
- Prezentacja, programming w zakresie – DDD w TDD. Wytłumaczenie koncepcji wzorca Repository.
- Phary – composer/phpunit – nie w composer.json i siąganie per build a dostępne globalnie lub w folderze build/bin. Narzędzie składowe projektu wrzucone w CVS.
- Kasa zawsze w intigerach (groszach, zł / 100 gr).  new Money(100, „PLN”)
- Daty nie timestapy! – DateTime Objecty z Timezonem
- Uniezależniać kod od time() zahardkowanego w kodzie, zawsze przekazywać jako parametr
- CR na koniec nie dotyczył TDD/DDD a małych nieważnych gówien w stylu: startDate, endDate -> dateRange(s, e), brak modyfikatora dostępu przed function etc.
- Identyfikuj najważniejsze elementy logiki biznesowej – to pierwsze co powinieneś implementować. Zamodeluj najważniejsze Entity

Powiązane tematy to także: Hexagonal, Onion – Architecture, CQRS

## Composer Best Practices

- Omówienie semantic versioning
- Przedstawienie “script” w Composerze. Aby zapisać skróty do komend, np. potem tylko „composer test” i uruchamiają się testy aplikacji
- Commitowanie composer.lock (nie zgadzam się). Aby była powtarzalna instalacja u każdego. Pamiętać o nie deployowaniu go na serwer produkcyjny – można to potem wyszukać via gogle
- Omówienie problemu konfliktu zależności – vendor 1 korzystac z pack1.0 a vendor 2 korzysta z pack2.0 – problem nie do rozwiązania

## Cloud Development with a service of SasS – A Stroy to Continous Improvement

- Azure – rozwiązanie na wszystko – nawet development który powinien odbywać się w Cloudzie :stuck_out_tongue_winking_eye:
- Vagrant, Wirtualne maszyny to zło
- Przejście w Clouda może wiązać się ze zmianą modelu biznesowego – np. Przechodzimy bo będziemy robić z naszej apki SasS

## Five weird Tricks to become a better Developer

- Myśl
- Bądź empatyczny
- Masz doła, brak Ci motywacji – odetnij się na chwile od developmentu, zrób sobie przerwę, zajmij się czymś innym
- Bądź pragmatyczny
- Poświęć czasem więcej czasu, zautomatyzuj proces, używaj mądrze narzędzi, czytaj komunikaty – abyś nie musiał co uruchomienie softu klikać „zamknij” w okienku z tipami, po prostu je wyłącz

## Deep Dive into Browser Performance

- Performance przeglądarki jest bardzo ważny, to jest to co widzi użytkownik – czyli to co na niego jest najważniejsze
- Minimalizować lookupy DNS
- Optymalizacja CSSów – zmiejszanie ilości selektorów CSS, usuwanie nieużywanych
- JS – minifikacja, konkatenacja, standard
- Gzipowanie outputu
- Minimalizacja repaintów (to o czym gadali także koledzy z Ukrainy)
- Nie używać XPath
- Profilować, profilować, profilować – nie tylko lokalnie

## Modernize your PHP Codes

- Przedstawienie nowych featurów od PHP 5.3 do 5.6 (namespaces, traits – generalnie główne zmiany)

## Profiling with XHProof

- Omówienie czym jest, że ma możliwość zrzucania danych do – MySQL, MongoDb, Przedstawił narzędzie do wyświetlania logów (te standardowe)
- Nie profiluj tylko lokalnie, profiluj też zdalnie – co któryś request, na rzeczywistych danych
- Pamiętaj o czyszczeniu logów z xhproofa (aby Twoja baza nie ważyła potem 2.5TB)
- Im więcej użytkowników tym zmiejszaj ilość requestów które zapisujesz

## The Future of the Internet

Przedstawienie różnych wizji przyszłości - np wszczepiane chipy, wyostrzanie zmysłów, zgrywanie świadomości, AI jako osobisty asystent człowieka, VR, AR.

## ECMAScript 6 for real

- wykorzystywanie ECMAScript 6 w projektach produkcyjnych, pomimo braku wsparcia w przeglądarkach
- stack technologiczny i flow - co jest niezbędne do testowania i uruchomienia

## The three Dimensions of Testing

Bergmann przedstawił podział testów na 3 wymiary:

 - rola (np edge to edge testing) - należy zawsze określić sobie po co chcemy wykonywać testy, 
 - scope (ile części aplikacji potrzebne jest do uruchomienia testów), im mniej tym lepiej bo testy są dokładniejsze,
 - implementacja (narzędzia i sposób pisania testów np phpunit + webdriver). 
 
Zwrócił uwagę na potrzebę robienia testów integracyjnych - podał przykład rozbitej sondy marsjańskiej przez barak testów integracyjnych. 2 teamy kodziły moduł GPS obliczający trajektorię wejścia w atmosferę marsa. Jedni zakodzili w jednostkach metrycznych a drudzy w imperialnych. Dlatego trajektoria została źle obliczona i sonda się rozbiła. Testy powinny być bardzo wrażliwe na nieprawidłowe zachowania kodu i powinny jasno wskazywać miejsce w którym jest coś nie tak. Kod testowy również powinien być pisany zgodnie z regułami clean code. Na koniec pojazd po phpspec - wg Bergmana jest tam za dużo magii. 

Jak obiekty gadają ze sobą przez mockowanie:
po co się mockuje, Rodzaje mocków, solid - jak dzięki testom wyłapać błędy związane z SOLID, nowy tool do mockowania w phpunit - prophecy, 
http://www.slideshare.net/everzet/design-how-your-objects-talk-through-mocking,

## Take care of your Logs with ELK

- Elasticsearch, Logstash, Kibana.
- oraz narzędzia poboczne curator, heka, rsyslog, logstash-forwarder, logtail, monolog 
- aplikacje wspomagające logowanie, pokazał konfigurację i jak to w rzeczywistości wygląda

## Extract till you drop

Refactor Legacy Code na żywo - wykorzstanie możliwości PHPStorm (skróty klawiszowe) z PHPUnit i CodeCoverage

## Localize your Frontend

Zaadresowano główne problemy związne z lokalizacją frontendu. Formatowanie liczb, dat, czasu, pieniędzy, stringów. Mówiła o narzędziu wspmogającym lokalizowanie frontu - phraseup. Mówiła o bibliotekach numeric.js, google closure, max ci powie, intl w przeglądarce - koncept na razie nie rozwinięty.

## Decoupling the Model from the Framework

Gadka o Event driven design. Na początku należy sobie wylistować jakie zdarzenia domenowe mają miejsce w naszym systemie, a następnie zamodelować sobie cały flow propagacji eventów i ich obsługi.

## PHP 7: What changed internally?

Mięso - w jaki sposób zoptymalizowano core nowego php że uzyskano 2 krotny wzrost wydajności. Gość omówił różnice (php 5.5 vs php 7) w strukturach danych typów danych w php 

## Surviving the next Upgrade

Stefan opowiedział o problemie zależności w projektach. Wskazał problem aktualizowania vendora którego wykorzystujemy w projekcie. Nie powinno być sytułacji kiedy nasz biznes zależy od kogoś innego i nie mamy nad tym tak naprawdę żadnej kontroli. Pokazał jak do tego dobrze podchodzić (najlepiej unikać). Przekazywanie całego kontenera DI np do kontrollera nie jest dobrym pomysłem. Podał przykład z symfony kod $this->get('mailer'); nie wiadomo co zwraca. Lepiej zrobić metodę getMailer() gdzie można zdefiniować sobie konkretnie co metoda ma zwrócić, a najlepiej wstrzykiwać zależność przez konstruktor. Zawsze należy konkretnie definiować zależności. Aby odzielić naszą domenę od frameworka należy definiować interfejs który będzie odzwierciedlał potrzeby logiki domenowej a następnie pisać do tego adaptery. Dzięki temu zmiana w zależnych komponentach frameworka pociągnie za sobą jedynie konieczność zmiany adaptera a nie interfejsu naszej domeny. 

## Optimizing the Performance of Mobile Web Apps

Ogólnie head of development mobidev wywarł bardzo słabe wrażenie. Panowie pokazali kilka przydatnych tipów które można wykorzystać podczas tworzenia aplikacji mobilnej. Pokazali flow jak wygląda generowanie strony html w przeglądarce. Pokazali problem z repaintem elementów layoutu podczas robienia animacji. Pokazali jak przenosić operacje do gpu które jesty wydajniejsze przy niektórych animacjach. Wykorzystanie wzorców projektowych Flyweight i Observer.