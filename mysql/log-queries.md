# MySQL - Log querers

Configuration file: ```/etc/mysql/my.cnf```

## Log all queries:

```ini
general_log = off
general_log_file = /var/log/mysql/all_queries.log
```

## Log slow queries:

```ini
slow_query_log = 1
slow_query_log_file = /var/log/mysql/slow_queries.log
long_query_time = 3
log_queries_not_using_indexes = 1
```