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

$sql="DELETE FROM USER_DETAILS where Username=$user";


if ($conn->query($sql) === TRUE) {
    echo "user deleted";
    
    }
} else {
    echo "error";
}
$conn->close();

?>
