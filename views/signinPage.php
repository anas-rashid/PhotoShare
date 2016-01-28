<!DOCTYPE html>
<html lang="en">

<head>
		<?php 
			require_once("../controllers/signin.php");
		?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.js"></script>
       
        <script>
        
            $(document).ready(function(){
            $("#signIn").fadeIn(2000);
            });
            
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
</head>
     <title>PhotoShare-Sign in Page</title>
<body class="container" style="background-image:url(css/backImg.jpg)" >
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '199354620398049',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<form action="" method="POST">
<div class="col-sm-3">
</div>
<div class="col-sm-6" id="signIn" style="display:none">
	<div class="panel panel-primary" style="color:black">
		<div class="panel-heading">
			<div class="panel-title">
				<h1>
					<small> 
						<font color="azure" >  
							Join 
						</font>
					</small> 
						PhotoShare!
					<small>
						<font color="azure" > 
							Pick your Clicks...
						</font>
					</small>
				</h1>
			</div>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="username">
					Username:
				</label>
				<input type="text" name= "username" class="form-control" id="username">
			</div>
			<div class="form-group">
				<label for="pwd">
					Password:
				</label>
				<input type="password"  name="pass" class="form-control" id="pwd">
			</div>
			<div class="form-group">
				<input type="submit" id="login" name="login" class="btn btn-primary" value="Login" >
				<a href="signupPage.php"  > Don't have an account? Sign up Here.</a>
			</div>
			<div class="form-group">
			<?php 
		

		/* INCLUSION OF LIBRARY FILEs*/
			require_once( 'lib/Facebook/FacebookSession.php');
			require_once( 'lib/Facebook/FacebookRequest.php' );
			require_once( 'lib/Facebook/FacebookResponse.php' );
			require_once( 'lib/Facebook/FacebookSDKException.php' );
			require_once( 'lib/Facebook/FacebookRequestException.php' );
			require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
			require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
			require_once( 'lib/Facebook/GraphObject.php' );
			require_once( 'lib/Facebook/GraphUser.php' );
			require_once( 'lib/Facebook/GraphSessionInfo.php' );
			require_once( 'lib/Facebook/Entities/AccessToken.php');
			require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
			require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
			require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

		/* USE NAMESPACES */
			
			use Facebook\FacebookSession;
			use Facebook\FacebookRedirectLoginHelper;
			use Facebook\FacebookRequest;
			use Facebook\FacebookResponse;
			use Facebook\FacebookSDKException;
			use Facebook\FacebookRequestException;
			use Facebook\FacebookAuthorizationException;
			use Facebook\GraphObject;
			use Facebook\GraphUser;
			use Facebook\GraphSessionInfo;
			use Facebook\FacebookHttpable;
			use Facebook\FacebookCurlHttpClient;
			use Facebook\FacebookCurl;

		/*PROCESS*/
			
			//1.Stat Session
			 //session_start();
			 //check if users wants to logout
			 if(isset($_REQUEST['logout'])){
				unset($_SESSION['fb_token']);
			 }
			//2.Use app id,secret and redirect url
			 $app_id = '199354620398049';
			 $app_secret = '6484a761305eeef7fabfbbdc963647e8';
			 $redirect_url='http://localhost/webproject/views/profilePage.php';
			 
			 //3.Initialize application, create helper object and get fb sess
			 FacebookSession::setDefaultApplication($app_id,$app_secret);
			 $helper = new FacebookRedirectLoginHelper($redirect_url);
			 $sess = $helper->getSessionFromRedirect();
				
				//check if facebook session exists
				if(isset($_SESSION['fb_token'])){
					$sess = new FacebookSession($_SESSION['fb_token']);
				}
				//logout
				$logout = 'http://localhost/webproject/controllers/logout.php';
				
			//4. if fb sess exists echo name 
				if(isset($sess)){
					//create request object,execute and capture response
				$request = new FacebookRequest($sess, 'GET', '/me');
				// from response get graph object
				$response = $request->execute();
				$graph = $response->getGraphObject(GraphUser::className());
				// use graph object methods to get user details
				$name= $graph->getName();
				$image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
				$email = $graph->getProperty('email');
				echo "hi $name <br>";
				echo "your email is $email <br><Br>";
				echo "<img src='$image' /><br><br>";
				echo "<a href='".$logout."'><button>Logout</button></a>";
			}else{
				//else echo login
				echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
			}
			?>
			</div>
			<div class="form-group">
				<label >
					<?php echo $error;?>
				</label>
			</div>
		</div>
	</div>
</div>      
</form>
</body>
</html>
