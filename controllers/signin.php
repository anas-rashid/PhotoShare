<?php
	session_start();
	require_once("../models/user.php");
	if(isset($_POST['login']))
	{
		$pass=$_POST['pass'];
		$username=$_POST['username'];
		
		if(empty($username)||empty($pass))
		{
			$error = "Please Enter both Username and Password!";
		}
		else
		{
			if(user::validate($username,$pass)==true)
			{
				$myuser= new User($username);
				$_SESSION["user"] =$myuser->get_values();
				var_dump($_SESSION["user"]);
				header("Location: ../views/profilePage.php?username=".$username);
			}
			else
			{
				$error="Incorrect Username or Password!";
			}
		}
	}
	else
	{
		$error = "Press 'Login' to enter.";
	}
	
?>
	