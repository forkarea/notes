# Big Data - Apache Pig

- platforma wspomagająca analizę dużych zbiorów danych
- składa się z dwóch elementów:
  - skryptowy język Pig Latin do zapisywania przepływu danych,
  - środowiska uruchomieniowe - lokalne (JVM), rozproszone
- udostępnia wysokopoziomowy język Pig Latin umożliwiający przeprowadzanie operacji - przekształcania danych wejściowych w wyjściowe
- wszystko co napisane w Pig Latin i tak jest przekształcane do modelu MapReduce - transparentnie dla programisty
- posiada tryb interaktywny ułatwiający debugowanie skryptu przed jego uruchomieniem dla pełnego zbioru danych

## Tryby wykonywania

### Local Mode

- działa na maszynie JVM
- korzysta z lokalnego systemu plików
- dobry dla małych plików - testowania

```
# interactive mode
$: pig -x local

# batch mode
$: pig -x local scriptname.pig
```

### MapReduce Mode

- przekształca skrypt zapisany w języku Pig Latin do modelu MapReduce
- uruchamia je w klastrze opartym o Apache Hadoop
- wersja Apache Pig musi być zgodna z wersją Apache Hadoop
- nalezy ustawić konfigurację w pliku conf/pig.properties (w katalogu instalacji Apache Pig)

```
fs.defaultFs:hdfs://localhost/
mapreduce.framework.name=yarn
yarn.resourcemanager.address=localhost:8032
```

Tryb MapReduce jest domyślny. Uruchomienie Apache Pig w tym trybie nie wymaga dodatkowych argumentów.

```
$: pig

$: pig -x mapreduce
```

## Uruchamianie

- interactive - powłoka Grunt
  - podobny do IPython
  - jeżeli nie podamy skryptu do uruchomienia
  - z tego trybu można także uruchomić skrypty za pomocą poleceń run i exec
  - uzupełnianie kodu (tab), historia instrukcji
  - tryb nadający się do testów
- batch - bezpośrednie uruchamianie skryptów
  - ```pig scriptname.pig```
- PigServer
  - uruchamianie skryptów z poziomu kodu Javy (klasy: PigServer, PigRunner)

## Słownik

- relation (relacja) - is a bag (more specifically, an outer bag).
- bag (kolekcja) - is a collection of tuples ```{(19,2), (18,1)}```
- tuple (krotka) - is an ordered set of fields ```(19,2)```
- field (pole) - is a piece of data

## Skróty dla interactive mode

- \d alias - DUMP
- \de alias - DESCRIBE
- \e alias - EXPLAIN
- \i alias - ILLUSTRATE
- \q - QUIT

## Pig Latin

