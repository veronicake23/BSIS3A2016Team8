
<div align = "right">
	<p>You are logged in as: <?php echo $this->session->userdata('username');?></p>
	<?php $attribute = array('id' =>'logout_form',
									 'class'=>'form-horizontal');?>
			<?php echo form_open('Users/logout', $attribute);?>
			<?php $data = array("value" => 'Logout',
								"name" => 'submit');?>
			<?php echo form_submit($data);?>
			<?php echo form_close();?></div>
			<a href= "<?php echo site_url();?>/Users/start/?>">Back </a>
	<br>
	<h3>Thread Title</h3>
			<?php echo validation_errors();?>
			<?php echo form_open('Users/edit_thread/' .$threads->thread_id. ''); ?>
			<input type = "hidden" name = "thread_id" value = "<?php echo $threads->thread_id;?>">
		
		<p><?php echo $threads->Title;?></p>
		<p>Created by:<?php echo $threads->username;?></p>
	<div class = "container">
	<h3>Description </h3>
	<p><?php echo $threads->Description;?></p>
		</div>
		<p>Category: <?php echo $threads->Category?></p>
		<p>Date Created: <?php echo $threads->Date?></p>
		
	
	<br><br>
	
	<br><br>
	</form>