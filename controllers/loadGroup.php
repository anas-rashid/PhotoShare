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

<?php
	require_once("../models/group.php");
	
	$rs = group ::getAllUsers($_REQUEST['groupId']);
	$id = 0;
	if($rs == false)
	{
		echo "No Members are added!";
	}
	else
	{
		foreach($rs as $row)
		{
			echo '<div class ="form-group col-md-12"><label><li>'.$row['username'].'
					</li></label></div>';
			$id++;
		}
	}
	
?>
					