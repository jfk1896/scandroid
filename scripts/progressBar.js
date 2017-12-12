//$('input#file-submit').on('click', uploadFile(){
  //onclick="uploadFile()"

function _(el){
    return document.getElementById(el);   /*get element will be required a lot - using a return
                                            function means it can be called with and _ symbol */
}

function uploadFile(){
    document.getElementById('progressBar').style.visibility="visible";  //shows progress bar while uploading
    //create variable using the document.get element (_) to the file named in the html (file1)
    //And target its files array first element
    var file = _("file-choosen").files[0];
    //***for testing**** view the name-size and type even before the upload button is pushed
    //alert(files.name+" | "+file.size+" | "+ file.type);
    
    var formdata = new FormData();    //new form data object instance
    formdata.append("file1", file);   //add to file1 and reference the object file above

    //build the ajax request
    var ajax = new XMLHttpRequest();
    
    //need to add event listeners for the different events
    //Also need to write 4 functions for the below handlers -progress-complete-error-abort
    ajax.upload.addEventListener("progress", progressHandler, false);  /*called everytime there is
                                                                       new loaded bytes. Also
                                                                       the upload event so it can 
                                                                       be monitored as it uploads*/
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    
    /*open the ajax and pass it two parameters post and the php parser file that will be used
    to upload the file to the server*/
    ajax.open("POST", "file_upload_parser.php");
    ajax.send(formdata);     //we are going to send form data that has the file appended to it above
  
}
//pass event argument to the progressHandler
function progressHandler(event){
    //document.get element    for testing how much loaded and total
    //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;   //how many bytes uploaded
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status1").innerHTML = Math.round(percent)+"% uploaded... Please wait"; 

}

//pass event argument to the completeHandler which is tied to the load event
function completeHandler(event){
    _("status1").innerHTML = event.target.responseText;  //response back from php file 
    //document.getElementsByTagName('status').innerHTML =  event.target.responseText;
    //var vText = document.getElementById("status");
    //alert(vText.innerHTML);
    document.getElementById('progressBar').style.visibility="hidden";  //shows progress bar while uploading
    _("progressBar").value = 0;   //document.get element and set the progress back to zero
    
    
 //   window.location = 'reports.php';       //returns user to home page even if not logged in
    init();
}

function init(){

		var linkPage = document.getElementById('dynLink').href;
		window.location.href = linkPage;
	}

	onload=init;






//pass event argument to the errorHandler to report error message
function errorHandler(event){
    _("status1").innerHTML = "Upload Failed!";  //response back from php file     
    //window.location = 'index.php';
}

//pass event argument to the abortHandler which is like a cancel listener
function abortHandler(event){
    _("status1").innerHTML = "Upload Aborted!";  //response back from php file     
   // window.location = 'index.php';
}

//});//end onclick
