/**
 * Created by mubashir on 9/22/15.
 */

var sys_img_array=new Array();

function sys_img(id,imgurl,namee,picid,picDescription,tags){
    //document.writeln("sys_img constructor called with id: "+id+" setting name"+name+"<br>");
    this.name=namee;
    this.id=id;
    sys_img_array[id]=this;
    this.url=imgurl;
	this.picid=picid;
    this.my_comments=new comment_list("sys_img-"+id);
	this.desc=picDescription;
	this.tagsExtra=tags;
}


sys_img.prototype.add_comment=function (newcomment){
    this.my_comments.add_comment(newcomment);
}

