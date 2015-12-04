import RPi.GPIO as GPIO
import time

ledPin = 4 

print('setup')

GPIO.setmode(GPIO.BCM)
GPIO.setup(ledPin, GPIO.OUT)

print('loop')
for i in range(0,50):
  for j in range(0,1):
    print("GO")
    GPIO.output(ledPin, GPIO.HIGH)
    time.sleep(0.0006 + 0.0015*j)
    GPIO.output(ledPin, GPIO.LOW)
    time.sleep(0.02)

GPIO.cleanup()


