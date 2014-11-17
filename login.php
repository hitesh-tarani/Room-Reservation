<?php
session_start();
if(isset($_POST['Submit']))
{
$db = mysql_connect("localhost", "root", "hitesh_1995");
mysql_select_db("Mini",$db);
$user=$_POST['login'];
$password=$_POST['password'];
$sql = "select count(Username) as count from LOGIN where Username='$user' and Password = '$password'";
$result = mysql_query($sql);
$fet=mysql_fetch_array($result);
if($fet['count']==1)
{
 if (!isset($_SESSION['is_logged_in']))
 {
  $_SESSION['is_logged_in'] = 1;
 }
 $_SESSION['login_user']=$user;
 if($user=='ADMIN')
  header("location: admin.php");
 else
  header("location: myprofile.php");
}
else
{
 $error="Username or Password is invalid";
}
}
?>
<html>
<head>
<title>Login</title>
</head>
<link href="test.css" rel="stylesheet">
<div class="login-group homepage_admin light-wrap">
    <ul class="login_tab unstyled horizontal clearfix">
        <li class="login-toggle toggle active"><a href="login.php" data-toggle="tab">Log In</a></li>
        <li class="signup-toggle toggle"><a href="register.php" data-toggle="tab">Register</a></li>
    </ul>
    <div class="login " id="login" style="display: block;">
        <form id="legacy-login" class="legacy-form" method="POST"><div class="homepage_signupgroup--legacy">
                <div class="text-center alert error"style="color: red" id="error"><?php echo $error;?></div>
                <div class="formgroup">
                    <i class="icon-user"></i>
                    <input id="login" type="text" name="login" value="" placeholder="Username" required onkeydown="document.getElementById('error').innerHTML='';">
                </div>
                <div class="formgroup">
                    <i class="icon-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required onkeydown="document.getElementById('error').innerHTML='';">
                </div>
                    <!--a class="cursor password-retrieve small bold msT"><small>Forgot your password?</small></a>
                </div-->
                <button class="btn btn-primary span4 block-center login-button auth" name="Submit" type="submit" value="request" data-analytics="LoginPassword">Log In</button>

            
        </form>
    </div>
</div>
</html>
