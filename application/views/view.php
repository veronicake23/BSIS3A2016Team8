<html>	

<div align = "right">
	<?php if($this->session->userdata('username')){?> 
	<!-- displays the username if logged-in.. if not, displays a button redirecting to loginform -->

	<p>You are logged in as: <?php echo $this->session->userdata('username');?></p>
	<?php $attribute = array('id' =>'logout_form',
									 'class'=>'form-horizontal');?>
			<?php echo form_open('Users/logout', $attribute);?>
			<?php $data = array("value" => 'Logout',
								"name" => 'submit');?>
			<?php echo form_submit($data);?>
			<?php echo form_close();?>
			<?php } else {?>
			<a href= "<?php echo site_url();?>/Users?>"><button>Login </button></a>
			<?php }?>

		</div>

			<a href= "<?php echo site_url();?>/Users/start/?>">Back </a>
	<br>
	<h3>Thread Title</h3>
<!-- Thread Information AAAAhhhhhhkkkk -->
	

			<?php echo validation_errors();?>
			<?php echo form_open('Users/edit_thread/'); ?>
			<input type = "hidden" name = "thread_id" value = "<?php echo $threads->thread_id;?>">
			<?php echo form_close();?>
		<p><?php echo $threads->Title;?></p>
		<p>Created by:<?php echo $threads->username;?></p>
	<div class = "container">
	<h3>Description </h3>
	<p><?php echo $threads->Description;?></p>
		</div>
		<pre><b>Category:</b> <?php echo $threads->Category?>      <b>Date Created:</b> <?php echo $threads->Date?></pre>
	
	
		<!-- End of Thread Information O P S T A M A  -->
	
	<br><br>
	<hr> 

	<!-- LIST OF POSTS -->

	POST <br><br>
	<!--  -->
	<?php if($this->session->userdata('username')){	
			echo validation_errors(); 
			echo form_open('Users/add_post')?>
				
			
			Post something dude <br>
			<input type = "hidden"  name = "username" value = "<?php echo $this->session->userdata('username');?>">
			<input type ="hidden" name = "id" value = "<?php echo $threads->thread_id;?>">

			<textarea  rows = "5" cols = "60" name = "post_content" > </textarea><br>
			<input type = "submit" value="submit post">
		
			</form>
		
	<?php } else {?>
	<p> Login or create an account to post</p>
	<?php }?>
	<br><br><br>



	
	<?php foreach($post as $posts):
	{
	
			echo "Username: $posts->username<br>";
			echo "Content : $posts->Content<br>";
			echo "Date of post : $posts->date<br>";
			if($this->session->userdata('username'))
			{
			

			} 
			if($this->session->userdata('username') === $posts->username ){ ?>
				<p><a href= "<?php echo site_url();?>/Users/get_post/<?php echo $posts->post_id;?>">Edit</a>&nbsp&nbsp
				<a href= "<?php echo site_url();?>/Users/delete_post/<?php echo $threads->thread_id;?>/<?php echo $posts->post_id;?>">Delete</a></p><br>
			<?php } else
						{
							echo "<p></p>";
						}
						
			 foreach($reply as $rep)

			 {
			 	if($rep->post_id === $posts->post_id)
			 		{
			 	echo '<center>';
			 	
			 	echo "<p>username: $rep->username &nbsp&nbsp&nbsp&nbsp";
			 	echo "Date: $rep->date <br>";
			 	echo "$rep->comment";
			 	echo '</p></center>';
			 		}

			 }
	}
		endforeach;	 ?>

	<br><br>


</html>
