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
		require_once("../controllers/album.php");
		echo $includes;
	?>
	<title>
		PhotoShare
	</title>
</head>

<body>
	<?php 
		echo $navbar;
	?>
	<div class="col-md-2" ></div>
	<div class="col-md-8" data-spy="scroll" data-target="#mynav">
        <div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Create New Albums</h3>
			</div>
			<div class="panel panel-body">

				<div class="col-md-12" >
				<form action="" method="POST">
					<div class="col-md-12" >
					<div class="form-group">
						<label>
							Album Name : 
						</label>
						<input type="text" name= "name" class="form-control" id="name">
					</div>
					<input type = "submit" class= "btn btn-primary" value ="+ New Album" name="addAlbum">
					<label>
						<?php echo $aerror;?>
					</label>
				</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2" ></div>
</body>
</html>