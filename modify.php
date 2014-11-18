<?php 
include('connection.php');
if(isset($_GET['Date']))
{
$entry_time=$_GET['Entry_time'];
$exit_time=$_GET['Exit_time'];
$event=$_GET['Event'];
$date=$_GET['Date'];
}
if(isset($_POST['Submit']))
{
echo $Event=$_POST['event'];
echo $Entry_time=$_POST['entry_time'];
$Exit_time=$_POST['exit_time'];
$Date=$_POST['date'];
$event=$_POST['old_event'];
$entry_time=$_POST['old_entry_time'];
$exit_time=$_POST['old_exit_time'];
$date=$_POST['old_date'];
$sql="update RESERVRED_ROOMS set EVENT='$Event', Entry_Time='$Entry_time', Exit_Time='$Exit_time' where EVENT='$event' and Entry_Time='$entry_time' and Exit_Time='$exit_time' and Date='$date'";
if($result = mysql_query($sql))
 echo"<br>Successful";
}
else
{

echo '
<!DOCTYPE html>
<html>
<head>
	<title>modify event</title>
</head>
<body>
       
	<h2>Modify event details</h2>
	<form action="modify.php" method="post">
		Event Name: <input type="text" name="event" value="'.$event.'"><br>
		<input type="text" name="old_event" value="'.$event.'"hidden>
		Entry Time: <input type="text" name="entry_time" value="'.$entry_time.'"><br>
		<input type="text" name="old_entry_time" value="'.$entry_time.'"hidden>
		Exit Time: <input type="text" name="exit_time" value="'.$exit_time.'"><br>
		<input type="text" name="old_exit_time" value="'.$exit_time.'" hidden>
		Date: <input type="text" name="date" value="'.$date.'"><br>
		<input type="text" name="old_date" value="'.$date.'" hidden>
		<input type="submit"name="Submit"value="Reserve Room">
	</form>
	
</body>
</html>';
}
?>
