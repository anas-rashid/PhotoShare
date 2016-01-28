<!DOCTYPE html>
<html lang="en">

<head>
		<?php 
			require_once("../controllers/signup.php");
		?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/myCSS.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
            $(".col-md-6").mouseleave(function(){
            $("#div1").fadeTo("slow", 0.5);
            });
            });
            $(document).ready(function(){
            $(".col-md-6").mouseenter(function(){
            $("#div1").fadeTo("fast", 1);
            });
            });
            $(document).ready(function(){
            $("#mail").mouseenter(function(){
            $("#mailSample").slideDown("fast");
            });
            $("#mail").mouseleave(function(){
            $("#mailSample").slideUp("fast");
            });
            });

            $(document).ready(function(){
            $("#pswd").mouseenter(function(){
            $("#pswdSample").slideDown("fast");
            });
            $("#pswd").mouseleave(function(){
            $("#pswdSample").slideUp("fast");
            });
            });
            $(document).ready(function(){
            $("#siteHead").slideDown(1000);
            });
            $(document).ready(function(){
            $("#fname").slideDown(1000);
            });
            $(document).ready(function(){
            $("#mail").slideDown(1000);
            });
            $(document).ready(function(){
            $("#uname").slideDown(1000);
            });
            
            $(document).ready(function(){
            $("#pswd").slideDown(1000);
            });
            $(document).ready(function(){
            $("#cpwd").slideDown(1000);              
            });
            $(document).ready(function(){             
            $("#sbtn").slideDown(1000);
            });
            $(function() {
            $( "#datepicker" ).datepicker();
            });
            
    </script>
        <script src="bootstrap.min.js"></script>
        <script src="angular.min.js"></script>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
</head>
	<title>
		PhotoShare - Pick your Clicks...
	</title>
	<body class="container" style="background-image:url(css/backImg.jpg)">
		<form action="" method="POST">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div id="siteHead" class="panel-heading" style="display:none">
						<div class="panel-title">
							<h1 id="heading" >
								<small>
									<font color="azure" size="5px" >
										Join
									</font>
								</small>
								PhotoShare!
								<small id="slogan" >
									<font color="azure" size="5px" > 
										Pick your Clicks...
									</font>
								</small>
							</h1>
						</div>
					</div>
					<div id="div1" class="panel-body">
					<div id="fname" class="form-group" style="display:none">
						<label  >Name:</label>
						<input type="text" class="form-control" id="fullname" name="fullname" >
					</div>
					<div id="mail" class="form-group" style="display:none">
						<label for="usermail" >Email:</label>
						<input type="email" class="form-control" id="usermail" name="usermail">	
						<div id="mailSample" style="display: none; padding:10px">
							<li>e.g. abc@example.com</li>
						</div>
					</div>
           
					<div id="uname" class="form-group" style="display:none">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" name="username">
					</div>
       
					<div id="pswd" class="form-group" style="display:none">
						<label for="pwd">Password:</label>
						<input type="password" name ="pass" class="form-control" id="pwd">
						<div id="pswdSample" style="display:none;padding:10px" >
							<li>must contain atleast 8 characters.</li>
						</div>
					</div>
            
					<div id="cpwd"  class="form-group" style="display:none">
						<label for="Cpwd">Confirm Password:</label>
						<input type="password" name="cpass" class="form-control" id="Cpwd">
					</div>
					<div id="sbtn" style="display:none">
						<input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit"  />
						<a href="signinPage.php">Already have an account? Login Here.</a>
					</div>
					<div id="error" >
						<label for="error">
							<?php echo $error;?>
						</label>
					</div>
					</div>
				</div>
			</div>        
			<div class="col-md-2">
			</div>
			<div class="col-md-5">
			</div>

		</form>
	</body>

</html>