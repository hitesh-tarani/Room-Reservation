<?php
include('connection.php');
if(isset($_GET['Date']))
{
 $date=$_GET['Date'];
}
if($_GET['err']==1)
{
 $error="Room is not available";
}
else if(isset($_POST['Submit']))
{
$db = mysql_connect("localhost", "root", "hitesh_1995");
mysql_select_db("Mini",$db);
$room=$_POST['ROOM_NO'];
$sql = "select count(Name) as count from ROOMS where Name='$room'";
$result = mysql_query($sql);
$fet=mysql_fetch_array($result);
if($fet['count']!=1)
{
 header("Location: create.php?err=1");
}
else
{
 if ($count == 0)
 {
    $Entry_time=$_POST['START_TIME'];
    $Exit_time=$_POST['END_TIME'];
    $Event=$_POST['EVENT'];
    $date=$_POST['EVENT_DATE'];
    $sql1="select * from RESERVRED_ROOMS where Room_Name='$room' and Date='$date' and Entry_time<='$Entry_time' and Exit_time>='$Entry_time'";
    $result1 = mysql_query($sql1);
    $rowcount1=mysql_num_rows($result1);
    if($rowcount1>0)
    {
     echo 'Time overlapping';
    }
    else
    {
    $sql = "insert into RESERVRED_ROOMS values('$room','$date','$Entry_time','$Exit_time','$login_session','$Event')";
    $result = mysql_query($sql);
    header("Location: myprofile.php");
    }
}
}
}
echo'

<html>
<head>
<title>Home</title>
</head>


<body>
<style>
body{
background-color:#D0D3FC
}
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:1px;
}
h1 {
    
    font-family:verdana;
    font-size:250%;

}
h2 {
    text-align:center;
    font-family:verdana;
    font-size:150%;

}
p  {
    font-family:verdana;
    font-size:200%;
}
</style>

<div id="header">
<h1>IIT MANDI</h1><H2>ROOM REQUESTING FORM</H2>
</div>
<br><br>


<div id ="validate" class="text-center alert error" style="color: red">
<span id="error" class ="error"><?php echo $error;?></span>
</div>
<form name="myForm" action="create.php" method="post">
   ROOM_NO: <input type="text" name="ROOM_NO" required>
   <br><br>
   EVENT_DATE: <input type="text" name="EVENT_DATE" value="'.$date.'">
   <br><br>
   EVENT DESCRIPTION: <input type="text" name="EVENT" required>
   <br><br>   
   START_TIME: <input type="text" name="START_TIME" required>
   <br><br>
   END_TIME : <input type="text" name="END_TIME" required>
   <br><br>

<br>


<input type="submit" name="Submit"value="Reserve Room">
</form>
</body>

</html>';
?>
