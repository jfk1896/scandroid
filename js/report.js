

var myTimer;           //initialise the timer outside the function


function ajax_json_data(){ 
    var databox = document.getElementById("databox3");            //reference for html div
    var arbitrarybox = document.getElementById("arbitrarybox");   //reference for html div
    var hr = new XMLHttpRequest(); 
    hr.open("POST", "scanCheck.php"); 
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    
     document.getElementById('databox1').style.height = "1px";
     document.getElementById('databox').style.visibility="hidden";     //hides data box untill result found
     document.getElementById('databox1').style.visibility="hidden";
     document.getElementById('reportInfo').style.height = "1px";
     document.getElementById('donut-example').style.height = "1px";
     document.getElementById('Logo').style.width = "80%";
     document.getElementById('reportInfo').style.visibility="hidden";
     //document.getElementById('databox').style.height = "100%";
         
    
    
    hr.onreadystatechange = function() { 
        if(hr.readyState == 4 && hr.status == 200) 
        { 
          
            // variable d for data that the json object returns
            var d = JSON.parse(hr.responseText); 
              
            databox.innerHTML = "";                  //always empties each time a new request is made
            document.getElementById('myButton').style.visibility="hidden";
              
            
            
            for(var o in d){                        //variable o object in data
            
                if(d[o].fileHash)            //to grab an object place object inside the data variable has to have username property
                {
                
                /////////////////////Looking for an error flag/////////////////////////////////
                if(d[o].err=='1'){  ; alert("Apologies, we are unable to scan this file type at present."+'\n\n\t\t\t\t'+"Please check back later!" ); 
                window.location.href = "error.php";    }
                
                
                
                //hide the preloader image
                document.getElementById('loading').style.height = "1px";     
                document.getElementById('loading1').style.height = "1px";
                document.getElementById('loading1').style.margin = "1px";
                document.getElementById('loading').style.visibility="hidden";
                document.getElementById('Logo').style.width = "55%";
                document.getElementById('Logo').style.margin = "0";
               
                //display the results databox
                document.getElementById('databox').style.visibility="visible";  //make databox visible when result found
                document.getElementById('databox1').style.visibility="visible";
                document.getElementById('reportInfo').style.visibility="visible";
                document.getElementById('reportInfo').style.height = "310px";
                document.getElementById('databox1').style.height = "300px";
                document.getElementById('donut-example').style.height = "300px";
                
                                                                     
       
////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


                            var out1 = '<table class="table table-striped" id="antivirus-results">';
                            var tab = "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";
                            var i= 0;
                            var j="'p"+i+"'";        //
                            var p0 = "'p0'";
                            var p1 = "'p1'";
                            var p2 = "'p2'";
                            var p3 = "'p3'";
                            var p4 = "'p4'";
                            
                            var title1 = "File Access Detections: ";
                            var title2 = "Database Access Detections:";
                            var title3 = "External Process Detections:";
                            var title4 = "HTTP Request Detections: ";
                            var title5 = "Crypto and Keystore Detections:";
                            

                            var sDesc1 =  'Data that is to be trusted should not be exposed to tampering. ' +
                                          'Privileged code should not be executable through intended interfaces.</br></br>' +
                                          'Exception objects may convey sensitive information. For example, if a ' +
                                          'method calls the java.io.FileInputStream constructor to read an underlying ' +
                                          'configuration file and that file is not present, a java.io.FileNotFoundException ' +
                                          'containing the file path is thrown. Propagating this exception back to the ' +
                                          'method caller exposes the layout of the file system. Many forms of attack ' +
                                          'require knowing or guessing locations of files.';
                            var sDesc2 =  'It is well known that dynamically created SQL statements including untrusted ' +
                                          'input are subject to command injection. This often takes the form of supplying '+
                                          'an input containing a quote character (\') followed by SQL. Avoid dynamic SQL.</br></br>' +
                                          'For parameterised SQL statements using Java Database Connectivity (JDBC), ' +
                                          'use java.sql.PreparedStatement or java.sql.CallableStatement instead of ' +
                                          'java.sql.Statement. In general, it is better to use a well-written, ' +
                                          'higher-level library to insulate application code from SQL. When using such ' +
                                          'a library, it is not necessary 	to limit characters such as quote (\'). ' +
                                          'If text destined for XML/HTML is handled correctly during output (Guideline 3-3), ' +
                                          'then it is unnecessary to disallow characters such as less than (<) in inputs to SQL.';
                            
                            var sDesc3 =  'Command injection is an attack in which the goal is execution of arbitrary commands ' +
                                          'on the host operating system via a vulnerable application. Command injection ' +
                                          'attacks are possible when an application passes unsafe user supplied data ' +
                                          '(forms, cookies, HTTP headers etc.) to a system shell. In this attack, the ' +
                                          'attacker-supplied operating system commands are usually executed with the ' +
                                          'privileges of the vulnerable application.</br></br> ' +
                                          'Command injection vulnerabilities allow an attacker to inject arbitrary system ' +
                                          'commands into an application. The commands execute at the same privilege level ' +
                                          'as the Java application and provides an attacker with functionality similar to ' +
                                          'a system shell. In Java, Runtime.exec is often used to invoke a new process, ' +
                                          'but it does not invoke a new command shell, which means that chaining or piping ' +
                                          'multiple commands together does not usually work. Command injection is still ' +
                                          'possible if the process spawned with Runtime.exec is a command shell like ' +
                                          'command.com, cmd.exe, or /bin/sh';
                            
                            var sDesc4 =  'HTTP response splitting occurs when data enters a web application through an ' +
                                          'untrusted source, most frequently an HTTP request. The data is included in an ' +
                                          'HTTP response header sent to a web user without being validated for malicious ' +
                                          'characters. An attacker could pass malicious data to a vulnerable application, ' +
                                          'and the application includes the data in an HTTP response header.';
                            
                            var sDesc5 =  'Performing a key exchange without verifying the identity of the entity being ' +
                                          'communicated with will preserve the integrity of the information sent between ' +
                                          'the two entities; this will not, however, guarantee the identity of end entity.';
                                          
                            
                            var headCap1 = 'Confidential data should be readable only within a limited context. ';
                            var headCap2 = 'It is well known that dynamically created SQL statements including ';
                            var headCap3 = 'Command injection is an attack which executes arbitrary commands ';
                            var headCap4 = 'HTTP response splitting: when data enters a web application through ';
                            var headCap5 = 'Performing a key exchange without verifying the identity of ';
                            
                            var s1 = "<strong>'new FileInputStream'</strong>";
                            var s2 = "<strong>'new FileOutputStream'</strong>";
                            var s3 = "<strong>'new FileReader'</strong>";
                            var s4 = "<strong>'new FileWriter'</strong>";
                            var s5 = "<strong>'new File'</strong>";
                            
                            var s6 = "<strong>'createStatement'</strong>";
                            var s7 = "<strong>'execute'</strong>";
                            var s8 = "<strong>'executeQuery'</strong>";
                            var s9 = "<strong>'Statement.execute'</strong>";
                            var s10 = "<strong>'Statement.executeQuery'</strong>";
                            
                            var s11 = "<strong>'Runtime.getRuntime'</strong>";
                            var s12 = "<strong>'Runtime.Exec'</strong>";
                            var s13 = "<strong>'Process'</strong>";
                            
                            var s14 = "<strong>'sendRedirect'</strong>";
                            var s15 = "<strong>'setStatus'</strong>";
                            var s16 = "<strong>'addHeader'</strong>";
                            var s17 = "<strong>'getParameter'</strong>";
                            var s18 = "<strong>'getHeader'</strong>";
                            
                            var s19 = "<strong>'KeyStore'</strong>";
                            var s20 = "<strong>'PrivateKey'</strong>";
                            var s21 = "<strong>'SamlAuthToken'</strong>";
                            
                            
                            var d1 = "Input stream that reads bytes from a file.</br>";
                            var d2 = "Output stream that writes bytes to a file.</br>";
                            var d3 = "Specialized Reader that reads from a file in the file system.</br>";
                            var d4 = "Specialized Writer that writes to a file in the file system.</br>";
                            var d5 = 'Presence of an "Abstract" representation of a file system entity identified by a pathname.</br>';
                            
                            var d6 = "Creates an interface used for executing static SQL statements to retrieve query results</br>";
                            var d7 = "Executes a given SQL statement.</br>";
                            var d8 = "Executes a given SQL statement.</br>";
                            var d9 = "Executes a given SQL statement.</br>";
                            var d10 = "Executes a given SQL statement.</br>";
                                                        
                            var d11 = "Returns the single Runtime instance for the current application.</br>";
                            var d12 = "Invokes a new process</br>";
                            var d13 = "Executes the specified command or program in a separate native process.</br>";
                            
                            var d14 = "Sends a temporary redirect response to the client using the specified redirect location URL and clears the buffer.</br>";
                            var d15 = "Sets the status code for response.</br>";
                            var d16 = "Adds a response header with the given name and value. This method allows response headers to have multiple values.</br>";
                            var d17 = "Returns the value of a request parameter as a String, or null if the parameter does not exist.</br>";
                            var d18 = "Gets the value of the response header with the given name.</br>";
                            
                            
                            var d19 = "KeyStore is responsible for maintaining cryptographic keys and their owners.</br>";
                            var d20 = "PrivateKey is the common interface for private keys.</br>";
                            var d21 = "SAML Tokens assert that the subject or user has already been authenticated.</br>";
                            
                            
                            
                                          
                            //=====================================================================================
                            //===================================== Result 1 ======================================
                            //=====================================================================================
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out1 += '<tr><td class="ltr" COLSPAN = 2 style="width:30%;"><strong>' +
                            title1 + '</strong></td><td class="ltr text-green" style="width:20%; padding-left:3%;">' +
                            d[o].fg +    //this is the sum of found code
                            '</td><td class="ltr" style="width:45%;">' +
                            headCap1 + '<a href="javascript:ReverseDisplay('+p0+')" id="elementp0">' +
                            'More...' +
                            '</a></td></tr>' +
                            //expandable and collapsable row
                            '<tr id="tr0">' +     //needs to be incremented for static data
                            '<td id="trPadding1"></td> ' +               //blank td to indent expandable info
                            '<td id="p'+i+'" COLSPAN = 3 style="display: none" style="width:95%;" >' +
                            sDesc1 +      //this is making the databox expand when unhidden
                            '</br></br>' +
                            '<div id="sName">' + tab + s1 + '</div><div id="sTotal">' + d[o].f1 + 
                            '</div><div id="sDetails">' + d1 + '</br></div>' +
                            '<div id="sName">' + tab + s2 + '</div><div id="sTotal">' + d[o].f2 + 
                            '</div><div id="sDetails">' + d2 + '</br></div>' +
                            '<div id="sName">' + tab + s3 + '</div><div id="sTotal">' + d[o].f3 + 
                            '</div><div id="sDetails">' + d3 + '</br></div>' +
                            '<div id="sName">' + tab + s4 + '</div><div id="sTotal">' + d[o].f4 + 
                            '</div><div id="sDetails">' + d4 + '</br></div>' +
                            '<div id="sName">' + tab + s5 + '</div><div id="sTotal">' + d[o].f5 + 
                            '</div><div id="sDetails">' + d5 + '</br></div>' ;
                            //=====================================================================================
                            //================================ End Result 1 =========================================
                            //=====================================================================================
                            
                            //=====================================================================================
                            //===================================== Result 2 ======================================
                            //=====================================================================================
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out1 += '<tr><td class="ltr" COLSPAN = 2 style="width:30%;"><strong>' +
                            title2 + '</strong></td><td class="ltr text-green" style="width:20%; padding-left:3%;">' +
                            d[o].dg +    //this is the sum of found code
                            '</td><td class="ltr" style="width:45%;">' +
                            headCap2 + '<a href="javascript:ReverseDisplay('+p1+')" id="elementp1">' + //needs to be incremented for static data
                            'More...' +
                            '</a></td></tr>' +
                            //expandable and collapsable row
                            '<tr id="tr1">' +     //needs to be incremented for static data
                            '<td id="trPadding1"></td> ' +               //blank td to indent expandable info
                            '<td id="p1" COLSPAN = 3 style="display: none" style="width:95%;" >' +
                            sDesc2 +      //this is making the databox expand when unhidden
                            '</br></br>' +
                            '<div id="sName">' + tab + s6 + '</div><div id="sTotal">' + d[o].d1 + 
                            '</div><div id="sDetails">' + d6 + '</br></div>' +
                            '<div id="sName">' + tab + s7 + '</div><div id="sTotal">' + d[o].d2 + 
                            '</div><div id="sDetails">' + d7 + '</br></div>' +
                            '<div id="sName">' + tab + s8 + '</div><div id="sTotal">' + d[o].d3 + 
                            '</div><div id="sDetails">' + d8 + '</br></div>' +
                            '<div id="sName">' + tab + s9 + '</div><div id="sTotal">' + d[o].d4 + 
                            '</div><div id="sDetails">' + d9 + '</br></div>' +
                            '<div id="sName">' + tab + s10 + '</div><div id="sTotal">' + d[o].d5 + 
                            '</div><div id="sDetails">' + d10 + '</br></div>' ;
                            //=====================================================================================
                            //================================ End Result 2 =========================================
                            //=====================================================================================

                            //=====================================================================================
                            //===================================== Result 3 ======================================
                            //=====================================================================================
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out1 += '<tr><td class="ltr" COLSPAN = 2 style="width:30%;"><strong>' +
                            title3 + '</strong></td><td class="ltr text-green" style="width:20%; padding-left:3%;">' +
                            d[o].eg +    //this is the sum of found code
                            '</td><td class="ltr" style="width:45%;">' +
                            headCap3 + '<a href="javascript:ReverseDisplay('+p2+')" id="elementp2">' + //needs to be incremented for static data
                            'More...' +
                            '</a></td></tr>' +
                            //expandable and collapsable row
                            '<tr id="tr2">' +     //needs to be incremented for static data
                            '<td id="trPadding1"></td> ' +               //blank td to indent expandable info
                            '<td id="p2" COLSPAN = 3 style="display: none" style="width:95%;" >' +
                            sDesc3 +      //this is making the databox expand when unhidden
                            '</br></br>' +
                            '<div id="sName">' + tab + s11 + '</div><div id="sTotal">' + d[o].e1 + 
                            '</div><div id="sDetails">' + d11 + '</br></div>' +
                            '<div id="sName">' + tab + s12 + '</div><div id="sTotal">' + d[o].e2 + 
                            '</div><div id="sDetails">' + d12 + '</br></div>' +
                            '<div id="sName">' + tab + s13 + '</div><div id="sTotal">' + d[o].e3 + 
                            '</div><div id="sDetails">' + d13 + '</br></div>' ;
                            //=====================================================================================
                            //================================ End Result 3 =========================================
                            //===================================================================================== 
                            
                            //=====================================================================================
                            //===================================== Result 4 ======================================
                            //=====================================================================================
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out1 += '<tr><td class="ltr" COLSPAN = 2 style="width:30%;"><strong>' +
                            title4 + '</strong></td><td class="ltr text-green" style="width:20%; padding-left:3%;">' +
                            d[o].hg +    //this is the sum of found code
                            '</td><td class="ltr" style="width:45%;">' +
                            headCap4 + '<a href="javascript:ReverseDisplay('+p3+')" id="elementp3">' + //needs to be incremented for static data
                            'More...' +
                            '</a></td></tr>' +
                            //expandable and collapsable row
                            '<tr id="tr3">' +     //needs to be incremented for static data
                            '<td id="trPadding1"></td> ' +               //blank td to indent expandable info
                            '<td id="p3" COLSPAN = 3 style="display: none" style="width:95%;" >' +
                            sDesc4 +      //this is making the databox expand when unhidden
                            '</br></br>' +
                            '<div id="sName">' + tab + s14 + '</div><div id="sTotal">' + d[o].h1 + 
                            '</div><div id="sDetails">' + d14 + '</br></div>' +
                            '<div id="sName">' + tab + s15 + '</div><div id="sTotal">' + d[o].h2 + 
                            '</div><div id="sDetails">' + d15 + '</br></div>' +
                            '<div id="sName">' + tab + s16 + '</div><div id="sTotal">' + d[o].h3 + 
                            '</div><div id="sDetails">' + d16 + '</br></div>' +
                            '<div id="sName">' + tab + s17 + '</div><div id="sTotal">' + d[o].h4 + 
                            '</div><div id="sDetails">' + d17 + '</br></div>' +
                            '<div id="sName">' + tab + s18 + '</div><div id="sTotal">' + d[o].h5 + 
                            '</div><div id="sDetails">' + d18 + '</br></div>' ;
                            //=====================================================================================
                            //================================ End Result 4 =========================================
                            //===================================================================================== 
                            
                            //=====================================================================================
                            //===================================== Result 5 ======================================
                            //=====================================================================================
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out1 += '<tr><td class="ltr" COLSPAN = 2 style="width:30%;"><strong>' +
                            title5 + '</strong></td><td class="ltr text-green" style="width:20%; padding-left:3%;">' +
                            d[o].kg +    //this is the sum of found code
                            '</td><td class="ltr" style="width:45%;">' +
                            headCap5 + '<a href="javascript:ReverseDisplay('+p4+')" id="elementp4">' + //needs to be incremented for static data
                            'More...' +
                            '</a></td></tr>' +
                            //expandable and collapsable row
                            '<tr id="tr4">' +     //needs to be incremented for static data
                            '<td id="trPadding1"></td> ' +               //blank td to indent expandable info
                            '<td id="p4" COLSPAN = 3 style="display: none" style="width:95%;" >' +
                            sDesc5 +      //this is making the databox expand when unhidden
                            '</br></br>' +
                            '<div id="sName">' + tab + s19 + '</div><div id="sTotal">' + d[o].k1 + 
                            '</div><div id="sDetails">' + d19 + '</br></div>' +
                            '<div id="sName">' + tab + s20 + '</div><div id="sTotal">' + d[o].k2 + 
                            '</div><div id="sDetails">' + d20 + '</br></div>' +
                            '<div id="sName">' + tab + s21 + '</div><div id="sTotal">' + d[o].k3 + 
                            '</div><div id="sDetails">' + d21 + '</br></div>'  ;
                            //=====================================================================================
                            //================================ End Result 5 =========================================
                            //===================================================================================== 
                          
                            
                            //adds the virustotal link
                            out1 += '<tr><td class="ltr" COLSPAN = 4 style="width:35%;"><a href="' +d[o].plink + '" class="btn btn-primary btn btn-block" alt="Link to virustotal scan" target="_blank">View virus scan performed by virustotal.com</a></td></tr>' ;
 
                            

                            
                            
                            //out += "</table>"
                            document.getElementById("databox3").innerHTML = out1;

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
 
 
 
                    clearTimeout(myTimer);  //this cancels the database query after the apk is scanned

                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    var xmlhttp = new XMLHttpRequest();
                    var url = "scanCheck1.php";

                    xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        myFunction(xmlhttp.responseText);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                    
                    function myFunction(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var out = '<table class="table table-striped" id="antivirus-results">';
                        
                        for(i = 0; i < arr.length; i++) { var j="'p"+i+"'";
                            
                            //out += '<tr><td class="ltr" onclick="ReverseDisplay('+j+')">' + 
                            out += '<tr><td id="trPaddingDB1"></td>' +
                            '<td class="lt" style="width:30%;">' +
                            '<strong>File Name</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].fn +
                            '</td></tr>' +
                            '<td id="trPaddingDB1"></td><td class="lt" style="width:30%;">' +
                            '<strong>Version</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].fv +
                            '</td></tr>' +
                            '<td id="trPaddingDB1"></td><td class="lt" style="width:30%;">' +
                            '<strong>Package</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].fp +
                            '</td></tr>' +
                            '<td id="trPaddingDB1"></td><td class="lt" style="width:30%;">' +
                            '<strong>MD5 File Hash</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].fd +
                            '</td></tr>' +
                            '<td id="trPaddingDB1"></td><td class="lt" style="width:30%;">' +
                            '<strong>Total Files Analysed</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].jf +
                            '</td></tr>' +
                            '<td id="trPaddingDB1"></td><td class="lt" style="width:30%;">' +
                            '<strong>Date Scanned</strong></td>' +                            
                            '<td class="ltrs" style="width:61%;">' +
                            arr[i].ft +
                            '</td></tr></table>' ; 
                            
                            }
                        //out += "</table>"
                        document.getElementById("databox2").innerHTML = out;
                        
                        for(i = 0; i < arr.length; i++) { var j="'p"+i+"'";
                        var t1 = arr[i].File_access_group;
                        var t2 = arr[i].DB_access_group;
                        var t3 = arr[i].External_process_group;
                        var t4 = arr[i].Http_redirect_group;
                        var t5 = arr[i].Keystore_group;
                       }
                        
                        
                        
                        
                        //Morris charts snippet - js                        
                        //$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
                        //$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){ 
                        $.getScript('js/raphael-min.js',function(){
                        $.getScript('js/morris.min.js',function(){
                        
                            Morris.Donut({
                                element: 'donut-example',
                                data: [
                                    //{label: "File Access", value: t1},
                                    {label: "File Access", value: t1 },
                                    {label: "Database Access", value: t2},
                                    {label: "External Process", value: t3},
                                    {label: "HTTP Request", value: t4},
                                    {label: "Crypto and Keystore", value: t5}
                                ]
                            });
                        });
                        });

 
                     
                        
                    }
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                   
                   
                    
                   
                } else{ databox.innerHTML = "Please wait...";}   // displayed while report is being scanned
            }//else{ alert('error');}
        }
    }
    hr.send("limit=1");                       //variable and value we are sending to the php file
    
    


    
    
    
    
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////change this to an animated gif when its working////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    databox.innerHTML = "requesting...";      //prints to screen while request is happening
    myTimer = setTimeout('ajax_json_data()',6000);   //set the timer to execute code after EVERY 6 seconds - immediate first time
    
    
    
} 






function HideContent(d) {
var element = document.getElementById('element' + d);
document.getElementById(d).style.display = "none";
element.innerHTML = 'More...';
}
function ShowContent(d) {
var element = document.getElementById('element' + d);
document.getElementById(d).style.display = "block"; element.innerHTML = 'Less...';
}
function ReverseDisplay(d) {
var element = document.getElementById('element' + d);
if(document.getElementById(d).style.display == "none") { 
document.getElementById(d).colSpan = "3"; document.getElementById(d).style.display = "table-cell";  //http://stackoverflow.com/questions/19784298/td-colspan-not-working-for-tr-with-ids
element.innerHTML = 'Less...';}
else { document.getElementById(d).style.display = "none"; element.innerHTML = 'More...';}
}


    


