# International PHP Conference 2015 Spring - Berlin

Data: *7 - 11 czerwca 2015*

Trendy: *Unit Testing*, *Domain-driven Development*, *Test-driven Development*, *Good Practice - SOLID*.

## Test-Driven Domain

warsztat: Sebastian Bergmann, Stefan Priebsch – thephp.cc

- Bizness zale¿ny od technologii - LE - w dupie masz z jakiego skorzysztasz framerowka/liba ? Abstrakcja. Nieuzale¿nianie siê od technologii.
- Migracje zf1->sf2 (rewrite ca³ego kodu), a powinismy zrobiæ write adapters do bissnes logic
- UI -> Bussines <- Infrastructure (odcinamy siê od tego: framework, persistance – database)
- Analogia do piwa, sk¹d jest (czy z baru, sklepu, etc) – nikogo z nas to nie interesuje, wa¿ne ze je mamy na wyciagniêcie reki i mo¿emy ugasic pragnienie. Bar – to API, implementacja interfejsu
- Bussines opary o interface – wa¿ne co chcemy, nie wa¿ne w jaki sposób zostanie to zrealizowane ! (php 5.x w tym miejscu sssie, bo nie mo¿esz okreslic ze oczekujesz kolekcji obiektów Y)
- Interfejsy i adaptery, Dependency inversion, Inversion of Control
- Co z libami zewnêtrznymi od których uzale¿niony jest nasz BL? Np. new Data(), new Moment(). Podobnie jak z FV – czyli kolejny adapter
- „DDD” w PHPunit, bardziej opisowe testy, opisuj¹ce regu³y biznesu (np. PremiumContract: - runs for twelve months, - can be renewed at any time, - cannot be downgraded to standard contract), uruchomiony z testdox parameter, output moze posluzyc wtedy juz jako opis regul biznesu na wiki
- w takim wypadku testy jednostkowe nie s¹ tylko dokumentacj¹ dla programisty ale tak¿e dla biznesu
- phpab – PHP Autoload Builder
- PHPUnit - @depends tag
- Prezentacja, programming w zakresie – DDD w TDD. Wyt³umaczenie koncepcji wzorca Repository.
- Phary – composer/phpunit – nie w composer.json i si¹ganie per build a dostêpne globalnie lub w folderze build/bin. Narzêdzie sk³adowe projektu wrzucone w CVS.
- Kasa zawsze w intigerach (groszach, z³ / 100 gr).  new Money(100, „PLN”)
- Daty nie timestapy! – DateTime Objecty z Timezonem
- Uniezale¿niaæ kod od time() zahardkowanego w kodzie, zawsze przekazywaæ jako parametr
- CR na koniec nie dotyczy³ TDD/DDD a ma³ych niewa¿nych gówien w stylu: startDate, endDate -> dateRange(s, e), brak modyfikatora dostêpu przed function etc.
- Identyfikuj najwa¿niejsze elementy logiki biznesowej – to pierwsze co powinieneœ implementowaæ. Zamodeluj najwa¿niejsze Entity

Powi¹zane tematy to tak¿e: Hexagonal, Onion – Architecture, CQRS

## Composer Best Practices

- Omówienie semantic versioning
- Przedstawienie “script” w Composerze. Aby zapisaæ skróty do komend, np. potem tylko „composer test” i uruchamiaj¹ siê testy aplikacji
- Commitowanie composer.lock (nie zgadzam siê). Aby by³a powtarzalna instalacja u ka¿dego. Pamiêtaæ o nie deployowaniu go na serwer produkcyjny – mo¿na to potem wyszukaæ via gogle
- Omówienie problemu konfliktu zale¿noœci – vendor 1 korzystac z pack1.0 a vendor 2 korzysta z pack2.0 – problem nie do rozwi¹zania

## Cloud Development with a service of SasS – A Stroy to Continous Improvement

