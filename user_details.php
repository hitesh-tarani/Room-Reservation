<?php
include('connection.php');
if($login_session!='ADMIN')
 header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User details</title>
</head>
<body>
	<h1>Check user</h1>                <!--check user information-->
	<form action="user_info.php" method="post">
		Username: <input type="text" name="username"><br>
		<input type="submit">
	</form>
		
	
	<h1>Delete user</h1>
	<form action="delete.php" method="post">
		Username: <input type="text" name="username"><br>
		<input type="submit">
	</form>
	

</body>
</html>
