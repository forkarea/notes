# dBConf 2015 - Hucisko

Data: *23 - 25 października 2015*

Trendy: *Data Vault*, *PostgreSQL*, *Business Intelligence*, *WareHouse*.

## Data Vault, czyli z głową w chmurze

*Adrian Najczuk*

- Hurtownia danych - miejsce na integracje danych z różnych źródeł - maile, aplikacje, ludzie 
  - Źródła danych -> Staging (oczyszczanie, łączenie) -> Data access
  - Mogą korzystać z nich użytkownicy biznesowi 
- Problemy jakie można napotkać:
  - Dane (w systemie) vs Rzeczywistość (ukryte intencje w składowanych danych np. do 2010 roku nazwa użytkownika była tylko dużych liter, po 2010 używamy CamelCase)
  - Zmiana reguł biznesowych 
  - Zmienność wykorzystywanych systemów (nowe aplikacje, upgrade/wymiana wykorzystywanych aplikacji)
- Data Vault - technika modelowania danych, śledzenie źródła danych, odporność na zmiany reguł biznesowych
- Model Data Vault:
  - *Hub* - pozwalajaca na identyfikacje bytu danych, np. pracownik z numerem PESEL,
  - *Satelita* - opisuje byty: hub, link, atrybuty opisowe np. zarobki pracownika,
  - *Link* - powiązania, np. huba Klient z hubem Produkt poprzez transakcję Sprzedaż
- Narzędzia
  - Benchmark TPC H

## 15 lat męczarni, czyli moje boje z mobilnymi bazami danych

*Marcin Bardź*

- Palm Os - PDB - format ciągle wykorzystywany w przypadku ebooków
- LevelDB - key-value storage system, Google
- BSON - Binary JSON

## Złączenia w modelu Map/Reduce

*Maciej Penar*

- MapReduce
  - Map - grupowanie
  - Reduce - agregacja
  - Flow: Map -> Shuffle (internal in Hadoop) -> Reduce
- Standardowe sposoby złączeń
  - Nested Loops Join
  - Sort-Merge Join
  - Hash Join
- Algorytmy złączeń MapReduce
  - Two-Way Joins (Reduce-Side Join, Map-Side Join, Broadcast Join)
  - Multi-Way Joins (Map-Side Join, Reduce-Side One-Shot Join, Reduce-Side Cascade Join)
- Podsumowanie
  - używaj gotowych frameworków do złączeń - Hive, Pig
  - pisz kod w ostateczności
  - zwróć uwagę na inne modele programistyczne np. PACT
  
## Analiza wydźwięku - podejścia oraz przykłady użycia

*Karol Chlasta, Antoni Sobkowicz*

http://opi-lil.github.io

- Analiza wydźwięku
  - jakie emocje niesie ze sobą dany tekst
  - klasyfikacja:
    - pozytywny, neutralny, negatywny
- Metody analizy
  - metody słownikowe (słownik wydźwięku - jaki wydźwięk ma dane słowo)
  - metody statystyczne
  - metody przetwarzania języka naturalnego
- Algorytmy
  - Naive Bayes
  - Maximum Entropy
- Przykład - stack technologiczny oraz podejście badania wydźwięku nt. kandydatów podczas kampanii wyborczej na Prezydenta RP
  - Twitter API, komentarze Gazeta, Onet, WP
  - metoda słownikowa
  - ręczne tworznie słowników z oznaczaniem wydźwięku poszczególnych słów (lepiej gdy ten proces robi kilka osób, możemy wyciągnąć średnią wydźwięku słowa)
  - ile słów negatywnych, ile słów pozytywnych - budowanie indeksu naiwnego
  - wysoki procent poprawności wydźwięku pomimo zastosowania prostych metod
- Buzzword: Deep Learning

## PostgreSQL jako baza NoSQL

*Szymon Lipiński*

- rodzaje noSQL
  - baza klucz-wartość
    - get(key) -> value
    - put(key, value)
    - delete(key)
  - baza kolumnowa
  - baza dokumentowa
  - baza grafowa
