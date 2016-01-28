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
if(isset($_POST['addAlbum']))
{
	$name = $_POST['name'];
	
	include_once('../models/album.php');
	if(album::insertAlbum($name,$user['username'])){
		$aerror = "Album Created!";
		header("Location: ../views/allalbums.php");	
	}
	else
	{
		$aerror = "Cannot Create a new Album!";
	}

}

?> 