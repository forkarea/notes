# Big Data - Apache Pig

- platforma wspomagaj¹ca analizê du¿ych zbiorów danych
- sk³ada siê z dwóch elementów:
  - skryptowy jêzyk Pig Latin do zapisywania przep³ywu danych,
  - œrodowiska uruchomieniowe - lokalne (JVM), rozproszone
- udostêpnia wysokopoziomowy jêzyk Pig Latin umo¿liwiaj¹cy przeprowadzanie operacji - przekszta³cania danych wejœciowych w wyjœciowe
- wszystko co napisane w Pig Latin i tak jest przekszta³cane do modelu MapReduce - transparentnie dla programisty
- posiada tryb interaktywny u³atwiaj¹cy debugowanie skryptu przed jego uruchomieniem dla pe³nego zbioru danych

## Tryby wykonywania

### Local Mode

- dzia³a na maszynie JVM
- korzysta z lokalnego systemu plików
- dobry dla ma³ych plików - testowania

```
# interactive mode
$: pig -x local

# batch mode
$: pig -x local scriptname.pig
```

### MapReduce Mode

- przekszta³ca skrypt zapisany w jêzyku Pig Latin do modelu MapReduce
- uruchamia je w klastrze opartym o Apache Hadoop
- wersja Apache Pig musi byæ zgodna z wersj¹ Apache Hadoop
- nalezy ustawiæ konfiguracjê w pliku conf/pig.properties (w katalogu instalacji Apache Pig)

```
fs.defaultFs:hdfs://localhost/
mapreduce.framework.name=yarn
yarn.resourcemanager.address=localhost:8032
```

Tryb MapReduce jest domyœlny. Uruchomienie Apache Pig w tym trybie nie wymaga dodatkowych argumentów.

```
$: pig

$: pig -x mapreduce
```

## Uruchamianie

- interactive - pow³oka Grunt
  - je¿eli nie podamy skryptu do uruchomienia
  - z tego trybu mo¿na tak¿e uruchomiæ skrypty za pomoc¹ poleceñ run i exec
  - uzupe³nianie kodu (tab), historia instrukcji
  - tryb nadaj¹cy siê do testów
- batch - bezpoœrednie uruchamianie skryptów
  - ```pig scriptname.pig```
- PigServer
  - uruchamianie skryptów z poziomu kodu Javy (klasy: PigServer, PigRunner)
