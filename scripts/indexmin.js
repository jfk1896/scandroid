var selectedFile=null;
var selectedFileName=null;
var currentUpload=null;
(function(a){
    a.cookie=function(h,g,l){
        if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(g))||g===null||g===undefined)){
            l=a.extend({},l);

            if(g===null||g===undefined){
                l.expires=-1	      
	    }
	    if(typeof l.expires==="number"){
                var j=l.expires,k=l.expires=new Date();
                k.setDate(k.getDate()+j)
            }
            
            g=String(g);
            return(document.cookie=[encodeURIComponent(h),"=",l.raw?g:encodeURIComponent(g),l.expires?";
            expires="+l.expires.toUTCString():"",l.path?"; 
            path="+l.path:"",l.domain?"; domain="+l.domain:"",l.secure?"; secure":""].join("")
	      
        )}

        l=g||{};
        var b=l.raw?function(i){
           return i
        }

        :decodeURIComponent;var c=document.cookie.split("; ");
        for(var f=0,e;e=c[f]&&c[f].split("=");f++){
            if(b(e[0])===h){return b(e[1]||"")
        }
    }
    return null}
  
})(jQuery);
var timeDiff={setStartTime:function(){d=new Date();time=d.getTime()},getDiff:function(){d=new Date();return(d.getTime()-time)}};function uploadProgress(a){if(a.lengthComputable){var b=Math.round(a.loaded*100/a.total);$("#upload-progress").css("width",b+"%")}}function uploadComplete(a){$("#upload-progress").css("width","100%");var c=this.getResponseHeader("Content-Type");if(c=="application/json"){var b=$.parseJSON(this.responseText);window.setTimeout(function(e){window.location.href=e.analysis_url},1000,b)}else{window.setTimeout(function(e){$("#dlg-upload-progress").html(e);$("#dlg-upload-progress").show()},1000,this.responseText)}}function uploadFailed(a){alert("There was an error attempting to upload the file.")}function cancelUpload(){if(currentUpload){currentUpload.abort()}}function uploadFile(a,b,c){var e={};if(c){e={sha256:c}}var f=$("#frm-file").attr("action");$.ajax({type:"GET",async:true,url:f,dataType:"json",data:e,context:{filename:a},cache:false,success:function(g){if(g.file_exists){$("#btn-file-reanalyse").attr("href",g.reanalyse_url+"&filename="+this.filename);$("#btn-file-view-last-analysis").attr("href",g.last_analysis_url);$("#dlg-upload-progress").modal("hide");$("div#dlg-file-analysis-confirmation span#last-analysis-date").html(g.last_analysis_date);$("div#dlg-file-analysis-confirmation span#first-analysis-date").html(g.first_analysis_date);$("div#dlg-file-analysis-confirmation span#detection-ratio").html(""+g.detection_ratio[0]+"/"+g.detection_ratio[1]);$("#dlg-file-analysis-confirmation").modal("show");if(g.empty_file){$("#empty-file-warning").show()}}else{if(b&&window.FormData){var h=new FormData();h.append("file",b);h.append("ajax","true");h.append("remote_addr",g.remote_addr);if(c){h.append("sha256",c)}if(selectedFile.lastModifiedDate!=undefined){h.append("last_modified",selectedFile.lastModifiedDate.toISOString())}currentUpload=new XMLHttpRequest();currentUpload.upload.addEventListener("progress",uploadProgress,false);currentUpload.addEventListener("load",uploadComplete,false);currentUpload.addEventListener("error",uploadFailed,false);currentUpload.open("POST",g.upload_url);currentUpload.send(h)}else{$("#frm-file").attr("action",g.upload_url);$("#frm-file").submit();$("#gif-upload-progress-bar span").html('<img style="display:block" src="/static/img/bar.gif">')}}}})}function canUserWorker(){if(window.FileReader&&window.Worker){var a=parseInt(jQuery.browser.version,10);if(jQuery.browser.opera){return false}if(jQuery.browser.mozilla&&a>=13){return true}if(jQuery.browser.webkit&&a>=535){return true}}return false}function scanFile(a){if(!selectedFileName){return}if(selectedFile&&selectedFile.size>128*1024*1024){$("#dlg-file-too-large").modal("show");return}$("#dlg-upload-progress").modal("show");if(canUserWorker()){$("#upload-progress-bar").hide();$("#hash-progress").css("width","0%");$("#hash-progress-bar").show();worker=new Worker("/static/js/sha256.js?20131114-06");worker.onmessage=function(b){if(b.data.progress){$("#hash-progress").css("width",b.data.progress+"%")}else{$("#hash-progress-bar").hide();$("#upload-progress").css("width","0%");$("#upload-progress-bar").show();uploadFile(selectedFileName,selectedFile,b.data.sha256)}};worker.postMessage({file:selectedFile})}else{$("#gif-upload-progress-bar").show();uploadFile(selectedFileName,null,null)}}function selectFile(a){if(a.target.files){selectedFile=a.target.files[0]}var b=$(this).val().split(/(\\|\/)/g);selectedFileName=b[b.length-1];$("#file-name").text(selectedFileName);$("#btn-scan-file").focus()}function scanUrl(b){var a=$("input#url").val();var c={url:a};if(!a){return}$("#dlg-url-submission").modal("show");$.ajax({type:"POST",async:true,url:$("#frm-url").attr("action"),dataType:"json",data:c,cache:false,success:function(e){if(e.result){if(e.url_exists){$("#btn-url-view-last-analysis").attr("href",e.last_analysis_url);$("#btn-url-reanalyse").attr("href",e.reanalyse_url);$("#dlg-url-submission").modal("hide");$("div#dlg-url-analysis-confirmation span#last-analysis-date").html(e.last_analysis_date);$("div#dlg-url-analysis-confirmation span#first-analysis-date").html(e.first_analysis_date);$("div#dlg-url-analysis-confirmation span#detection-ratio").html(""+e.positives+"/"+e.total);$("#dlg-url-analysis-confirmation").modal("show")}else{window.location.href=e.analysis_url}}else{$("#dlg-url-submission").modal("hide");$("#dlg-url-invalid").modal("show")}}});b.preventDefault()}jQuery(document).ready(function(){if(window.location.hash=="#url"){$("#url-tab-chooser").tab("show")}else{if(window.location.hash=="#search"){$("#search-tab-chooser").tab("show")}else{if(window.location.hash=="#signup"){$("#dlg-join").modal("show")}}}$(".action").click(function(a){var b=$(this).attr("id");$("input#"+b).select()});$("#btn-scan-file").click(scanFile);$("input#file-choosen").change(selectFile);$(".btn.dialog").click(function(){$(this).siblings(".loading").show();$(this).siblings(".btn").addClass("disabled");$(this).addClass("disabled")});$("#btn-scan-url").click(function(a){a.preventDefault();scanUrl()});$("#url").keypress(function(a){if(a.which==13){scanUrl(a);a.preventDefault()}});$("#query").keypress(function(a){if(a.which==13){$("#frm-search").submit();a.preventDefault()}})});