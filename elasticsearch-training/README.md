# Elasticsearch Training

## Uruchomienie - Windows

- download elastica, rozpakowanie

Ustawienie zmiennej środowiskowej ```JAVA_HOME = C:\Program Files\Java\jre1.8.0_45```

Instalacja Elasticsearch jako usługi systemowej:

```
$: cd elasticsearch/bin
$: service.bat install
$: service.bat start
```

http://localhost:9200 =>

```
{
  "status" : 200,
  "name" : "Collective Man",
  "cluster_name" : "elasticsearch",
  "version" : {
    "number" : "1.6.0",
    "build_hash" : "cdd3ac4dde4f69524ec0a14de3828cb95bbb86d0",
    "build_timestamp" : "2015-06-09T13:36:34Z",
    "build_snapshot" : false,
    "lucene_version" : "4.10.4"
  },
  "tagline" : "You Know, for Search"
}
```

## Plugin - must have

### elasticsearch-head

http://mobz.github.io/elasticsearch-head/

```
$: elasticsearch/bin/plugin -install mobz/elasticsearch-head
```

Dostępny pod adresem: http://localhost:9200/_plugin/head/

### lukas-vlcek/bigdesk

http://bigdesk.org/

```
$: elasticsearch/bin/plugin -install lukas-vlcek/bigdesk
```

### royrusso/elasticsearch-HQ

http://www.elastichq.org/

```
$: elasticsearch/bin/plugin -install royrusso/elasticsearch-HQ
```

Dostępny pod adresem: http://localhost:9200/_plugin/bigdesk/

## Logi

elasticsearch/logs

## Konfiguracja 

Kolejka priorytetów:

1) API - transient
2) API - persistent
3) YML

### Konfiguracja - API

GET http://localhost:9200/_cluster/settings

PUT http://localhost:9200/_cluster/settings
PUT  http://localhost:9200/{nazwaIndexu}/settings

* transient - Ustawienia w danym uruchomieniu. Najważniejszy priorytet.
* persistent - Ustawienia trwałe. Ważniejsze niż konfiguracja z pliku.

### Konfiguracja - YML

elasticsearch/config/elasticsearch.yml

Zmiana nazwy klastra i noda:

```
cluster.name: apietka
node.name: apietkanode
```

Dołączenie się do klastra z poza podsieci

```
discovery.zen.ping.unicast.hosts: ["10.57.13.156"]
```

Zawsze ładowany podczas startu elasticsearch.
Każda zmiana w elasticsearch.yml wiąże się z restartem elasticsearch.

## Przydatne funkcjonalności Elasticsearch

### Aliasy

Mogą posłużyć do zawężania danych w obrębie których działamy - poprzez zdefiniowanie parametrów search i zapisania ich pod jakimś aliasem.

### Routing

Wartość parametru *routing* - może być dowolnym intem, stringiem. Wyliczany jest z niej hash wskazujący na odpowiedni shard:

* to wskazówka dla Elasticsearch pod kątem wydajności - identyfikuje konkretny shard,
* umożliwia zapanowanie nad tym w który shard wpada dodawany dokument (podczas dodawania dokumentu należy podać parametr *routing*),
* wyszukiwanie pomija shardy w których na pewno nie będzie dokumentu

Można zdefiniować routing także w aliasach - nie trzeba potem podawać parametru *routing*.

```
/nameAlias_or_nameIndex/_search?routing=valueToHash

/messages/_search?routing=skype
/skype.messages.alias/_search
```

```
"aliases" : {
	"skype.messages.alias" : {
		"filter" : { ... },
		"search_routing" : "skype"
	}
}
```