<?php
if(isset($_POST['create']))
{
 $date_post=$_POST['Date'];
 header("location: create.php?Date=$date_post");
}
else if(isset($_POST['modify']))
{
 $date_post=$_POST['Date'];
 $event_post=$_POST['Event'];
 $entry_time_post=$_POST['Entry_time'];
 $exit_time_post=$_POST['Exit_time'];
 header("location: modify.php?Date=$date_post&Event=$event_post&Entry_time=$entry_time_post&Exit_time=$exit_time_post");
}
include('connection.php');
$date=date("d-m-Y");
echo'
<!DOCCTYPE html>
<html>
<head>
<title>Calendar</title>
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
				<h1>WELCOME: <i>'.$login_session.'</i></h1>
				
</header>
<section style="padding: 0px"class="color-1">
				<nav class="cl-effect-4">
					<a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
					<a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
					
					
				</nav>
			</section><br>';
if(isset($_POST['Date'])||isset($_POST['Month'])||isset($_POST['Year']))
{
 $select_date=$_POST['Date'];
 $select_month=$_POST['Month'];
 $select_year=$_POST['Year'];
}
else
{
 $select_date=$date[0].$date[1];
 $select_month=$date[3].$date[4];
 $select_year=$date[6].$date[7].$date[8].$date[9];
}
echo'
<div>
<form action="calendar.php" method="post">
<select id="date" name="Date" required>
<option selected="true" disabled="true" hidden>'.$select_date.'</option>';
for($i=1;$i<31;$i++)
{
 echo'
 <option value='.$i.'>'.$i.'</option>';
}
echo'
</select>
<select id="month" name="Month" required>
<option selected="true" disabled="true" hidden>'.$select_month.'</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>

</select>


<input type="text" name="Year" placeholder="Year" value="'.$select_year.'">
<input type="submit" value="Submit">
</form></div>';
$db = mysql_connect("localhost", "root", "hitesh_1995");    //connecting database
mysql_select_db("Mini",$db);


//identify room name
$sql = "select Name from ROOMS";
$result = mysql_query($sql);
$fet=mysql_fetch_array($result);




//identify reserved data
/*
$sql1="select * from RESERVRED_ROOMS";
$result1 = mysql_query($sql1);*/

/*echo'
<div style="height: 360px; overflow: auto; position: relative; zoom: 1;"><div style="zoom: 1; position: relative;">
<table cellspacing="0" cellpadding="0" border="1" style="border: 0px none; width: 100%; position: absolute;">
<tbody><tr><td style="padding: 0px; border: 0px none;">
<table cellspacing="0" cellpadding="0" border="0" style="border: 0px none; width: 45px;">
<tbody><tr style="height: 40px;"><td style="cursor: default; padding: 0px; border: 0px none;">
<div class="calendar_default_rowheader" style="position: relative; width: 45px; height: 40px; overflow: hidden;">
<div class="calendar_default_rowheader_inner" style="height: 39px;"><div>12<span class="calendar_default_rowheader_minutes">AM</span></div></div></div></td></tr>
<tr style="height: 40px;">*/


//explode(",",$date);
$date1=$select_date.'-'.$select_month.'-'.$select_year;
echo 'Date: '.$date1;


//main table
echo'
<div style="height: auto; overflow: auto; position: relative; zoom: 1;">
<table border="0" style="width: auto">
<tr width="100px">
<td>
<table cellspacing="0" cellpadding="0" border="1" style="width: 30px;height: 600">
<tr height="50px"><th></th></tr>';
//timings slot

for($i=9;$i<18;$i++)
{
echo'
	<tr height="50px" width="100px">
		<th>'.$i.'</th>
	</tr>';
}
echo'
</table>
</td>';


while($room=$fet['Name'])
{
echo'
<td>
<table cellspacing="0" cellpadding="0" border="1" style="height: 600">
<tr height="50px" width="100px"><th>'.$room.'</th></tr>
';

for($i=0;$i<9;$i++)                //comparision of input
{
 echo'
 <tr height="50px" width="100px">
 <td>';
 $sql1="select * from RESERVRED_ROOMS where Room_Name='$room' and Date='$date1'";
 $result1 = mysql_query($sql1);
 $rowcount=mysql_num_rows($result1);
 if($rowcount>0)
 {
 $create="FALSE";$modify="FALSE";
 while($fet1=mysql_fetch_array($result1))
 {
  if($fet1['Entry_Time']<=$i+9 && $fet1['Exit_Time']>$i+9)
  {
   $print=$fet1['EVENT'];
   echo $print;
   $create="FALSE";
   if($login_session==ADMIN || $login_session==$fet1['Username'])
   {
     $entry_time=$fet1['Entry_Time'];
     $exit_time=$fet1['Exit_Time'];
     $event=$fet1['EVENT'];
     $date=$date1;
     echo '<br><form action="calendar.php" method="POST">
     <input type="text" name="Event" value="'.$event.'" hidden>
     <input type="text" name="Entry_time" value="'.$entry_time.'" hidden>
     <input type="text" name="Exit_time" value="'.$exit_time.'" hidden>
     <input type="text" name="Date" value="'.$date.'" hidden>
     <input type="submit" name="modify" value="Modify Event">
     </form>';
   }
   break;
  }
  else
  {
   echo $print="";
   $create="TRUE";
  }
 }
 }
 else
 {
  echo $print="";
  $create="TRUE";
 }
 if($create=="TRUE")
 {
   $date=$date1;
   echo '<br>
   <form action="calendar.php" method="POST">
   <input type="text" name="Date" value="'.$date.'" hidden>
   <input type="submit" name="create" value="Create Event"></form>';
  }
 echo'
 </td>
 </tr>';
}
echo'
</table>
</td>';
$fet=mysql_fetch_array($result);
}

echo'
</tr>
</table>
</div>';
/*<td style="padding: 0px; border: 0px none; vertical-align: top; height: 20px; overflow: hidden; background-color: rgb(255, 255, 255);"><div class="calendar_default_cell" style="height: 20px; position: relative;"><div unselectable="on" class="calendar_default_cell_inner"></div></div></td>';
echo'';*/
?>
