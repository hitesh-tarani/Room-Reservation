<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Home Page</title>
<link href="test.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<div>
<a href="user_details.php">Check User Details</a>
</div>
</body>
</html>
