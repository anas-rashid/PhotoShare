/**
 * Created by mubashir on 9/21/15.
 */


var mainsys_array = new Array();

function mainsys(id,sharing){
    //document.writeln("mainsys constructor called with id: "+id+"<br>");
	sharing = typeof sharing !== 'undefined' ? sharing : 0;
    this.id=id;
    mainsys_array[id]=this;
    this.sysimg_array=new Array();
    this.size=0;
    this.cur_img=0;
	this.sharing=sharing;
}

mainsys.prototype.add_img=function(imgurl,name,picid,description,tags){
    //document.writeln("mainsys add_img called with id: "+this.id+"<br>");
    this.sysimg_array[this.size]=new sys_img(this.size++,imgurl,name,picid,description,tags);
}

mainsys.prototype.add_userid_and_name=function (userid,username){
	this.userid=userid;
	this.username=username;
}


mainsys.prototype.html_creater=function (newSpan){



    for(var i=0 in this.sysimg_array){
        var image = document.createElement("img");
        //document.writeln("in html creator value of i is "+i+" and source is "+this.sysimg_array[i].url+"<br>");
        image.src = this.sysimg_array[i].url;
        image.setAttribute("id",this.id+"-"+i);
        image.setAttribute("width","100px");
        image.setAttribute("height","100px");
        image.setAttribute("style","border-style: outset;" +
            "hover : border-color: red;");
        image.setAttribute("onclick","click_on_small_img("+i+",'"+this.id+"')");
        image.setAttribute("value",i+"");
        newSpan.appendChild(image);
    }
}

function click_on_small_img(pic_number,mainsysid){
    mainsys_array[mainsysid].cur_img=pic_number;
    document.getElementById(mainsysid+"-bigimage").src=mainsys_array[mainsysid].sysimg_array[mainsys_array[mainsysid].cur_img].url;
    mainsys_array[mainsysid].display_comments();

}

//var commnetin;
var callagain;

function commentInserter(tt,commnetin){
	for(var i in tt){
		commnetin.add_comment(new comment(tt[i]["commentstr"],tt[i]["name"]),tt[i]["userid"]);
	}
	callagain.display_comments();
	
}

mainsys.prototype.display_comments=function(){

    var side_panel=this.save_sidepanel;
	

    //deleting all elements

    while (side_panel.firstChild) {
        side_panel.removeChild(side_panel.firstChild);
    }
	
	if(this.sysimg_array[this.cur_img].my_comments.check==0){
		//commnetin=this.sysimg_array[this.cur_img].my_comments;
		callagain=this;
		var tempid=this.sysimg_array[this.cur_img].my_comments;
		$.ajax({
		dataType: "json",
		url: "../controller/getComments.php?picid="+this.sysimg_array[this.cur_img].picid,
		success: function(data){
			commentInserter(data,tempid);
		}
		});
		this.sysimg_array[this.cur_img].my_comments.check=1;
	}

    var picname=document.createElement("h2");
    picname.setAttribute("id",this.id+"-picname");
    side_panel.appendChild(picname);
    document.getElementById(this.id+"-picname").innerHTML=this.sysimg_array[this.cur_img].name;
	
	//showing description
	var txtnode=document.createTextNode("Description:");
	var des=document.createElement("h3");
	des.appendChild(txtnode);
	side_panel.appendChild(des);
	des=document.createElement("p");
	if(this.sysimg_array[this.cur_img].desc){
		txtnode=document.createTextNode(this.sysimg_array[this.cur_img].desc);
		des.appendChild(txtnode);
	}
	side_panel.appendChild(des);
	
	//showing tags
	
	txtnode=document.createTextNode("Tags:");
	des=document.createElement("h3");
	des.appendChild(txtnode);
	side_panel.appendChild(des);
	des=document.createElement("p");
	if(this.sysimg_array[this.cur_img].desc){
		txtnode=document.createTextNode(this.sysimg_array[this.cur_img].tagsExtra);//change here for tags
		des.appendChild(txtnode);
	}
	side_panel.appendChild(des);
	

    var sideheading=document.createElement("h2");
    sideheading.setAttribute("id",this.id+"myheading");
    side_panel.appendChild(sideheading);
    document.getElementById(this.id+"myheading").innerHTML="Comments";

    var comment_table=document.createElement("table");
    comment_table.setAttribute("id",this.id+"-comments");

    //change here
        side_panel.appendChild(comment_table);

    for(var i in this.sysimg_array[this.cur_img].my_comments.commentarr){
        var row=document.createElement("tr");
        var username=document.createElement("td");
        username.setAttribute("id",this.id+"-comments-username-"+i);
        row.appendChild(username);
        comment_table.appendChild(row);
        var newrow=document.createElement("tr");
        var comment_value=document.createElement("td");
        comment_value.setAttribute("id",this.id+"-comments-value-"+i);
        newrow.appendChild(comment_value);
        comment_table.appendChild(newrow);
        document.getElementById(this.id+"-comments-username-"+i).innerHTML=this.sysimg_array[this.cur_img].my_comments.commentarr[i].name;
        document.getElementById(this.id+"-comments-value-"+i).innerHTML=this.sysimg_array[this.cur_img].my_comments.commentarr[i].value;
    }

    var row=document.createElement("tr");
    var data_in_row=document.createElement("td");
    row.appendChild(data_in_row);
    var add_new_comments=document.createElement("form");
    data_in_row.appendChild(add_new_comments);

   //making form

    //appending userid field
    var formtemp= document.createElement("input");
    formtemp.setAttribute("id",this.id+"new_userid");
    formtemp.setAttribute("type","hidden");
    formtemp.setAttribute("value",this.userid);
    add_new_comments.appendChild(formtemp);

    //appending breakline and span
    formtemp= document.createElement("br");
    add_new_comments.appendChild(formtemp);


    //appending name field
    formtemp= document.createElement("input");
    formtemp.setAttribute("id",this.id+"new_name");
    formtemp.setAttribute("type","hidden");
    formtemp.setAttribute("value",this.username);
    add_new_comments.appendChild(formtemp);

    //appending breakline and span
    formtemp= document.createElement("br");
    add_new_comments.appendChild(formtemp);
	//add_new_comments.innerHTML="your comment";
    //appending comment field
    formtemp= document.createElement("input");
    formtemp.setAttribute("id",this.id+"new_comment");
    formtemp.setAttribute("type","text");
    formtemp.setAttribute("value","your comment");
    add_new_comments.appendChild(formtemp);

    //appending breakline and span
    formtemp= document.createElement("br");
    add_new_comments.appendChild(formtemp);

    //appending submit button
    formtemp= document.createElement("input");
    formtemp.setAttribute("id",this.id+"submit_button");
    formtemp.setAttribute("type","submit");
    add_new_comments.appendChild(formtemp);
    comment_table.appendChild(row);

    //setting values

    add_new_comments.setAttribute("action",'javascript:add_comment_from_user("'+this.id+'","'+this.id+"new_userid"+'","'+this.id+"new_name"+'","'+this.id+"new_comment"+'");');



}

