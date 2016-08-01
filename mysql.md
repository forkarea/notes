# MySQL

## Dump structure of tables

mysqldump -d -h [host] -u [user] -p[password] [db_name] > dumpfile.sql

## Show SQL script to create table

SHOW CREATE TABLE [db_name.]table_name;

## Display definition of columns in table

SHOW COLUMNS FROM [db_name.]table_name;