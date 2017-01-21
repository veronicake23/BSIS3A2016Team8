<html>
<head>
        <title>Team 8: Login and CRUD</title>
</head>
<body>
		<center>
			<h1>Register Form</h1>
			<br><br><br>
			
			<?php echo validation_errors(); ?>
			<?php echo form_open('Users/register'); ?>
			<form  method="POST" action="Users/register">
			<h5>First Name</h5>
			<input type= "text" name="name" value="" />
			<h5>Last Name</h5>
			<input type= "text" name="surname" value="" />
			<h5>Username</h5>
			<input type= "text" name="username" value="" />
			<h5>Password</h5>
			<input type= "password" name="password" value="" />
			<h5>Confirm Password</h5>
			<input type= "password" name="cpassword" value="" />
			<input type="submit" value="submit"/>
			
			</form>
			<a href = "/login/register"> <button> register </button></a>
		</center>
		
		
		
</body>
</html>