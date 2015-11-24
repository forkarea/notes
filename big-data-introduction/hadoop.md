# Big Data - Apache Hadoop

## Hadoop

- rozproszony system do przetwarzania informacji
- korzysta z paradygmatu MapReduce
- fault-tolerant
- ³atwa skalowalnoœæ - szybkie dok³adanie kolejnego wêz³a Hadoop
- projekt Open Source
- Hadoop Core to:
  - HDFS
  - YARN
  - MapReduce
  - Hadoop Common

## HDFS

- rozproszony system plików
- nie wymaga specjalnego sprzêtu - uruchamiany na przeciêtnych maszynach
- strumieniowy dostêp do danych
- skoncentrowany na obs³ugê du¿ych plików

### Przydatne polecenia

```shell
# Lists the contents of a directory
$: hdfs dfs -ls

# Copy file from local file system to the HDFS
$: hdfs dfs -put localfile.ext ./hdfsfile.ext
$: hdfs dfs -put /local/directory ./hdfs/directory

# Copy files from HDFS to the local file system
$: hdfs dfs -put ./hdfsfile.ext localfile.ext
```

## MapReduce

### Trzy etapy MapReduce

- Map - przetwarzanie danych wejœciowych do postaci ```klucz : wartoœæ```
- Shuffle - sortowanie i grupowanie danych wzglêdem kluczy
- Reduce - ³¹czenie danych, przygotowanie ostatecznego wyniku

```
Input -> Map -> Shuffle -> Reduce
```

### Przyk³ady:

- [Word Count Example](map-reduce-word-count-example/)
