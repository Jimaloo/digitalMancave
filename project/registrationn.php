<?php
	include ('server.php');
?>


<!DOCTYPE>
<html>
<head>
<br>
<title>Registration form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="avatar.png" class="avatar">
        <h1>Register</h1>
        <form action="server.php" method ="post" accept-charset='UTF-8'>
		<?php include ('error.php');?>
		<div>
            <p>Name</p>
            <input type="text" name="nname" value="<?php echo $nname;?>" placeholder="Enter Name" >
            <p>Username</p>
            <input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter Username">
			<p>Email</p>
			 <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Email">
			<p>Phone number</p>
			 <input type="number" name="phonenumber" value="<?php echo $phonenumber;?>" placeholder="Enter phone number">
			<p>Password</p>
			<input type="password" name="password_1" placeholder="Enter Password">
			<p>Confirm Password</p>
			<input type="password" name="password_2" placeholder="Enter Password">
			
			<input type="submit" name="reg_user" value="Register">
		</div>
            <a href="login.php">Already have an account?</a>
        </form>
     
	
    </div> 

</body>
</head>
</html>