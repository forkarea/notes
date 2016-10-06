# MySQL - Dump

Tworzenie i przywracanie zrzutu bazy danych MySQL.

## Tworzenie zrzutu bazy danych

Dla wybranej/wybranych bazy danych:

```
$: mysqldump -h[host] -u[user] -p[password] [database] > [backup_file]
$: mysqldump -hlocalhost -uroot -phaslo baza_cms > baza_cms_backup.sql
```

```
$: mysqldump -h[host] -u[user] -p[password] --databases [database1] [database2] [database3] > [backup_file]
$: mysqldump -hlocalhost -uroot -phaslo --databases baza_cms baza_cmr baza_erp > dbs_backup.sql
```

Dla wszystkich baz danych użytkownika:

```
$: mysqldump -h[host] -u[user] -p[password] --all-databases > [backup_file]
$: mysqldump -hlocalhost -uroot -phaslo --all-databases > full_backup.sql
```

Dla wybranej tabeli w bazie danych:

```
$: mysqldump -h[host] -u[user] -p[password] [database] [table] > [backup_file]
$: mysqldump -hlocalhost -uroot -phaslo baza_cms artykuly > baza_cms_artykuly_backup.sql
```

## Przywracanie zrzutu bazy danych

Dla wszystkich baz danych użytkownika:

```
$: mysql -h[host] -u[user] -p[password] < [backup_file]
$: mysql -hlocalhost -uroot -phaslo < full_backup.sql
```

Dla wybranej bazy danych:

```
$: mysql -h[host] -u[user] -p[password] [database] < [backup_file]
$: mysql -hlocalhost -uroot -phaslo baza_cms < baza_cms_backup.sql
```

lub:

```
$: mysql -h[host] -u[user] -p[password]
$: use [database];
$: \. db_backup.sql
```

Należy pamiętać, że operacja ta zadziała tylko jeśli wskazana baza danych została wcześniej stworzona.

## Problemy

### Error 1016 - Podczas zrzucania bazy danych do pliku

*Problem:*

```
Error: MySQL - mysqldump: Got error: 1016: Can't open file: './exampledb/xxx.frm' (errno: 24) when using LOCK TABLES
```

*Solution:*

Dodać parametr ```--lock-tables=false``` do ```mysqldump```
