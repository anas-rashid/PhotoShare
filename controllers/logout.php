<?php
  if(isset($_POST['signout']))
  {
    $_SESSION["user"] = "";
	header("Location: ../views/signinPage.php");	
  }
?>