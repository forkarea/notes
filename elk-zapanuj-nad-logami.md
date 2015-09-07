# ELK - Zapanuj Nad Logami

Elasticsearch Logstash Kibana

## Spis treœci

1) Logi
2) ELK
3) Praktyka

Przedstawienie procesu grupowania logów i wyœwietlenia ich.

## Logi

Czym s¹ logi? Po co je sstosujemy? Problemy z logami.

- "(...) zapis zawieraj¹cy informacjê o zdarzeniach i dzia³aniach dotycz¹cych systemu informatycznego, systemu komputerowego czy komputera." Wikipedia.
- umo¿liwiaj¹ analizê dzia³ania systemu, detekcjê:
  - b³êdów, nieprawid³owoœci dzia³ania,
  - prób i sposobów w³amañ
- multum logów, w zale¿noœci od u¿ytego stacku technologicznego. Prosta web aplikacja to logi z:
  - Syslog (Linux), 
  - Apache,
  - PHP,
  - MySQL (slowlog, https://dev.mysql.com/doc/refman/5.5/en/server-logs.html),
  - Application logs.
- ciê¿ko siê je przegl¹da (SSH -> tail, cat, grep, awk ...)
- du¿y rozmiar - powodzenia przy analizie 100GB nieustrukturyzowanych logów
- polityka archiwizacji logów
- niepotrzebne - z punktu widzenia klienta, nie przynosz¹ korzyœci biznesowej a jednak je kodzimy
- nie przegl¹damy ich - kto w ci¹gu ostatniego miesi¹ca sam z siebie rzuci³ okiem na logi?

## ELK

*Elasticsearch + Logstash + Kibana*

- trzy niezale¿ne od siebie open-sourceowe projekty
- vendor - firma Elastic
- "How can you maintain blazing-fast analytics as you data grows larger and larger? Answer: the ELK stack makes it way easier -- and way faster -- to search and analyze large data sets."

// Grafika jak to dzia³a
// ze logstash zbiera, elastic przechowyje (DB) kinbana korzysta z DB i wyœwietla u¿ytkownikowi

### Elasticsearch

Indexing, storage and retrieval engine

### Logstash

Log input slicer and dicer and output writer

### Kibana

Data Displayer

## Praktyka

### Logstash

https://www.elastic.co/downloads/logstash
https://www.elastic.co/guide/en/logstash/current/configuration-file-structure.html

## Notatki

Pamiêtaæ o:
- na jakich licencjach oparty jest ELK
- alternatywa dla ELK
- jak wygl¹da wdro¿enie ELK do dzia³aj¹cego œrodowiska?
- ELK Docker - https://github.com/deviantony/docker-elk

Sk¹d pomys³ na prezentacjê?
- IPC Berlin 2015
- Ostatnie zabawy z utrzymywaniem aplikacji na produkcji

Cytaty, fajne wtr¹cenia:
- Wolimy jednak wizualizacje ni¿ czytanie :-)
- Aplikacje ros³y, my ci¹glê cat'owaliœmy coraz to wiêksze logi.

Zakoñczenie
- Dziêki! ;-)

Inne: 
- http://www.logstash.net/docs/1.4.2/tutorials/10-minute-walkthrough/
- http://www.slideshare.net/3camp/logstash-28920758
- http://www.slideshare.net/CloudElements/logstash-33327736

Prezentacje:
- http://moquet.net/talks/ipc-2015-elk/
- http://www.slideshare.net/jillesvangurp/elk-stack-34785684
- http://linuxfestnorthwest.org/sites/default/files/slides/Log%20Analysis%20with%20the%20ELK%20Stack.pdf (Grok Debuger do tworzenia filtrów logstash)