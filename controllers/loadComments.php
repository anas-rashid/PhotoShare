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
	require_once("../models/comment.php");
	$rs = comment ::getComments($_REQUEST['imgId']);

	if($rs == false)
	{
		echo "No Comments are given!";
	}
	else
	{
		foreach($rs as $row)
		{
			echo '"' .$row['commentstr'].'" <i>by</i> <strong>'. $row['username'].'</strong> <br>' ;
		}
	}
?>
					