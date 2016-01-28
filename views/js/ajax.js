function ajax(method,url,mode,handler,caller){
this.requestMethod = method;
this.requestUrl = url;
this.ajaxMode = mode;
this.xmlhttp = new XMLHttpRequest();
this.xmlhttp.parent = this;
this.callBack = handler;
this.callerObject = caller;
this.send = function(){
this.xmlhttp.onreadystatechange = function(){
if(this.readyState == 4 && this.status == 200){
this.parent.callBack(this.responseText,this.responseXML,this.parent.callerObject);
}
}
this.xmlhttp.open(this.requestMethod,this.requestUrl,this.ajaxMode);
this.xmlhttp.send();
}
}