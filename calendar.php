<?php
include('connection.php');

echo'
<!DOCCTYPE html>
<html>
<head>
<title>Calendar</title>
<link href="calendar_theme.css" rel="stylesheet">
</head>
<body><div class="php-calendar ui-widget"><div class="phpc-logged ui-widget-content">Welcome&nbsp;'.$login_session;

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



//main table
echo'
<hr>
<div style="height: 360px; overflow: auto; position: relative; zoom: 1;">
<table border="0" style="width: auto">
<tr height="50px" width="100px">
<td>
<table cellspacing="0" cellpadding="0" border="1" style="width: 30px;">
<tr height="50px"><th></th></tr>';
//timings slot
for($i=12;$i<18;$i++)
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
<table cellspacing="0" cellpadding="0" border="1">
<tr height="50px" width="100px"><th>'.$room.'</th></tr>
';

for($i=0;$i<6;$i++)                //comparision of input
{
 echo'
 <tr height="50px" width="100px">
 <td>';
 $sql1="select * from RESERVRED_ROOMS where Room_Name=$room";
 $result1 = mysql_query($sql1);
 $rowcount=mysql_num_rows($result1);
 if($rowcount>0)
 {
 $create="FALSE";$modify="FALSE";
 while($fet1=mysql_fetch_array($result1))
 {
  if($fet1['Entry_Time']<=$i+12 && $fet1['Exit_Time']>$i+12)
  {
   $print=$fet1['EVENT'];
   if($login_session==$fet1['Username'])
    $modify="TRUE";
   break;
  }
  else
  {
   $print="";
   $create="TRUE";
  }
 }
 }
 else
  $create="TRUE";
 echo $print;
 if($modify=="TRUE")
 {
  $entry_time=$fet1['Entry_Time'];
  $exit_time=$fet1['Exit_Time'];
  echo '<br><button name="modify" onClick="modify_event.php?Entry_Time=$entry_time&Entry_Time=$exit_time">Modify Event</button>';
 }
 else if($create=="TRUE")
 {
  echo '<br><button name="modify" onClick="book1.php">Create Event</button>';
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
