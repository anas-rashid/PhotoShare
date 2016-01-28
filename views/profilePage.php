<?php
	session_start();
	if(isset($_SESSION['user'])){
		$temp=$_SESSION['user'];
	}
	else{
		header("Location: ../views/signinPage.php?message=".urlencode("Login again!"));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		require_once("engine.php");
		require_once("../models/user.php");
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
	<div class="col-md-3" ></div>
	<div class="col-md-6" data-spy="scroll" data-target="#mynav">
        <div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3><?php echo $temp['fullname'];?>'s Profile</h3>
			</div>
			<div class="panel panel-body">

				<div class="col-md-12" >
					<div class="form-group">
						<label>
							Username : 
						</label>
						<?php echo $temp['username'];?>
					</div>
					<div class="form-group">
						<label>
							Full Name : 
						</label>
						<?php echo $temp['fullname'];?>
					</div>
					<div class="form-group">
						<label>
							Email Address : 
						</label>
						<?php echo $temp['email'];?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3" ></div>
</body>
</html>