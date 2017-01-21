<?php if($this->session->flashdata('error')):?>
<?php echo $this->session->flashdata('error');?>
<?php endif;?>
<?php if($this->session->flashdata('correct')):?>
<?php echo $this->session->flashdata('correct');?>
<?php endif;?>
<?php if($this->session->flashdata('registered')):?>
<?php echo $this->session->flashdata('registered');?>
<?php endif;?>

<html>
<head>
        <title>Team 8: Login and CRUD</title>
</head>
<body>
		<center>
			<h1>Login Form</h1>
			<br><br><br>
			<?php if($this->session->userdata('logged_in')):?>
			<?php else :?>
			<?php echo validation_errors();?>
			<?php echo form_open('Users/login'); ?>
			<form  method="POST" action="Users/login">
			<h5>Username</h5>
			<input type= "text" name="username" value="" />
			<h5>Password</h5>
			<input type= "password" name="password" value="" />
			<input type="submit" value="submit"/>
			
			</form>
			<a href= <?php echo site_url('Users/reg');?>><button> register </button> </a>
		</center>
			<?php endif;?>
			<center>
			<a href= <?php echo site_url('Users/start');?>> Enter as guest  </a></center>
			
		
		
		
</body>
</html>