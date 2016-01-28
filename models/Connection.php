<?php
	$conn="";
	function getConnected()
	{
		$host = "localhost";
		$dbuser="root";
		$pass="";
		$dbname="photoshare";
		global $conn;
		$conn=mysqli_connect($host,$dbuser,$pass, $dbname);
		if(mysqli_connect_errno())
		{
			die("Connection Failed!").mysqli_connect_error();
			return false;
		}
		return true;
	}
	
	$res ="";
?>