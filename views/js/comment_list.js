/**
 * Created by mubashir on 9/22/15.
 */

function comment(commentstr,name,userid){
    this.value=commentstr;
    this.name=name;
    this.userid=userid;
}

var comment_list_array=new Array();

function comment_list(id){
    this.myid=id;
    comment_list_array[id]=this;
    this.size=0;
    this.commentarr=new Array();
	this.check=0;
}

comment_list.prototype.add_comment=function (newcomment){
    this.commentarr[this.size++]=newcomment;
}