- Azure – rozwi¹zanie na wszystko – nawet development który powinien odbywaæ siê w Cloudzie :stuck_out_tongue_winking_eye:
- Vagrant, Wirtualne maszyny to z³o
- Przejœcie w Clouda mo¿e wi¹zaæ siê ze zmian¹ modelu biznesowego – np. Przechodzimy bo bêdziemy robiæ z naszej apki SasS

## Five weird Tricks to become a better Developer

- Myœl
- B¹dŸ empatyczny
- Masz do³a, brak Ci motywacji – odetnij siê na chwile od developmentu, zrób sobie przerwê, zajmij siê czymœ innym
- B¹dŸ pragmatyczny
- Poœwiêæ czasem wiêcej czasu, zautomatyzuj proces, u¿ywaj m¹drze narzêdzi, czytaj komunikaty – abyœ nie musia³ co uruchomienie softu klikaæ „zamknij” w okienku z tipami, po prostu je wy³¹cz

## Deep Dive into Browser Performance

- Performance przegl¹darki jest bardzo wa¿ny, to jest to co widzi u¿ytkownik – czyli to co na niego jest najwa¿niejsze
- Minimalizowaæ lookupy DNS
- Optymalizacja CSSów – zmiejszanie iloœci selektorów CSS, usuwanie nieu¿ywanych
- JS – minifikacja, konkatenacja, standard
- Gzipowanie outputu
- Minimalizacja repaintów (to o czym gadali tak¿e koledzy z Ukrainy)
- Nie u¿ywaæ XPath
- Profilowaæ, profilowaæ, profilowaæ – nie tylko lokalnie

## Modernize your PHP Codes

- Przedstawienie nowych featurów od PHP 5.3 do 5.6 (namespaces, traits – generalnie g³ówne zmiany)

## Profiling with XHProof

- Omówienie czym jest, ¿e ma mo¿liwoœæ zrzucania danych do – MySQL, MongoDb, Przedstawi³ narzêdzie do wyœwietlania logów (te standardowe)
- Nie profiluj tylko lokalnie, profiluj te¿ zdalnie – co któryœ request, na rzeczywistych danych
- Pamiêtaj o czyszczeniu logów z xhproofa (aby Twoja baza nie wa¿y³a potem 2.5TB)
- Im wiêcej u¿ytkowników tym zmiejszaj iloœæ requestów które zapisujesz

## The Future of the Internet

Przedstawienie ró¿nych wizji przysz³oœci - np wszczepiane chipy, wyostrzanie zmys³ów, zgrywanie œwiadomoœci, AI jako osobisty asystent cz³owieka, VR, AR.

## ECMAScript 6 for real

- wykorzystywanie ECMAScript 6 w projektach produkcyjnych, pomimo braku wsparcia w przegl¹darkach
- stack technologiczny i flow - co jest niezbêdne do testowania i uruchomienia

## The three Dimensions of Testing

Bergmann przedstawi³ podzia³ testów na 3 wymiary:

 - rola (np edge to edge testing) - nale¿y zawsze okreœliæ sobie po co chcemy wykonywaæ testy, 
 - scope (ile czêœci aplikacji potrzebne jest do uruchomienia testów), im mniej tym lepiej bo testy s¹ dok³adniejsze,
 - implementacja (narzêdzia i sposób pisania testów np phpunit + webdriver). 
 
Zwróci³ uwagê na potrzebê robienia testów integracyjnych - poda³ przyk³ad rozbitej sondy marsjañskiej przez barak testów integracyjnych. 2 teamy kodzi³y modu³ GPS obliczaj¹cy trajektoriê wejœcia w atmosferê marsa. Jedni zakodzili w jednostkach metrycznych a drudzy w imperialnych. Dlatego trajektoria zosta³a Ÿle obliczona i sonda siê rozbi³a. Testy powinny byæ bardzo wra¿liwe na nieprawid³owe zachowania kodu i powinny jasno wskazywaæ miejsce w którym jest coœ nie tak. Kod testowy równie¿ powinien byæ pisany zgodnie z regu³ami clean code. Na koniec pojazd po phpspec - wg Bergmana jest tam za du¿o magii. 

