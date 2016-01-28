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
$aerror = "";
if(isset($_POST['addGroup']))
{
	$name = $_POST['name'];
	
	include_once('../models/group.php');
	if(group::insertGroup($name))
	{
		if(group::insertMember($name, $user['username']))
		{
			$aerror = "Group Created!";
			header("Location: ../views/allgroups.php");	
		}
	}
	else
	{
		$aerror = "Cannot Create a new Group!";
	}
}

?> 