import time
import urllib
import socket
import sys
from thread import *

HOST = '' # ''- all hosts
PORT = 8080

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print 'Socket created'

try:
  s.bind((HOST, PORT))
except socket.error as msg:
  print 'Bind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1]
  sys.exit()

print 'Socket bind complete on port ', PORT

s.listen(10)
print 'Socket now listening'

def clientthread(conn):

  conn.recv(1024)
  conn.send('HTTP/1.0 200 OK\r\n')
  conn.send('Content-Type: text/html\r\n\r\n')
  conn.send('<html><body><h1>Feeding Cat</body></html>')
  conn.close()

try:
  while 1:
    
    conn, addr = s.accept()
    print 'Connected with ' + addr[0]
    
    start_new_thread(clientthread ,(conn,))
    
    print 'feeding cat'
        
except KeyboardInterrupt:
  print 'clean up'
  s.shutdown(socket.SHUT_RDWR)
  s.close()