function get_value(id){
    return document.getElementById(id).value;
}

function add_comment_from_user(mainsysid,input_userid_id,input_name_id,input_comment_value_id){
    var temp_userid=get_value(input_userid_id);
	var temp_commentstr=get_value(input_comment_value_id);
	var temp_picid=mainsys_array[mainsysid].sysimg_array[mainsys_array[mainsysid].cur_img].picid;
	//document.writeln(temp_picid+"<br>");
	$.post( "../controller/store_comments.php", { userid: temp_userid, comment: temp_commentstr, picid : temp_picid } );
	
	var temp=new comment(get_value(input_comment_value_id),get_value(input_name_id),get_value(input_userid_id));//comnetstr,name,userid
    mainsys_array[mainsysid].sysimg_array[mainsys_array[mainsysid].cur_img].add_comment(temp);
    mainsys_array[mainsysid].display_comments();
	
	
}
var original_size_bigimg=window.screen.availHeight-500;
mainsys.prototype.display=function(divclass){
    //document.writeln("In display funciton<br>");

    //creating all divs here
	this.divclass=divclass;

    // comment bar div
	$("#"+divclass).css("height","550px");
    var side_panel=document.createElement("div");
    side_panel.setAttribute("class",this.id+"-commentbar");
    side_panel.setAttribute("id",this.id+"-idcommentbar");
    side_panel.style.width="205px";
    //side_panel.style.max-height="100%";
    //side_panel.style.display="inline";
    side_panel.style.border="2px solid #8AC007";
    side_panel.style.fontFamily='"Arial Black", Gadget, sans-serif';
    side_panel.style.float="left";
    side_panel.style.display="inline-block";
    side_panel.style.overflow="auto";

    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(side_panel);
    else
        document.writeln("yes <br>");

    this.save_sidepanel=side_panel;
	$('.'+this.id+"-commentbar").css("max-height","100%");
    this.display_comments();






    //main big image div

    var bigimg=document.createElement("div");
    bigimg.setAttribute("class",this.id+"-coverbigimg");
    bigimg.setAttribute("id",this.id+"-coverbigimg");
    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(bigimg);
    else
        document.writeln("yes <br>");




	$("#"+this.id+"-coverbigimg").css("width",width);
    $("#"+this.id+"-coverbigimg").css("height","550px");
	$("#"+this.id+"-coverbigimg").css("display","flex");



    //main image

    var image=document.createElement("img");
    image.src=this.sysimg_array[this.cur_img].url;
    image.setAttribute("id",this.id+"-bigimage");
    image.setAttribute("onclick","nextimg(this, '"+this.id+"',event)");

    bigimg.appendChild(image);

    var heg=window.screen.availHeight;
    var width=window.screen.availWidth;
    heg-=700;
    width-=700;
    
	$("#"+this.id+"-bigimage").css("max-width",'100%');
    $("#"+this.id+"-bigimage").css("max-width",'100%');






    //all small images div
    var newSpan = document.createElement('div');
    // add the class to the 'span'


    newSpan.setAttribute('class', this.id+'-slider');
    newSpan.setAttribute('id',this.id+'-slider');

    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(newSpan);
    else
        document.writeln("yes <br>");

    $('.'+this.id+'-slider').css("width",width-50);
    $('.'+this.id+'-slider').css("max-height","100%");
    $('.'+this.id+'-slider').css("overflow","auto");
    var $j = jQuery.noConflict();


    //create side panel

    this.html_creater(newSpan);

    //change view button comments
    var change=document.createElement("button");
    change.setAttribute("type","button");
    change.setAttribute("id",this.id+"-change-comments");
    change.setAttribute("onclick",'hide_comments("'+this.id+"-idcommentbar"+'","'+this.id+"-bigimage"+'","'+this.id+'-slider'+'")');
    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(change);
    else
        document.writeln("yes <br>");

    document.getElementById(this.id+"-change-comments").innerHTML="toggle comments";

    //change main image
    var change=document.createElement("button");
    change.setAttribute("type","button");
    change.setAttribute("id",this.id+"-change-bigimg");
    change.setAttribute("onclick",'hide_bigimg("'+this.id+"-idcommentbar"+'","'+this.id+"-bigimage"+'","'+this.id+'-slider'+'")');
    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(change);
    else
        document.writeln("yes <br>");

    document.getElementById(this.id+"-change-bigimg").innerHTML="toggle bigimg";

    //change small img
    var change=document.createElement("button");
    change.setAttribute("type","button");
    change.setAttribute("id",this.id+"-change-smallimg");
    change.setAttribute("onclick",'hide_smallimg("'+this.id+"-idcommentbar"+'","'+this.id+"-bigimage"+'","'+this.id+'-slider'+'")');
    if(document.getElementById(divclass)!=null)
        document.getElementById(divclass).appendChild(change);
    else
        document.writeln("yes <br>");

    document.getElementById(this.id+"-change-smallimg").innerHTML="toggle smallimg";
	
	//share image
	if(this.sharing==0){
		 var change=document.createElement("button");
		change.setAttribute("type","button");
		change.setAttribute("id",this.id+"-share");
		change.setAttribute("onclick",'share("'+this.id+'")');
		if(document.getElementById(divclass)!=null)
			document.getElementById(divclass).appendChild(change);

		document.getElementById(this.id+"-share").innerHTML="share";
	}
	document.getElementById(divclass).appendChild(document.createElement("br"));
	
}


