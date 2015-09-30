<hr class="bd-white"></hr>
<div class="container">

	<div class="row">

	<!-- Left pane of the content page -->
		<div class="col-lg-2">
			
	    </div>
	    
	    <!-- Center of the content page -->
	    <div class="col-lg-8" >
		    <div class="reg-form">
				<?php 
					// $CI =& get_instance();
					echo form_open_multipart('profile/my_profile'); 
				?>
				<fieldset>
					<legend class="text-center">Profile</legend>
					<h5>Create your profile</h5>
					<?php
						if (!isset($message)) { ?>
					<p> Welcome to Chirper - You may want to set up your profile </p>
					<?php } else { echo '<p>'.$message.'</p>'; } ?>
					<hr>
					<!-- <div class="text-center"><img src = "<?php echo site_url('imgs/posters/'.$poster['img_file']); ?>"/></div> -->

					<label class="fg-mauve" for="username">Username:<span class="requiredmark">*</span> </label>
					<div class="input-control text ">
						<input class="bd-mauve" type="text" name="username" size="30" value="<?php echo $poster['username']; ?>" required>
						<input type="hidden" name="username1" value="<?php echo $poster['username'] ?>">
					</div>

					<label class="fg-mauve" for="email">Email:<span class="requiredmark">*</span> </label>
					<div class="input-control email">
						<input class="bd-mauve" type="email" name="email" size="30" value="<?php echo $poster['email'] ?>" required>
					</div>

					<label class="fg-mauve" for="fullname">Name: </label>
					<div class="input-control text">
						<input class="bd-mauve" type="text" name="fullname" size="30">
					</div>

					<label class="fg-mauve" for="bio">Bio: </label>
					<div class="input-control textarea" name="bio">
				    	<textarea rows="4" cols="50"></textarea>
				    </div>

				    <label class="fg-mauve" for="address">Location: </label>
					<div class="input-control text">
						<input class="bd-mauve" type="text" name="address" size="30">
				    </div>

					<label class="fg-mauve" for="website">Website: </label>
					<div class="input-control text">
						<input class="bd-mauve" type="text" name="website" size="30">
					</div>
					
					<label class="fg-mauve" for="avatar">Upload an avatar: </label>
					<input type="file" name="avatar" size="50"/><br/>
					<button class="small bd-mauve bg-white fg-mauve" name="submit" value="upload">Upload</button>
					
					<p>&nbsp;</p>

					<button class="large bd-mauve bg-white fg-mauve" type="submit" name="submit" value="save" value="save">Save</button>

					<p>&nbsp;</p>

					<a href="<?php echo site_url('home'); ?>">Skip >>></a>
					
				</fieldset>
				<?php echo form_close(); ?>
		    </div>
	    </div>

	    <!-- Right pane of the content page -->
	    <div class="hidden-xs hidden-sm hidden-md col-lg-2">

	    </div>

	</div>
</div>