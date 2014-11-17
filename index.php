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
                <div class="text-center alert error" style="display:none;"><?php echo $error?></div>
                <?php echo $_SESSION['user']?>
                <div class="formgroup">
                    <i class="icon-user"></i>
                    <input id="login" type="text" name="login" value="" placeholder="Username" required>
                </div>
                <div class="formgroup">
                    <i class="icon-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                    <a class="cursor password-retrieve small bold msT"><small>Forgot your password?</small></a>
                </div>
                <button class="btn btn-primary span4 block-center login-button auth" name="Submit" type="submit" value="request" data-analytics="LoginPassword">Log In</button>

            </div>
            
        </form>
    </div>
</div>
</html>
