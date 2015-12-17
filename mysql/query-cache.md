# MySQL - Query Cache

- cache wykonywanych zapytań, baza danych przeznacza pewną ilość pamięci na przechowywanie wyników zapytań
- ustawienie - query_cache_type = 1, w standardowej wersji MySQL ustawienie query_cache_type na 0 nie jest równoważne z wyłączeniem cache - pewne odwołania są ciągle wykonywane
- w cache przechowywana jest informacja jakie zapytanie zwróciło jaki wynik
- każde z wykonywanych zapytań jest wyszukiwane w cache czy nie zostało wcześniej wykonane
  - jest - zwracamy to co jest w cache
  - nie - wykonujemy zapytanie, zapisuje informacje w cache
- w standardowej wersji MySQL zapytania muszą być identyczne - spacje, komentarze (są brane pod uwagę, np. Percona Server nie bierze pod uwagę komentarzy)
- nie do końca jest to super rozwiązanie, samo sprawdzenie czy zapytanie znajduje się w cache zajmuje jakąś jednostkę czasową
- zapytania wykorzystujące funkcje np. time(), nigdy nie będą w stanie skorzystać z query cache
- trzeba znać zapytania jakie są wykonywane do bazy danych
  - określenie losowości zapytań i ich powtarzalności
- query cache jest chroniona przez mutex - w przypadku większej ilości jednoczesnych zapytań może hamować szybkość działania całego serwera - na raz do cache może się odwoływać tylko jeden wątek