function share(myid){
	window.open(
  "./sharePic.php?picid="+mainsys_array[myid].sysimg_array[mainsys_array[myid].cur_img].picid,
  '_blank' // <- This is what makes it open in a new window.
);
	
}

function hide_comments(mycomments,mybigpicture,myslider){
    var width=window.screen.availWidth;
    if(document.getElementById(mycomments).style.display!="none"){
        document.getElementById(mycomments).style.display="none";
        original_size_bigimg=document.getElementById(mybigpicture).style.width;
        document.getElementById(mybigpicture).style.width=width-25+"px";
    }
    else {
        document.getElementById(mybigpicture).style.width=original_size_bigimg;
        document.getElementById(mycomments).style.display="inline-block";
    }
}

var original_smallimg_height=105;

function hide_bigimg(mycomments,mybigpicture,myslider){
   $("#"+mybigpicture).toggle();
}

var original_bigimg_height;

function hide_smallimg(mycomments,mybigpicture,myslider){
    var height=window.screen.availHeight;
    if(document.getElementById(myslider).style.display!="none"){
        document.getElementById(myslider).style.display="none";
        $("#"+mybigpicture).height(height-125);
    }
    else {
        $("#"+mybigpicture).height(height-230);
        document.getElementById(myslider).style.display="block";
    }
}

function nextimg(thisptr,mainsysptr,event){
    var original_width=document.getElementById(mainsysptr+"-bigimage").clientWidth;
    var x = event.clientX;
    if(x>(original_width/2)){
        mainsys_array[mainsysptr].cur_img++;
        mainsys_array[mainsysptr].cur_img=mainsys_array[mainsysptr].cur_img% mainsys_array[mainsysptr].size;
        document.getElementById(mainsysptr+"-bigimage").src=mainsys_array[mainsysptr].sysimg_array[mainsys_array[mainsysptr].cur_img].url;
        mainsys_array[mainsysptr].display_comments();
    }
    else{
        mainsys_array[mainsysptr].cur_img--;
        if(mainsys_array[mainsysptr].cur_img<0){
            mainsys_array[mainsysptr].cur_img=mainsys_array[mainsysptr].size-1;
        }
        mainsys_array[mainsysptr].cur_img=mainsys_array[mainsysptr].cur_img% mainsys_array[mainsysptr].size;
        document.getElementById(mainsysptr+"-bigimage").src=mainsys_array[mainsysptr].sysimg_array[mainsys_array[mainsysptr].cur_img].url;
        mainsys_array[mainsysptr].display_comments();
    }



}


