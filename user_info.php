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

