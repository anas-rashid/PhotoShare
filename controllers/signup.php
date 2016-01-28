<?php
	require_once("../models/user.php");
	$error="Input All Fields!";
	if(isset($_POST['submit']))
	{
		$fullname=$_POST['fullname'];
		$email=$_POST['usermail'];
		$pass=$_POST['pass'];
		$username=$_POST['username'];
		$cpass=$_POST['cpass'];
		if(empty($fullname)||empty($email)||empty($pass)||empty($cpass)||empty($username))
		{
			$error = "cannot leave any field empty!";
		}
		elseif($pass!=$cpass)
			{
				$error = "cannot leave any field empty!";
			}
		else
		{
			if(user::signup($username, $fullname,$email,$pass)===true)
			{
				$error = 'SignupSuccessful';
				header('Location: ../views/signinPage.php?error='.urlencode($error));
			}
			else
				$error = "could not register user!!";
			
		}
	}
	else
		
	{
		$error = "Press 'Submit' Button for form Submission!";	
	}
?>