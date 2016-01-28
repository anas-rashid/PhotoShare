<?php
	$navbar ="<nav class='navbar navbar-inverse' id='mynav'>
        <div class='container-fluid' id='navbar'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='profilePage.php'>
                    PhotoShare
                </a>
            </div>
            <div>
                <ul class='nav navbar-nav'>
                    <li class='active'>
						<a href='profilePage.php'>Profile</a>
					</li>
					<li class='active'>
						<a href='allalbums.php'>All Albums</a>
					</li>
					<li class='active'>
						<a href='allphotos.php'>All Photos</a>
					</li>
					 <li class='active'>
						<a href='shared.php'>Public</a>
					</li>
					<li class='active'>
						<a href='allgroups.php'>All Groups</a>
					</li>
					<li class='active'>
						<a href='upload.php'>Upload</a>
					</li>
					<li class='active'>
						<a href='album.php'>Create Albums</a>
					</li>
					<li class='active'>
						<a href='group.php'>Create Groups</a>
					</li>
					<li class='active'>
						<a href='member.php'>Add New Members</a>
					</li>
					<li class='active'>
						<a href='search.php'>Search</a>
					</li>
					
                </ul>
                <ul class='nav navbar-nav navbar-right'>
				<form action='../controllers/logout.php' method='post' >
                   <li> <input type='submit' class='btn btn-primary' name = 'signout' value='Sign Out'/ ></li>
				</form>
                </ul>
            </div>
        </div>
    </nav>";
	$includes="
	<link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/myCSS.css'>
    <link rel='stylesheet' href='css/jquery-ui.css'>
	<link rel='stylesheet' href='css/owl.carousel.css'>
    <link rel='stylesheet' href='css/owl.theme.css'>
    <link rel='stylesheet' href='css/owl.transitions.css'>
    <script src='js/jquery.min.js'></script>
    <script src='js/jquery-ui.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/angular.min.js'></script>
    <script src='js/myScript.js'></script>
	<script src='js/owl.carousel.js'></script>
    <script src='js/owl.carousel.min.js'></script>
	<link rel='stylesheet' type='text/css' href='css/style.css'>
	<script type='text/javascript' src='js/jquery.js'></script>
	<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"css/full-slider.css\" rel=\"stylesheet\">
	";
?>