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
	if($_REQUEST['thecomment']!="")
	{
		require_once("../models/comment.php");
		$rs = comment ::insertComment($_REQUEST['imgId'],$temp['username'], $_REQUEST['thecomment'] );

		if($rs == false)
		{
			echo "Comment not Added!", PHP_EOL;
		}
	}
?>
					