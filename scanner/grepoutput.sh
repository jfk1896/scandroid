#!/bin/sh
#Grepping of information from output xml to output txt

#Counting individual file_access entries
s1=$(grep 'new FileInputStream' $1.output.xml | grep match| wc -l)
s2=$(grep 'new FileOutputStream' $1.output.xml | grep match |  wc -l)
s3=$(grep 'new FileReader' $1.output.xml | grep match | wc -l)
s4=$(grep 'new FileWriter' $1.output.xml | grep match | wc -l)
s5=$(grep 'new File]' $1.output.xml | grep match | wc -l)

#Counting individual db_access entries
s6=$(grep 'createStatement' $1.output.xml | grep match| wc -l)
s7=$(grep 'execute' $1.output.xml | grep match |  wc -l)
s8=$(grep 'executeQuery' $1.output.xml | grep match | wc -l)
s9=$(grep 'Statement.execute' $1.output.xml | grep match | wc -l)
s10=$(grep 'Statement.executeQuery' $1.output.xml | grep match | wc -l)

#Counting individual external_process entries
s11=$(grep 'Runtime.getRuntime' $1.output.xml | grep match| wc -l)
s12=$(grep 'Runtime.Exec' $1.output.xml | grep match |  wc -l)
s13=$(grep 'Process' $1.output.xml | grep match | wc -l)

#Counting individual HTTP_request entries
s14=$(grep 'sendRedirect' $1.output.xml | grep match| wc -l)
s15=$(grep 'setStatus' $1.output.xml | grep match |  wc -l)
s16=$(grep 'addHeader' $1.output.xml | grep match | wc -l)
s17=$(grep 'getParameter' $1.output.xml | grep match | wc -l)
s18=$(grep 'getHeader' $1.output.xml | grep match | wc -l)

#Counting individual Crypto_and_Keystore entries
s19=$(grep 'KeyStore' $1.output.xml | grep match| wc -l)
s20=$(grep 'PrivateKey' $1.output.xml | grep match |  wc -l)
s21=$(grep 'SamlAuthToken' $1.output.xml | grep match | wc -l)

#Reading permalink for virustotal scan
pl=$(cat $1.permalink.txt)

#Reading packagename,version and number of java file scanned
pk=$(cat $1.package.txt | head -n1)
vn=$(sed -n '2p' $1.package.txt)
jf=$(cat $1.package.txt | tail -n1) 

#Post signature values to results table via postResults.py
python postResults.py $s1 $s2 $s3 $s4 $s5 $s6 $s7 $s8 $s9 $s10 $s11 $s12 $s13 $s14 $s15 $s16 $s17 $s18 $s19 $s20 $s21 $pl $1 $pk $vn $jf

