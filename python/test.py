import RPi.GPIO as GPIO
import time
import urllib
 
url = "http://joshuajweldon.com/CatFeeder/php/test.php"
data1 = urllib.urlopen(url).read()

ledPin = 4 
GPIO.setmode(GPIO.BCM)
GPIO.setup(ledPin, GPIO.OUT)

if data1 == "safe":
	GPIO.output(ledPin, GPIO.HIGH)
	time.sleep(10)

else:
	GPIO.output(ledPin, GPIO.HIGH)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.LOW)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.HIGH)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.LOW)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.HIGH)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.LOW)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.HIGH)
	time.sleep(1)
	GPIO.output(ledPin, GPIO.LOW)
	time.sleep(1)
	
GPIO.cleanup() # cleanup all GPIO

