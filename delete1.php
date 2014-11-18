<?php
include('connection.php');
if($login_session!='ADMIN')
 header("location: index.php");
?>
<html>
<head>
	<title>
		Home
	</title>
    <script>
function validateForm()
{
var x=document.forms["myForm"]["roll"].value;

if (x==null || x=="")
  {
  alert("Form must be filled out completelty.");
  return false;
  }
}
</script>

</head>


<body>
<style>
h1 {
    color:red;
    font-family:verdana;
    font-size:200%;

}
h2 {
    color:blue;
    font-family:verdana;
    font-size:100%;

}
p  {
    color:black;
    font-family:courier;
    font-size:100%;
}
</style>

<h1 style="text-align:center">
IIT Mandi
<h2>Enter the Username:</h2>

<form name="myForm" action="delete.php" onsubmit="return validateForm()" method="post">
Username: <input type="text" name="username">
<br>


<input type="submit" value="Submit">
</form>
</body>

</html>
