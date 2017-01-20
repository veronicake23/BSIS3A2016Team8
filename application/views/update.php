<h3> Edit Thread </h3>
	<br>
	<h3>Thread Title</h3>
			<?php echo validation_errors();?>
			<?php echo form_open('Users/edit_thread/' .$threads->thread_id. ''); ?>
			<input type = "hidden" name = "thread_id" value = "<?php echo $threads->thread_id;?>">
		
		<p><?php echo $threads->Title;?></p>
		<p>Created by:<?php echo $threads->username;?></p>
	<h3>Description </h3>
		<textarea rows = "10" cols = "50" name = "description" value = ""> <?php echo $threads->Description;?>
		</textarea>
		<p>Category: <?php echo $threads->Category?></p>
		<p>Date Created: <?php echo $threads->Date?></p>
		
	
	<br><br>
	
	<input type = "submit" value = "Edit Thread">
	<br><br>
	</form>