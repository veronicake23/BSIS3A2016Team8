
<div align = "right"> 
	<p>You are logged in as: <?php echo $this->session->userdata('username');?></p>
	<?php $attribute = array('id' =>'logout_form',
									 'class'=>'form-horizontal');?>
			<?php echo form_open('Users/logout', $attribute);?>
			<?php $data = array("value" => 'Logout',
								"name" => 'submit');?>
			<?php echo form_submit($data);?>
			<?php echo form_close();?></div>

<h3> Add Thread </h3>
	<br>
	<h3>Thread Title</h3>
			<?php echo validation_errors();?>
			<?php echo form_open('Users/addthread/'); ?>
			<input type = "hidden" name = "username" value = "<?php echo $this->session->userdata('username');?>"">
			<input type = "text" name = "title" value = "">
		<h3>Description </h3>
		<textarea rows = "10" cols = "50" name = "description" value = ""> 
		</textarea>
		
		
	
	<br><br>
	
	<input type = "submit" value = "Add Thread">
	<br><br>
	</form>