#!/bin/sh

#Scanning process of uploaded APK files
#Based on files being uploaded to /opt/lampp/htdocs/scandroid/scanner/uploads
#Scanning environment in /opt/scanner
#Files for processing in uploads directory at /uploads
#Temp-in directory at /tempin - used to temporarily store the unpacked APK file
#Dex2jar directory at /dex2jar - used to convert classes.dex to a compiled jar file
#Jd-cmd directory at /jd-cmd - used to convert compiled jar file to a decompiled jar file
#Temp-out directory at /tempout - used to temporarily store the unpacked decompiled jar file
#Watchtower directory at /watchtower - used to scan the unpacked decompiled jar file

# 1. Go to uploads directory to move next file to scanning environment 
#cd /opt/lampp/htdocs/scandroid/scanner/uploads
mv "/opt/lampp/htdocs/scandroid/scanner/uploads/$1" /opt/scanner/uploads
cd /opt/scanner/uploads
#scan next file from uploads as specified by queue.py
echo
echo APK Scanning Process
echo
echo "Selecting next APK for scanning"
echo "File: " $1
echo "MD5 : " $2

# 2. Unpack apk to tempin directory
echo
echo Extracting classes.dex from $1
cd ..
unzip -d tempin/$2 "uploads/$1" classes.dex
#check that the file is a valid apk file i.e. contains classes.dex
if [ "$?" != "0" ]; then
	echo "\nThis is not a valid apk\nUpdating error status to 1\nScanner exiting\n"
   	#cleaup
   	echo
   	echo Cleanup...
	rm -r "uploads/$1" 
   	exit 1
fi

#Start next instance of queueFile.py
python queueFile.py &

# 3. Upload file to virustotal
echo 
echo Uploading $1 to virustotal.com 
#Python script to upload file to virustotal and output the response
python vtscan.py "uploads/$1" "$1" > $2.response.txt
echo
echo Upload of $1 complete

# 4. Parse apk for original filename and store in results directory
echo
echo Parsing AndroidManifest.xml extracted from $1
java -jar APKParser.jar "uploads/$1" > $2.parsedapk.xml
echo
echo "Grepping parsed manifest from $1 for packagename and version"

#packagename is mainly in the 5th field (f5)of xml, if not the 4th or even 6th which is mainly platformbuildversion
packagename=`grep package= $2.parsedapk.xml | cut -f6 -d" " | cut -c9-100 | cut -f2 -d"\""`

#if packagename length is less than 14 characters (platformbuildversion) then it's in field 5
if [ "${#packagename}" -lt 5 ]; then packagename=`grep package= $2.parsedapk.xml | cut -f5 -d" " | cut -c9-100 | cut -f2 -d"\""`; fi 

#if packagename length is less than 5 characters then it's in field 4
if [ "${#packagename}" -lt 5 ]; then packagename=`grep package= $2.parsedapk.xml | cut -f4 -d" " | cut -c9-100 | cut -f2 -d"\""`; fi

#if packagename length is less than 5 characters then none is defined
if [ "${#packagename}" -lt 5 ]; then packagename="No packagename defined"; fi 
echo $1 Package: $packagename 
echo $packagename > $2.package.txt

#version is in the 3rd (f3) field of xml
version=`grep android:versionName= $2.parsedapk.xml | cut -f3 -d" " | cut -c21-30 | cut -f2 -d"\""`
echo $1 Version: $version
echo $version >> $2.package.txt

# 5. Copy dex file to dex2jar
echo
echo Copying classes.dex from $1 to temp directory
cp -r tempin/$2 dex2jar/

# 6. Convert classes.dex to a compiled jar file
echo
echo Converting classes.dex from $1
cd dex2jar/$2
.././d2j-dex2jar.sh classes.dex

# 7. Convert compiled jar file to decompiled jar file
echo
echo Decompiling classes-dex2jar.jar from $1
cd ../../jd-cmd
mkdir $2
cd $2
java -jar ../jd-cli/target/jd-cli.jar ../../dex2jar/$2/classes-dex2jar.jar

# 8. Unpack decompiled jar file to the tempout directory
echo
echo Extracting $1 Java files from jar 
javafiles=$(zipinfo classes-dex2jar.src.jar | grep .java | wc -l)
unzip -d ../../tempout/$2 classes-dex2jar.src.jar
echo
echo $javafiles "Java files extracted from $1 for scanning"
echo $javafiles >> ../../$2.package.txt

# 9. Scan with Watchtower and produce output report
echo
echo Scanning $1 Java files
cd ../../watchtower
./watchtower -s ../tempout/$2 -p 'Package $packagename' -o xml > ../$2.output.xml

# 10. Grep permalink from response.txt to append to results
cd ..
echo
echo Retrieving $1 results from virustotal.com and appending permalink to output
permalink=`grep permalink $2.response.txt | cut -f12 -d" " | cut -f2 -d"\""`
echo
echo $1 results at $permalink 
echo $permalink > $2.permalink.txt

# 11. Grep output and compile results
echo
echo Compiling $1 results
./grepoutput.sh $2

# 12. Cleanup
echo
echo Cleanup...
rm -r "uploads/$1" 
rm -r "tempin/$2"      
rm -r "tempout/$2"
rm -r "dex2jar/$2"
rm -r "jd-cmd/$2"
rm $2.parsedapk.xml
rm $2.output.xml
rm $2.package.txt
rm $2.response.txt
rm $2.permalink.txt

echo
echo $1 scan complete.  Output posted to database.
echo

