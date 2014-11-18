<?php
include('connection.php');
?>
<html>
<head>
	<title>Room details</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PRATAP</title>
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
				<h1>WELCOME: <i>ADMIN</i></h1>
				
</header>
<section style="padding: 0px"class="color-1">
				<nav class="cl-effect-4">
					<a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
					<a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
					
					
				</nav>
			</section>		
	<h1>Add room</h1>
	<form action="add_room.php" method="post">
		Roomname: <input type="text" name="roomname"><br>
		<input type="submit">
	</form>
	<h1>Delete room</h1>
	<form action="delete_room.php" method="post">
		Roomname: <input type="text" name="roomname"><br>
		<input type="submit">
	</form>
	

</body>
</html>
