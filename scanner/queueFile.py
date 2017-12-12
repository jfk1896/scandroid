#!/usr/bin/python

import MySQLdb
import os
import sys
import subprocess
import time

print "\nStarting File Queue Manager"

# begin main loop
while True:

	# Open database connection
	db = MySQLdb.connect("127.0.0.1","root","","droid" )

	# prepare a cursor object using cursor() method
	cursor = db.cursor()

	# query db for number of files currently scanning i.e. scanned 2
	sql = "SELECT COUNT(scanned) FROM files WHERE scanned = '2'"
	cursor.execute(sql)

	# fetch scanned 2 count from files table
	count = cursor.fetchone()
	# convert data to string
	count = '%s' % count
	# convert string to integer
	count = int(count)

	# query db for fileHash from files table with scanned 0 (not scanned)
	sql = "SELECT fileHash FROM files WHERE scanned = '0' ORDER BY dateTime LIMIT 1"
	cursor.execute(sql)	
	
	# fetch filehash from files table
	hash = cursor.fetchone()

	# begin inner loop while there is a file to be processed and less than 4 currently scanning
	while hash != None and count < 4:

		# query db for filename
		sql = "SELECT fileName FROM files WHERE fileHash = '%s'" % hash
		cursor.execute(sql)

		# fetch fileName from files table
		filen = cursor.fetchone()

		# change scanned field to 2 (scanning)
		sql="UPDATE files SET scanned= '2' WHERE fileHash = '%s'" % hash
		try:
 			# Execute the SQL command
		  	cursor.execute(sql)
 		  	# Commit your changes in the database
  		 	db.commit()
		except:
  			# Rollback in case there is any error
   			db.rollback()

		#converting data to strings
		hash = '%s' % hash
		filen = '%s' % filen
		#file = '%s' % file

		#handle filenames with any spaces to format for passing to shell
		file = filen.replace(" ", "\ ");

		#print the results
		print "File : %s " % file		
		print "MD5  : %s " % hash
		

		#call the shell script and check return value for error
		r = os.system('./apkscan.sh %s %s' % (file, hash))

		print "Updating scanned status"
		
		if r == 0:
			# change scanned field to 1 (scanned) and error field to 0 (no error)
			sql="UPDATE files SET scanned= '1', error= '0' WHERE fileHash = '%s'" % hash

		else:
			# change scanned field to 1 (scanned) and error field to 1 (error)
			sql="UPDATE files SET scanned= '1', error= '1' WHERE fileHash = '%s'" % hash
		
		try:
   			# Execute the SQL command
   			cursor.execute(sql)
   			# Commit your changes in the database
  			db.commit()
		except:
  			# Rollback in case there is any error
   			db.rollback()
			
		# disconnect from database
		#db.close()
		quit()

	print "\nChecking database for next file to scan"

	time.sleep(5)
	
