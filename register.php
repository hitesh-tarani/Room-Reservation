<?php
session_start();
if($_GET['err']==1)
{
 $error="Please choose another username";
}
else if($_GET['err']==2)
{
 $error="Please choose another username";
}
else
{
if(isset($_POST['commit']))
{
$db = mysql_connect("localhost", "root", "hitesh_1995");
mysql_select_db("Mini",$db);
$user=$_POST['login'];
$password=$_POST['password'];
$chk_password=$_POST['chk_password'];
$sql = "select count(Username) as count from LOGIN where Username='$user'";
$result = mysql_query($sql);
$fet=mysql_fetch_array($result);
if($fet['count']!=0)
{
 header("Location: register.php?err=1");
}
else if($password!=$chk_password)
{
 header("Location: register.php?err=2");
}

else
{
 if ($count == 0) {
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Institute=$_POST['Institute'];
    $Type=$_POST['Type'];
    $Phone=$_POST['Phone'];
    $sql1 = "insert into LOGIN values('$user','$password')";
    $result1 = mysql_query($sql1);
    $sql = "insert into USER_DETAILS values('$user','$Fname','$Lname','$Institute','$Type', '$Phone')";
    $result = mysql_query($sql);
    if (!isset($_SESSION['is_logged_in']))
    {
        $_SESSION['is_logged_in'] = 1;
    }

    if (!isset($_SESSION['login_user']))
    {
        $_SESSION['login_user'] = $user;
    }
    /* Register user's name and ID
    if ((!isset($_SESSION['name'])) && (!isset($_SESSION['user_id'])))
    {
        $row = mysql_fetch_assoc($login_result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
    }*/

    header("Location: myprofile.php");
}
}
}
}
?>
<html>
<head>
<title>Register</title>
<script language ="javascript">
function Validate(){
if(document.getElementById('password').value!=document.getElementById('chk_password').value && document.getElementById('chk_password').value!="")
  document.getElementById('error').innerHTML="Please Check Your Password";
else
 document.getElementById('error').innerHTML="";
}
</script>
</head>
<link href="test.css" rel="stylesheet">
<div class="login-group homepage_admin light-wrap">
    <ul class="login_tab unstyled horizontal clearfix">
        <li class="login-toggle toggle"><a href="login.php" data-toggle="tab">Log In</a></li>
        <li class="signup-toggle toggle active"><a href="register.php" data-toggle="tab">Register</a></li>
    </ul>
    <div class="login " id="login" style="display: block;">
        <form id="legacy-login" class="legacy-form" action="register.php" method="POST">
                <div class="homepage_signupgroup--legacy">
                <div id ="validate" class="text-center alert error" style="color: red">
                <span id="error" class ="error"><?php echo $error;?></span>
                </div>
                <div class="formgroup">
                    <input id="Fname" type="text" name="Fname" value="" placeholder="First Name"required>
                </div>
                <div class="formgroup">
                    <input id="Lname" type="text" name="Lname" value="" placeholder="Last Name"required>
                </div>
                <div class="formgroup">
                    <input id="Institute" type="text" name="Institute" value="" placeholder="Your Institute" required>
                </div>
                <div class="formgroup">
                    <i class="icon-phone"></i>
                    <input id="Phone" type="tel" name="Phone" value="" placeholder="Phone Number"required>
                </div>
                <div class="formgroup">
                <select id="Type" name="Type" required>
                <option selected="true" disabled="true" hidden>Your Category</option>
                <option>Student</option>
                <option>Staff</option>
                <option>Faculty</option>
                </select>
                </div>
                <div class="formgroup">
                    <i class="icon-user"></i>
                    <input id="login" type="text" name="login" value="" placeholder="Username" required onkeydown="Validate()">
                </div>
                <div class="formgroup">
                    <i class="icon-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required onChange="Validate()">
                </div>
                <div class="formgroup">
                    <i class="icon-lock"></i>
                    <input id="chk_password" type="password" name="chk_password" placeholder="Confirm Password" required onChange="Validate()">
                </div>
                <button class="btn btn-primary span4 block-center login-button auth" name="commit" type="submit" data-analytics="LoginPassword">Register</button>

            </div>
            
        </form>
    </div>
</div>
</html>
