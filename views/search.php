<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		$temp=$_SESSION['user'];
	}
	else
	{
		header("Location: ../views/signinPage.php?message=".urlencode("Login again!"));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		require_once("engine.php");
		require_once("../models/user.php");
		require_once("../models/photo.php");
		require_once("../models/DataAccessHelper.php");
		
		echo $includes;
		
					
	?>				
	<title>
		PhotoShare
	</title>
</head>
	<script>
		
		function showResult(str) {
		  if (str.length==0) { 
			document.getElementById("livesearch").innerHTML="";
			document.getElementById("livesearch").style.border="0px";
			return;
		  }
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			  document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			}
		  }
		  xmlhttp.open("GET","../controllers/livesearch.php?q="+str,true);
		  xmlhttp.send();
		}

	</script> 
<body>
	<?php 
		echo $navbar;
	?>
	<div class = "col-md-3"></div>
	<div class = "col-md-6">
	<div class="form-group">
		<input type="text"  name="search" class="form-control" id="search" onkeyup="showResult(this.value)">
		<div class = "col-md-12" id="livesearch" >
			
		</div>
	</div>
	<div class = "col-md-3"></div>
	</div>
</body>
</html>