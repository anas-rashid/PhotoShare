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
		require_once("../models/album.php");
		require_once("../models/DataAccessHelper.php");
		
		echo $includes;
		
		$imgsrc = array();
		$rs = photo ::getImageusername($temp['username']);
		
		foreach($rs as $row)
		{
			$imgsrc[] ='data:image/jpg;base64,'.base64_encode( $row['imageFile']);
		}
					
	?>				
	<title>
		PhotoShare
	</title>
</head>
	<script>

	</script> 
<body>
	<?php 
		echo $navbar;
	?>
	<div class="col-md-2" ></div>
	<div class="col-md-8" data-spy="scroll" data-target="#mynav">
        <div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3><?php echo $temp['fullname'];?>'s Albums</h3>
			</div>
			<div class="panel panel-body">
				<div class="col-md-12" >
					<?php
						$rs = album ::getAllUserAlbum($temp['username']);
						if($rs == false)
						{
							echo "No Albums Present!";
						}
						else
						{
							foreach($rs as $row)
							{
								echo '<div class="col-md-3 form-group" ><input type = "button" class ="col-md-12 btn btn-success" id="'.$row['albumId'].'" value = "'.$row['name'].'" name = "'.$row['name'].'" onclick=\'setalbum(id) \' /></div>';
							}
						}
					?>
					<div class="col-md-3 form-group" >
						<input type = "button" class ="col-md-12 btn btn-success" id="all" value = "All Others" name = "others" onclick='setall()'  />
					</div>
					<script>
						function setall()
						{
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() 
							{
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
								{
									document.getElementById("oneAlbum").innerHTML = xmlhttp.responseText;
								}
							};
							
							xmlhttp.open("GET", "../controllers/loadAlbum.php?albumId=0" , true);
							xmlhttp.send();
						}
						function setalbum(id)
						{
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() 
							{
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
								{
									
									document.getElementById("oneAlbum").innerHTML = xmlhttp.responseText;
								}
							};
							
							xmlhttp.open("GET", "../controllers/loadAlbum.php?albumId=" + id , true);
							xmlhttp.send();
						}
					</script>
					
				</div>
				<br>
				<div class="col-md-12" id="oneAlbum" name="oneAlbum" >
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2" >
	</div>
</body>
</html>