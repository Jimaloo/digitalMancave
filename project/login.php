<?php
	include_once ('server.php');
?>

<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="server.php" method="post" accept-charset='UTF-8'>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
			
            <input type="submit" name="login_user" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="registrationn.php">Don't have an account?</a>
        </form>
        
    </div>

</body>
</head>
</html>