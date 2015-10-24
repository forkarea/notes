# dBConf 2015 - Hucisko

Data: *23 - 25 października 2015*

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
  - *Link* - powiązania, np. huba Klient z hubem Produkt poprzez transakcję Sprzedaż,
- Przykład pokazany na prezentacji:
  - rewizjonowanie danych
  - dodawanie nowego źródła danych = dodawanie po prostu kolejnych satelit
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