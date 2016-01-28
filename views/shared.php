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
		function addcomments(id)
		{
			var comment = prompt("Add Your Comment!");
			if(comment != null)
			{
				var xmlhttp = new XMLHttpRequest();
			
				xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						
					}
				}
				xmlhttp.open("GET", "../controllers/addComments.php?imgId=" + id +"&thecomment="+comment, true);
				xmlhttp.send();
			}
			showcomments(id);
		}
		function showcomments(id)
		{
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					document.getElementById("comments").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "../controllers/loadComments.php?imgId= '" + id +"'", true);
			xmlhttp.send();
			
		}
	</script> 
<body>
	<?php 
		echo $navbar;
	?>
	
	<div class="col-md-8" data-spy="scroll" data-target="#mynav">
        <div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3><?php echo $temp['fullname'];?>'s Photos</h3>
			</div>
			<div class="panel panel-body">
				<div class="col-md-12"  id="area">
				
					<?php
						
						$rs = photo ::getImagePublic();
						if($rs == false)
						{
							echo "No Images Uploaded!";
						}
						else
						{
							$id = 0;
							$files = glob('c:/xampp/htdocs/webproject/views/images/*'); // get all file names
							foreach($files as $file)
							{ 
							  if(is_file($file))
								unlink($file);
							}
							
							$paths=array();
							
							foreach($rs as $row)
							{
								$paths[]="c:/xampp/htdocs/webproject/views/images/".$row['imgId'].".jpg";
								file_put_contents("c:/xampp/htdocs/webproject/views/images/".$row['imgId'].".jpg", $row['imageFile']);
								
								echo '<img class="col-md-3" height="190" width="195" id="'.$row['imgId'].'" src="data:image/jpg;base64,'.base64_encode( $row['imageFile']).'"   onclick=\'addcomments(id)\'/>';
								$id++;
							}
						}
						?>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-3" >
	<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Picture Comments</h3>
			</div>
			<div class="panel panel-body">
				<div class="col-md-12"  id="comments">
					
				</div>
				
			</div>
	</div>
	</div>
</body>
</html>