- logika biznesowa
  - zapisana w aplikacji
  - brak reguł w bazie danych
    - ktoś może bezpośrednio wrzucić nieprawidłowe dane do tabel
    - np. mail wprowadzony w aplikacji jest normalizowany do postaci: LOWER(mail)
    - np. nowa aplikacja - programista nie zna reguł, wrzuca wartości prost do bazy = mamy nieprawidłowe dane
- JSON vs JSONB
  - json - tekst, zawsze parsowany
  - jsonb - forma binarna, wolniejszy INSERT, szybsze przetwarzanie
- PostgreSQL jako noSQL - pole o typie "json"
  - ```CREATE TABLE products (data JSON);```
  - pole *data* będzie teraz przyjmować tylko dane w formacie JSON
  
Format odwoływania się do pola w JSON:

```
(JSON_STRING->>'FIELD_NAME')::TYPE

(data->>'id')::integer
```

Dane typ *string* nie wymagają rzutowania.

Ograniczenia dla poszczególnych pól JSONa umieszczonego w kolumnie *data*:

```sql
// table definition

CREATE TABLE products (
  data JSON,
  CONSTRAINT validate_id CHECK ((data->>'id')::integer >= 1 AND (data->>'id') IS NOT NULL ),
  CONSTRAINT validate_name CHECK (length(data->>'name') > 0 AND (data->>'name') IS NOT NULL ),
  CONSTRAINT validate_description CHECK (length(data->>'description') > 0  AND (data->>'description') IS NOT NULL ),
  CONSTRAINT validate_price CHECK ((data->>'price')::decimal >= 0.0 AND (data->>'price') IS NOT NULL),
  CONSTRAINT validate_currency CHECK (data->>'currency' = 'dollars' AND (data->>'currency') IS NOT NULL),
  CONSTRAINT validate_in_stock CHECK ((data->>'in_stock')::integer >= 0 AND (data->>'in_stock') IS NOT NULL )
}

// unique indexes

CREATE UNIQUE INDEX ui_products_id ON products((data->>'id'));
CREATE UNIQUE INDEX ui_products_name ON products((data->>'name'));
```

Wyszukiwanie po konkretnym polu zawartym w JSON:

```sql
SELECT * FROM products WHERE (data->>'in_stock')::integer > 0 ORDER BY (data->>'price')::decimal DESC LIMIT 1;
```

## Better than yesterday - ładowanie hurtowni w czasie rzeczywistym* z wykorzystaniem metodologii Data Vault

*Mateusz Jerzyk*

- Data Vault - Zalety
  - elastyczne podejście do DataWarehouse
  - łatwa zmiana zasad biznesowych
  - skalowalność
  - dane historyczne
  - szybkie wyszukiwanie błędów
- Data Vault - wady
  - dużo tabel
  - nieczytelny dla biznesu
  - mnóstwo złączeń (JOIN)
- ładujemy HUBy -> Load Satelit + Load Links (ładowanie współbierzne) - Load Links Satelites
- Narzędzia
  - Talend*
  - Cognos Framework Manager

## PostgreSQL na wysokich obrotach

*Adam Buraczewski*

## MySQL 5.7

*Marcin Szałowicz*

- MySQL 5.7 w liczbach
  - 1007 nowych testów
  - 365 worklogów
  - 2812 poprawionych bugów
  - 26k -> 56k per sec connect/disconnect
- InnoDB
  - Integration with memcached (już wcześniej)
  - online buffer pool resizing
  - buffer pull - dump add load
  - faster CREATER INDEX
  - obsługa indeksów R-Trees
- Strict Mode
  - aktualnie domyślnie włączony
  - deprecated SQL modes: ERROR_FOR_DIVISION_BY_ZERO, NO_ZERO_DATE, NO_ZERO_IN_DATE
- GIS - przechowywanie danych geometrycznych
  - InnoDB R-Trees
  - Boost::Geometry
  - Geohash - input/output
  - GeoJSON - input/output
- JSON
  - jako natywny typ danych
  - walidacja poprawności zapisywanego JSONa
  - funkcje jsn_*
  - indeksowanie konkretnego pola z JSONa - wirtualna kolumna
- mysqlpump
  - ma zastąpić mysqldump
  - działa wielowątkowo = szybszy niż mysqldump
- usunięto
  - mysqlbug, mysql_zap, mysql_waitpid, mysqlhotcopy
- native syslog support
- całkowita ucieczka od MyISAM