Jak obiekty gadaj¹ ze sob¹ przez mockowanie:
po co siê mockuje, Rodzaje mocków, solid - jak dziêki testom wy³apaæ b³êdy zwi¹zane z SOLID, nowy tool do mockowania w phpunit - prophecy, 
http://www.slideshare.net/everzet/design-how-your-objects-talk-through-mocking,

## Take care of your Logs with ELK

- Elasticsearch, Logstash, Kibana.
- oraz narzêdzia poboczne curator, heka, rsyslog, logstash-forwarder, logtail, monolog 
- aplikacje wspomagaj¹ce logowanie, pokaza³ konfiguracjê i jak to w rzeczywistoœci wygl¹da

## Extract till you drop

Refactor Legacy Code na ¿ywo - wykorzstanie mo¿liwoœci PHPStorm (skróty klawiszowe) z PHPUnit i CodeCoverage

## Localize your Frontend

Zaadresowano g³ówne problemy zwi¹zne z lokalizacj¹ frontendu. Formatowanie liczb, dat, czasu, pieniêdzy, stringów. Mówi³a o narzêdziu wspmogaj¹cym lokalizowanie frontu - phraseup. Mówi³a o bibliotekach numeric.js, google closure, max ci powie, intl w przegl¹darce - koncept na razie nie rozwiniêty.

## Decoupling the Model from the Framework

Gadka o Event driven design. Na pocz¹tku nale¿y sobie wylistowaæ jakie zdarzenia domenowe maj¹ miejsce w naszym systemie, a nastêpnie zamodelowaæ sobie ca³y flow propagacji eventów i ich obs³ugi.

## PHP 7: What changed internally?

Miêso - w jaki sposób zoptymalizowano core nowego php ¿e uzyskano 2 krotny wzrost wydajnoœci. Goœæ omówi³ ró¿nice (php 5.5 vs php 7) w strukturach danych typów danych w php 

## Surviving the next Upgrade

Stefan opowiedzia³ o problemie zale¿noœci w projektach. Wskaza³ problem aktualizowania vendora którego wykorzystujemy w projekcie. Nie powinno byæ sytu³acji kiedy nasz biznes zale¿y od kogoœ innego i nie mamy nad tym tak naprawdê ¿adnej kontroli. Pokaza³ jak do tego dobrze podchodziæ (najlepiej unikaæ). Przekazywanie ca³ego kontenera DI np do kontrollera nie jest dobrym pomys³em. Poda³ przyk³ad z symfony kod $this->get('mailer'); nie wiadomo co zwraca. Lepiej zrobiæ metodê getMailer() gdzie mo¿na zdefiniowaæ sobie konkretnie co metoda ma zwróciæ, a najlepiej wstrzykiwaæ zale¿noœæ przez konstruktor. Zawsze nale¿y konkretnie definiowaæ zale¿noœci. Aby odzieliæ nasz¹ domenê od frameworka nale¿y definiowaæ interfejs który bêdzie odzwierciedla³ potrzeby logiki domenowej a nastêpnie pisaæ do tego adaptery. Dziêki temu zmiana w zale¿nych komponentach frameworka poci¹gnie za sob¹ jedynie koniecznoœæ zmiany adaptera a nie interfejsu naszej domeny. 

## Optimizing the Performance of Mobile Web Apps

Ogólnie head of development mobidev wywar³ bardzo s³abe wra¿enie. Panowie pokazali kilka przydatnych tipów które mo¿na wykorzystaæ podczas tworzenia aplikacji mobilnej. Pokazali flow jak wygl¹da generowanie strony html w przegl¹darce. Pokazali problem z repaintem elementów layoutu podczas robienia animacji. Pokazali jak przenosiæ operacje do gpu które jesty wydajniejsze przy niektórych animacjach. Wykorzystanie wzorców projektowych Flyweight i Observer.