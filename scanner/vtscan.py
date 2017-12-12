import postfile
import sys
apkpath = str(sys.argv[1])
apkfile = str(sys.argv[2])
host = "www.virustotal.com"
selector = "https://www.virustotal.com/vtapi/v2/file/scan"
fields = [("apikey", "1fe22198247aedf04ec79991e6ef27c52f5252f9a6416b63e8d3629d2a8aa128")]
file_to_send = open("%s" % apkpath, "rb").read()
files = [("file", "%s" % apkfile, file_to_send)]
json = postfile.post_multipart(host, selector, fields, files)
print json
