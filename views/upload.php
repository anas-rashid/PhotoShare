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
		require_once("../models/album.php");
		require_once("../controllers/upload.php");
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
				<h3>Upload an Image!</h3>
			</div>
			<div class="panel panel-body">
				<form enctype="multipart/form-data" action="" method="POST">
				<div class="col-md-12" >
					<div class="form-group">
						<label>
							Label : 
						</label>
						<input type="text" name= "label" class="form-control" id="label">
					</div>
					<div class="form-group">
						<label>
							Description : 
						</label>
						<input type="text" name= "description" class="form-control" id="description">
					</div>
					<div class="form-group">
						<label>
							Public : 
						</label>
						<select name = "access">
							<option value='0'>No</option>
							<option value='1'>Yes</option>
						</select>
					</div>
					<div class="form-group">
						<label>
							Album : 
						</label>
						<select name = "albumName">
						<option value=''>No Album</option>
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
									echo '<option value="'.$row['albumId'].'">'.$row['name'].'</option>';
								}
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<input type="file" name= "file" class="btn btn-info" id="file">
					</div>
					
					<div class="form-group">
						<input type="submit" name= "upload" class="btn btn-primary" value="Upload" id="upload">
					</div>
					
					<div class="form-group">
						<label>
							<?php echo $uerror;?>
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