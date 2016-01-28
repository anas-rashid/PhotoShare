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
	require_once("../models/album.php");
	if($_REQUEST['albumId'] == 0)
	{
		$rs = album ::getotheralbumdata($temp['username']);
		$id = 0;
		if($rs == false)
		{
			echo "No Other Present!";
		}
		else
		{
			foreach($rs as $row)
			{
				echo '<a href = "data:image/jpg;base64,'.base64_encode( $row['imageFile']).'"><img class="col-md-3" height="195" width="195" id="'.$id.'" src="data:image/jpg;base64,'.base64_encode( $row['imageFile']).'"/></a>';
				$id++;
			}
		}
	}
	else
	{
		$rs = album ::getalbumdata($_REQUEST['albumId'], $temp['username']);
		$id = 0;
		if($rs == false)
		{
			echo "No Photos Present!";
		}
		else
		{
			foreach($rs as $row)
			{
				echo '<a href = "data:image/jpg;base64,'.base64_encode( $row['imageFile']).'"><img class="col-md-3" height="195" width="195" id="'.$id.'" src="data:image/jpg;base64,'.base64_encode( $row['imageFile']).'"/></a>';
				$id++;
			}
		}
	}
?>
					