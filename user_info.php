<?php
include('connection.php');
if($login_session!='ADMIN')
 header("location: index.php");
echo'<!DOCTYPE html>';
$user=$_POST['username'];

// Create connection
$conn = new mysqli("localhost", "root", "hitesh_1995", "Mini");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT Username,Fname,Lname,Institute,Type,Phone_No FROM USER_DETAILS where Username='$user'";
echo'
<!DOCTYPE html>
<html>
<head>
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
<div class="container">
<header>
				<h1>WELCOME: <i>'.$login_session.'</i></h1>
				
</header>
<section style="padding: 0px"class="color-1">
				<nav class="cl-effect-4">
					<a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
					<a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
					
					
				</nav>
			</section>';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Username: ". $row["Username"]. "<br>Fname: ". $row["Fname"]. "<br> Lname:" . $row["Lname"]. "<br> Institute:" . $row["Institute"]. "<br> Type:" . $row["Type"]. "<br> Phone:" . $row["Phone_No"];
        echo "<br><br>";
    }
} else {
    echo "Invalid User";
}
$conn->close();

?>
<!--<html>
<body>

<form action="delete.php" method="post">
		<input type="submit" value="Delete user">
</body>
</html>-->