[Pig Function Cheat Sheet](https://www.qubole.com/resources/cheatsheet/pig-function-cheat-sheet/)

### LOAD

Syntax: ```LOAD 'data' [USING function] [AS schema];```

Wczytywanie danych, wynikiem jest relacja.

*Załadowanie pliku, bez schematu (```DESCRIBE text; ``` zwróci "Schema for text unknown."):*

```pig
text = LOAD 'wordcount.txt';
```

*Załadowanie pliku z ustawieniem schematu (każdy wiersz pliku jest tablicą znaków, UTF):*

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
```

*Załadowanie pliku z ustawieniem separatora:*

```pig
stock = LOAD 'stock.csv' using PigStorage(',') AS (product:chararray, price:float, category:chararray);
```

### STORE

Syntax: ```STORE alias INTO 'directory' [USING function];```

Zapisanie danych w określonym formacie do wskazanego folderu.

```pig
STORE wordcount INTO 'wordcount-result' USING PigStorage(',');
```

### DESCRIBE

Schemat relacji.

```pig
DESCRIBE stock;

-- stock: {product: chararray,price: float,category: chararray}
```

### DUMP

Zrzut relacji.

```pig
DUMP stock;

-- (product1,100.0,category1)
-- (product2,200.11,category1)
-- (product3,245.44,category2)
-- (product1,100.0,category1)
-- (product2,200.11,category1)
```

### FOREACH

Modyfikacja pól w relacji, przekształcanie relacji.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
chars_per_line = FOREACH text GENERATE SIZE(line) AS chars;

DUMP chars_per_line;

-- (16)
-- (48)
-- (89)
-- (81)
```

### TOKENIZE

Rozbija tablicę znaków na zbiór słów.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
words = FOREACH text GENERATE TOKENIZE(line) AS word;

DUMP words;

-- ({(Lorem),(ipsum),(dolor)})
-- ({(Next),(line),(with),(text)})
```

### FLATTEN

Spłaczenie struktury. Usuwa zagnieżdżenia ze zbiorów i krotek.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
words = FOREACH text GENERATE FLATTEN(TOKENIZE(line)) AS word;

DUMP words;

-- (Lorem)
-- (ipsum)
-- (dolor)
-- (Next)
-- (line)
-- (with)
-- (text)
```

### LOWER

Zamień wszystkie litery na małe.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
lower_text = FOREACH text GENERATE LOWER(line) AS line;
```

### SIZE

Ilość znaków, bajtów, pól - w zależności od typu danych. Zwraca 64-bit integer.

```pig
SIZE(line) > 10L
```

### FILTER

Stwórz nową relację z krotek które spełniają warunek.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
words = FOREACH text GENERATE FLATTEN(TOKENIZE(line)) AS word;
filtred = FILTER words BY SIZE(word) > 3L;
```

### DISTINCT

Usuń powtarzające się krotki z relacji.

```pig
unique = DISTINCT words;
```

### GROUP

Grupowanie krotek w relacji względem wskazanego pola.

```pig
text = LOAD 'wordcount.txt' AS (line:chararray);
words = FOREACH text GENERATE FLATTEN(TOKENIZE(line)) AS word;
grouped = GROUP words BY word;

DUMP grouped;

-- (the,{(the),(the),(the)})
```

### ORDER

Sortuj krotki w relacji wzgędem wskazanego pola i kolejności.

```pig
sorted = ORDER counts BY total DESC;
```

### LIMIT

Limituj relację do wskazanej ilośći krotek.

```pig
limited = LIMIT sorted 10;
```

### REGISTER

Rejestracja bibliotek użytkownika (User-Defined Functions).

```pig
REGISTER jyson-1.0.2.jar;
REGISTER 'reddit.py' USING jython AS redditUdf;

-- ...

reddits = FOREACH data GENERATE redditUdf.parseReddit(item);
```

### ILLUSTRATE

Prezentacja step-by-step przekształceń relacji do momentu otrzymania właściwego wyniku

```pig
ILLUSTRATE stock; 
```

### EXPLAIN

Plan logiczny, fizyczny oraz zadania w modelu MapReduce.

```pig
EXPLAIN stock;
```

*Logical Plan:*

```
stock: (Name: LOStore Schema: product#13:chararray,price#14:float,category#15:chararray)
|
|---stock: (Name: LOForEach Schema: product#13:chararray,price#14:float,category#15:chararray)
    |   |
    |   (Name: LOGenerate[false,false,false] Schema: product#13:chararray,price#14:float,category#15:chararray)ColumnPrune:InputUids=[13, 14, 15]ColumnPrune:OutputUids=[13, 14, 15]
    |   |   |
    |   |   (Name: Cast Type: chararray Uid: 13)
    |   |   |---product:(Name: Project Type: bytearray Uid: 13 Input: 0 Column: (*))
    |   |   (Name: Cast Type: float Uid: 14)
    |   |   |---price:(Name: Project Type: bytearray Uid: 14 Input: 1 Column: (*))
    |   |   (Name: Cast Type: chararray Uid: 15)
    |   |   |---category:(Name: Project Type: bytearray Uid: 15 Input: 2 Column: (*))
    |   |
    |   |---(Name: LOInnerLoad[0] Schema: product#13:bytearray)
    |   |---(Name: LOInnerLoad[1] Schema: price#14:bytearray)
    |   |---(Name: LOInnerLoad[2] Schema: category#15:bytearray)
    |
    |---stock: (Name: LOLoad Schema: product#13:bytearray,price#14:bytearray,category#15:bytearray)RequiredFields:null
```

*Physical Plan:*

```
stock: Store(fakefile:org.apache.pig.builtin.PigStorage) - scope-24
|
|---stock: New For Each(false,false,false)[bag] - scope-23
    |   |
    |   Cast[chararray] - scope-15
    |   |---Project[bytearray][0] - scope-14
    |   Cast[float] - scope-18
    |   |---Project[bytearray][1] - scope-17
    |   Cast[chararray] - scope-21
    |   |---Project[bytearray][2] - scope-20
    |
    |---stock: Load(file:///home/bigdata/stock.csv:PigStorage(',')) - scope-13
```

*Map Reduce Plan:*

```
MapReduce node scope-25
Map Plan
stock: Store(fakefile:org.apache.pig.builtin.PigStorage) - scope-24
|
|---stock: New For Each(false,false,false)[bag] - scope-23
    |   |
    |   Cast[chararray] - scope-15
    |   |---Project[bytearray][0] - scope-14
    |   Cast[float] - scope-18
    |   |---Project[bytearray][1] - scope-17
    |   Cast[chararray] - scope-21 
    |   |---Project[bytearray][2] - scope-20
    |
    |---stock: Load(file:///home/bigdata/stock.csv:PigStorage(',')) - scope-13--------
Global sort: false
```

## Przykłady:

- [Word Count](pig-word-count-example/)
- [Using UDF (Java) from PiggyBank JAR](pig-udf-piggybank-example/)
- [Using UDF (Python) from jyson](pig-udf-jyson-example/)