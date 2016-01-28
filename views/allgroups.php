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
		require_once("../models/group.php");
		require_once("../models/DataAccessHelper.php");
		
		echo $includes;
		
					
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
				<h3><?php echo $temp['fullname'];?>'s Groups</h3>
			</div>
			<div class="panel panel-body">
				<div class="col-md-12" >
					
					<?php
						$rs = group :: getAllUserGroups($temp['username']);
						if($rs == false)
						{
							echo "No Groups are Present!";
						}
						else
						{
							foreach($rs as $row)
							{
								echo '<div class="col-md-3 form-group" ><input type = "button" class ="col-md-12 btn btn-success" id="'.$row['groupId'].'" value = "'.$row['gname'].'" name = "'.$row['gname'].'" onclick=\'showMembers(id)\'/></div>';
							}
						}
					?>
					
					<script>
						function showMembers(id)
						{
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() 
							{
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
								{
									document.getElementById("oneGroup").innerHTML = "<label>Member's List :-</label><br>Group ID # "+id+" "+xmlhttp.responseText;
								}
							};
							
							xmlhttp.open("GET", "../controllers/loadGroup.php?groupId="+id , true);
							xmlhttp.send();
						}
						
					</script>
					
				</div>
				<br>
				<div class="col-md-12" id="oneGroup" name="oneGroup" >
						
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2" >
	</div>
</body>
</html>