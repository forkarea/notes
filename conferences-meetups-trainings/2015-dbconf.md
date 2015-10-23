# dBConf 2015 - 

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
- LevelDB - key-value storage system
- BSON - Binary JSON