<?php
$connection = mysql_connect("localhost", "root", "hitesh_1995");
$db = mysql_select_db("Mini", $connection);
session_start();
$user=$_SESSION['login_user'];
$sql="select Username from LOGIN where Username='$user'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$login_session=$row['Username'];
if(!isset($login_session))
{
 mysql_close($connection);
 header("Location: index.php");
}
?>
