<?php
include('connection.php');
if($login_session=='ADMIN')
{
 header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Your Home Page</title>
<link href="test.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Creative Link Effects: Subtle and modern effects for links or menu items" />
		<meta name="keywords" content="link effect, css transition, style, inspiration, css3, menu item, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
</head>
<body>
		<div class="container">
			<header>
				<h1>WELCOME: <i><?php echo $login_session; ?></i></h1>
				
		</header>
	<section style="padding: 0px"class="color-1">
				<nav class="cl-effect-4">
					<a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
					<a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
					
					
				</nav>
			</section>
			<!-- Top Navigation -->
			<header>
				<h1>IIT MANDI ROOM REQUEST PORTAL <span> MANDI </span></h1>
				
			</header>
			<section class="color-1">
				<nav class="cl-effect-4">
					<a href="create.php" data-hover="CLICK HERE"><span>BOOKING REQUEST FORM</span></a>
					<a href="calendar.php" data-hover="CLICK HERE"><span>ROOM AVAILIBILITY</span></a>
					<a href="ROOMS.HTML" data-hover="CLICK HERE"><span>ROOM LAYOUTS</span></a>
					
				</nav>
			</section>
			
		</div><!-- /container -->
	</body>
</html>
</body>
</html>

