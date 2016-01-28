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
if(isset($_POST['upload']))
{
	$tmp_name= $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];
	$rights= $_POST['access'];
	if($rights=='0')
	{
		$rights=0;
	}
	else
	{
		$rights=1;
	}
	$label=  $_POST['label'];
	$description= $_POST['description'];
	$albumId=$_POST['albumName'];
	if(empty($albumId))
	{
		$albumId = null;
	}
	if(isset($tmp_name))
	{
		$image=addslashes(file_get_contents($_FILES['file']['tmp_name']));
		
		if(getimagesize($_FILES['file']['tmp_name'])==FALSE)
		{
			$uerror = "This is not a suitable image!";
		}
		else
		{
			
			include_once('../models/photo.php');
			
			if(photo::insertImage($image,$name,$description,$rights,$user['username'],$label, $albumId))
			{	
				//include_once('../models/album.php');
				//album::insertImg(intval($albumId), $image);
				header("Location: ../views/profilePage.php?message=".urlencode("Image uploaded!"));
				
			}
			else
			{
				$uerror = "Not Uploaded!";
			}
		}
	}
	else $uerror = "<br>Unsuitable Image Size!<br/>";
}

?> 