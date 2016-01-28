<?php
error_reporting(0);
session_start();

if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
}
else
{
	header("Location: ../views/signinPage.php?message=".urlencode("Login Again!"));
}
$uerror = "";
if(isset($_POST['addToGroup']))
{
	$gID=$_POST['groups'];
	$username=$_POST['users'];
	if($username==$user['username'])
	{
		$uerror="You Cannot add yourself again";
	}
	else
	{
		include_once("../models/group.php");
		if(group::insertMember($gID, $username))
			$uerror="Inserted A new Member!";
		else
			$uerror="Couldn't insert member!";
	}
}

?> 