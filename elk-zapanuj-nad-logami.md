# ELK - Zapanuj Nad Logami

ELK - Elasticsearch Logstash Kibana

## Spis treœci

1) Logi
2) ELK
3) Praktyka

## Logi

Czym s¹ logi? Po co je sstosujemy? Problemy z logami.

- "(...) zapis zawieraj¹cy informacjê o zdarzeniach i dzia³aniach dotycz¹cych systemu informatycznego, systemu komputerowego czy komputera." via Wikipedia.
- umo¿liwiaj¹ analizê dzia³ania systemu, detekcjê:
   - b³êdów, nieprawid³owoœci dzia³ania,
   - prób i sposobów w³amañ
- multum logów, w zale¿noœci od u¿ytego stacku technologicznego. Prosta web aplikacja to logi z:
   - Linux Logs (Syslog, Auth Log, FTPD Log, etc.)
   - Apache,
   - PHP,
   - MySQL (slowlog, https://dev.mysql.com/doc/refman/5.5/en/server-logs.html),
   - Application Logs.
- ciê¿ko siê je przegl¹da (Old School way : SSH -> tail, cat, grep, less, awk ...)
- du¿y rozmiar - powodzenia przy analizie 100GB nieustrukturyzowanych logów
- nale¿y wprowadziæ polityka archiwizacji logów
- niepotrzebne - z punktu widzenia klienta, nie przynosz¹ korzyœci biznesowej a jednak:
  - s¹...,
  - developerzy kodz¹ ```$log->warning('...');```
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

- https://github.com/elastic/logstash/tree/v1.4.2/patterns

### Kibana

Data Displayer

## Praktyka

Opis dotyczy uruchomienia serwera *ELK* oraz konfiguracji serwerów aplikacyjnych (*LAMP Node* - Linux, Apache, MySQL, PHP) które za pomoc¹ *Logstash Forwarder* bêd¹ przekazywaæ logi do serwera *ELK*.

// grafika prezentuj¹ca architekturê serwerów

### ELK Server

### LAMP Node

Predefined requirements dla serwera *ELK*:

- Git Client
- Docker & Docker Compose

### Wygenerowanie certyfikatu SSL

Rekomendowana lokalizacja plików:

- certificates (.crt): ```/etc/pki/tls/certs/```
- keys (.key): ```/etc/pki/tls/private/```

Wygenerowane certyfikaty bêd¹ potrzebne dla *logstash* (pliki .crt oraz .key) i *logstash-forwarder* (tylko plik .crt).

#### Localhost

W przypadku kombinacji *ELK* server jako kontener Dockera + logstash-forwarder na tym samym hoœcie (localhost), wygenerowanie certyfikatu odbywa siê za pomoc¹ polecenia:

```
$: cd /etc/pki/tls/
$: openssl req -x509 -newkey rsa:2048 -keyout private/logstash-forwarder.key -out certs/logstash-forwarder.crt -nodes -days 3650
```

Wa¿ne aby nastêpuj¹ce dane uzupe³niæ w nastêpuj¹cy sposób:

```
Common name: localhost
Email address: root@localhost
```

Nastêpnie trzeba zamapowaæ lokalizacjê certyfikatów. Przed uruchomieniem ```docker-compose up``` nale¿y zmodyfikowaæ odrobinê plik *docker-compose.yml*:

```
logstash:
  (...)
  volumes:
    - /etc/pki/tls:/etc/pki/tls  # tê linijkê nale¿y dopisaæ
    - ./logstash/config:/etc/logstash/conf.d
```

Rozwi¹zanie zaczerpniête z: https://github.com/cityindex-attic/logsearch/wiki/Lumberjack-Locally)

#### Other host

Na serwerze *ELK*, nale¿y wygenerowaæ certyfikat:

```
$: cd /etc/pki/tls/

$: openssl req -x509 -batch -nodes -newkey rsa:2048  -days 365 -keyout private/logstash-forwarder.key -out certs/logstash-forwarder.crt

$: openssl req -x509  -batch -nodes -newkey rsa:2048 -days 365 -keyout private/logstash-forwarder.key -out certs/logstash-forwarder.crt -subj /CN=logstash.example.com
```

Nastêpnie plik *logstash-forwarder.crt* bêdzie tak¿e wykorzystywany na *Linux Node*. Najlepiej niech znajduje siê w takiej samej lokalizacji. Korzystaæ bêdzie z niego *logastash-forwarder*.


### Docker ELK Stack

Najprostrzym sposobem na rozpoczêcie przygody z *ELK Stack* jest uruchomienie gotowego kontenera ([Docker-Elk](https://github.com/deviantony/docker-elk)):

```
$: git clone git@github.com:deviantony/docker-elk.git
$: cd docker-elk
$: docker-compose up -d
```

Po prawid³owym uruchomieniu na przedstawionych portach zostaj¹ uruchomione nastêpuj¹ce us³ugi:

- *5000*: Logstash TCP input
- *9200*: Elasticsearch HTTP
- *5601*: Kibana Web Interface

Teraz wystarczy tylko otworzyæ adres [http://localhost:5061](http://localhost:5061) w przegl¹darce aby uzyskaæ dostêp do interfejsu Kibana.

### Logstash

https://www.elastic.co/downloads/logstash
https://www.elastic.co/guide/en/logstash/current/configuration-file-structure.html

### Logstash Forwarder

```
$: sudo vi /etc/logstash-forwarder.conf
```

```json
{
  "network": {
    "servers": ["localhost:5000"],
    "timeout": 15,
    "ssl ca": "/etc/pki/tls/certs/logstash-forwarder.crt"
  },
  "files": [{
    "paths": [
      "/var/log/syslog",
      "/var/log/auth.log"
    ],
    "fields": {"type": "syslog"}
  }]
}
```

```
$: sudo service logstash-forwarder restart
```

## Notatki

Pamiêtaæ o:
- na jakich licencjach oparty jest ELK
- alternatywa dla ELK
- jak wygl¹da wdro¿enie ELK do dzia³aj¹cego œrodowiska?

Inne: 
- http://www.logstash.net/docs/1.4.2/tutorials/10-minute-walkthrough/
- http://www.slideshare.net/3camp/logstash-28920758
- http://www.slideshare.net/CloudElements/logstash-33327736

Logstash Forwarder:
- https://github.com/elastic/logstash-forwarder
- https://www.digitalocean.com/community/tutorials/adding-logstash-filters-to-improve-centralized-logging
- https://www.digitalocean.com/community/tutorials/how-to-install-elasticsearch-logstash-and-kibana-4-on-ubuntu-14-04
- https://wiki.zimbra.com/wiki/Centralized_Logs_-_Elasticsearch,_Logstash_and_Kibana

Prezentacje:
- http://moquet.net/talks/ipc-2015-elk/
- http://www.slideshare.net/jillesvangurp/elk-stack-34785684
- http://linuxfestnorthwest.org/sites/default/files/slides/Log%20Analysis%20with%20the%20ELK%20Stack.pdf (Grok Debuger do tworzenia filtrów logstash)