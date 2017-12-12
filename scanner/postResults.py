#!/usr/bin/env python
import MySQLdb
import sys

# Open database connection
db = MySQLdb.connect("127.0.0.1","root","","droid" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

s1 = str(sys.argv[1])
s2 = str(sys.argv[2])
s3 = str(sys.argv[3])
s4 = str(sys.argv[4])
s5 = str(sys.argv[5])
g1 = int(s1) + int(s2) + int(s3) + int(s4)+ int(s5)

s6 = str(sys.argv[6])
s7 = str(sys.argv[7])
s8 = str(sys.argv[8])
s9 = str(sys.argv[9])
s10 = str(sys.argv[10])
g2 = int(s6) + int(s7) + int(s8) + int(s9) + int(s10)

s11 = str(sys.argv[11])
s12 = str(sys.argv[12])
s13 = str(sys.argv[13])
g3 = int(s11) + int(s12) + int(s13)

s14 = str(sys.argv[14])
s15 = str(sys.argv[15])
s16 = str(sys.argv[16])
s17 = str(sys.argv[17])
s18 = str(sys.argv[18])
g4 = int(s14) + int(s15) + int(s16) + int(s17) + int(s18)

s19= str(sys.argv[19])
s20 = str(sys.argv[20])
s21 = str(sys.argv[21])
g5 = int(s19) + int(s20) + int(s21)

pl = str(sys.argv[22])
md5 = str(sys.argv[23])
pk = str(sys.argv[24]) 
vn = str(sys.argv[25])
jf = str(sys.argv[26])

#post signature values to RESULTS table - to be tested
#sql = """INSERT INTO reports (fileHash, newFileInputStream, newFileOutputStream, newFileReader, newFileWriter, newFile, File_access_group, createStatement, execute, executeQuery, StatementExecute, StatementExecuteQuery, DB_access_group, RuntimeGetRuntime, RuntimeExec, Process, External_process_group, sendRedirect, setStatus, addHeader, getParameter, getHeader, Http_redirect_group, KeyStore, PrivateKey, SamlAuthToken, Keystore_group, plink, javaFiles) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
#args = (md5, s1, s2, s3, s4, s5, g1, s6, s7, s8, s9, s10, g2, s11, s12, s13, g3, s14, s15, s16, s17, s18, g4, s19, s20, s21, g5, pl, jf)	

#post signature values to RESULTS table - to be tested
sql = "UPDATE reports SET newFileInputStream = '%s', newFileOutputStream = '%s', newFileReader = '%s', newFileWriter = '%s', newFile = '%s', File_access_group = '%s', createStatement = '%s', execute = '%s', executeQuery = '%s', StatementExecute = '%s', StatementExecuteQuery = '%s', DB_access_group = '%s', RuntimeGetRuntime = '%s', RuntimeExec = '%s', Process = '%s', External_process_group = '%s', sendRedirect = '%s', setStatus = '%s', addHeader = '%s', getParameter = '%s', getHeader = '%s', Http_redirect_group = '%s', KeyStore = '%s', PrivateKey = '%s', SamlAuthToken = '%s', Keystore_group = '%s', plink = '%s', javaFiles = '%s' WHERE fileHash = '%s'" % (s1, s2, s3, s4, s5, g1, s6, s7, s8, s9, s10, g2, s11, s12, s13, g3, s14, s15, s16, s17, s18, g4, s19, s20, s21, g5, pl, jf, md5)

try:
   # Execute the SQL command
   cursor.execute(sql)
   # Commit your changes in the database
   db.commit()
except:
   # Rollback in case there is any error
   db.rollback()

#update files table with package name 
sql = "UPDATE files SET package = '%s' WHERE fileHash = '%s'" % (pk, md5)
cursor.execute(sql)
db.commit()

#update files table with version
sql = "UPDATE files SET version = '%s' WHERE fileHash = '%s'" % (vn, md5)
cursor.execute(sql)
db.commit()

# disconnect from database
db.close()
