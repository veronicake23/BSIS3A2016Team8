

<html>
<head>
        <title>Team 8</title>
</head>
<body>
	<div align = "right"> 
	<p>You are logged in as: <?php echo $this->session->userdata('username');?></p>
	<?php $attribute = array('id' =>'logout_form',
									 'class'=>'form-horizontal');?>
			<?php echo form_open('Users/logout', $attribute);?>
			<?php $data = array("value" => 'Logout',
								"name" => 'submit');?>
			<?php echo form_submit($data);?>
			<?php echo form_close();?></div>
	
	<a href= "<?php echo site_url();?>/Users/add/">Add Thread </a>
	<h3> List of Threads </h3>
		<?php foreach($thread as $threads):
			echo form_open('Users/login'); 
			echo "<input type='hidden' name='thread_id' value='$threads->thread_id'>";
			echo "</form>";
			echo "Username: $threads->username<br>";
			echo "Title: $threads->Title<br>";
			echo "Description: $threads->Description<br>";
			echo "Category: $threads->Category<br>";
			echo "Date: $threads->Date<br>"; ?>
			<?php if($this->session->userdata('username') === $threads->username):?>
			<a href= "<?php echo site_url();?>/Users/get_thread/<?php echo $threads->thread_id; ?>"> Edit Thread </a>&nbsp&nbsp&nbsp
			<?php endif;?>
			<a href= "<?php echo site_url();?>/Users/view_thread/<?php echo $threads->thread_id; ?>">View Thread </a>
		<?php	echo "<br><br>";
			endforeach;
		?>
			
			
		
		
		
</body>
</html>