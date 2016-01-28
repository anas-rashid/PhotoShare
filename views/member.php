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
		require_once("../models/group.php");
		require_once("../controllers/member.php");
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
				<h3>Add a New Member in Your Groups!</h3>
			</div>
			<div class="panel panel-body">
				<form action="" method="POST">
				<div class="col-md-12 form-group" >
						<label>
							Group : 
						</label>
						<select name = "groups">
							<?php
							$rs = group ::getAllUserGroups($temp['username']);
							if($rs == false)
							{
								echo "No Groups are made by You!";
							}
							else
							{
								foreach($rs as $row)
								{
									echo '<option value="'.$row['gname'].'">'.$row['gname'].'</option>';
								}
							}
						?>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>
							Users : 
						</label>
						<select name = "users">
						<?php
							$rs = user ::loadAll();
							if($rs == false)
							{
								echo "No Users are Signed Up!";
							}
							else
							{
								foreach($rs as $row)
								{
									echo '<option value="'.$row['username'].'">'.$row['fullname'].'</option>';
								}
							}
						?>
						</select>
					</div>
					
					<div class="form-group col-md-12">
						<input type="submit" name= "addToGroup" class="btn btn-primary" value="+ to Group" id="addToGroup">
					</div>
					<div class="form-group col-md-12">
					<label>
						<?php
							echo $uerror;
						?>
					</label>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3" ></div>
</body>
</html>