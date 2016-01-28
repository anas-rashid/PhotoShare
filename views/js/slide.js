var pics=new Array();
var divOfImg = document.getElementById("area");
for(i=0;i<divOfImg.childNodes.length;i++)
{
	pics[i]=divOfImg.childAt[i].getAttribute("src");
	alert(pics[i]);
}

for(i =0;i<)

var sliders = new Array();

function slider(sn,id){
	this.picindex = sn;
	this.id = id;

	sliders[id] = this;
}

slider.prototype.slideview = function(id) {
		alert(pics[0]);
        var html="<h1 align=\"center\">Slide Show</h1>"
        html += "<div style=\"display:inline-block; position:relative; top:-246px; left:135px\" align=\"center\">";
        html+="<input type='button' style=\"height:500;\" value='<<' onclick='to_previous(\"" + this.id + "\")'>";
        html+="</input></div>";
        html += "<div style=\"display:inline-block; position:relative; left:135px;\">";
        html+="<img src='"+pics[this.picindex]+"' height=\"500\" width=\"700\" /></div>";
        html += "<div style=\"display:inline-block; left:135px; position:relative; top:-246px\" align=\"center\">";
        html+="<input type='button' style=\"height:500; left:135px\" value='>>' onclick='to_next(\"" + this.id + "\")'>";
        html+="</input></div>";
        html+="<div style=\"display:inline-block; position:relative; left:135px; top:-328px; background-color:pink; height:500; width:350\" align=\"center\">";
        html+="<h3>Description:</h3>This is the description of the picture";
        html+="<h3>Comments:</h3>";
        html+= "<input type='text'></input><br>";
        html+="<input type='button' value='post comment'></input>";
        html+="</div>";
        html+="<div style=\"display:inline-block; position:relative; top:-485px; left:135px;\" onclick=\"load_galary()\" align=\"center\">";
        html+="<input type='button' value='x'></input>";
        html+="</div>";
        document.getElementById(id).innerHTML = html;
}
function galaryview(id){
         var html="<h1 align=\"center\" >My pictures Galary<h2>";
         for(i=0;i<pics.length;i++)
         {
              html+="<img id="+i+" src='"+pics[i]+"' height=\"200\" width=\"200\" onclick=\"load(id)\"/>"
         }
         document.getElementById(id).innerHTML = html;
}

slider.prototype.increment = function(){

	this.picindex =Number(this.picindex) + 1;
	if(this.picindex==pics.length)
	{
             this.picindex=Number("0");
        }
	this.slideview('area');
}

slider.prototype.decrement = function(){
	this.picindex =Number(this.picindex) - 1;
	if(this.picindex==-1)
	{
             this.picindex=Number(pics.length-1);
        }
	this.slideview('area');
}

slider.prototype.get = function(){
	return this.picindex;
}
