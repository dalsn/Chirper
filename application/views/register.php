
<hr class="bd-white"></hr>
<div class="container">
	<div class="jumbotron text-center bg-mauve">
	    <img class="cycle span2 hidden-xs hidden-sm" src ="<?php echo site_url('imgs/ChirperMD.png'); ?>"/>
		<img class="cycle span1 hidden-md hidden-lg" src ="<?php echo site_url('imgs/ChirperSM.png'); ?>"/>
	    <h1 class="fg-white hidden-xs hidden-sm chirper">Chirper</h1>
	    <p class="lead fg-white hidden-xs hidden-sm" id="vision">Join the world of music</p>
	</div>
	<div class="row">

	<!-- Left pane of the content page -->
		<div class="col-lg-2">
			
	    </div>
	    
	    <!-- Center of the content page -->
	    <div class="col-lg-8" >
		    <div class="reg-form">
				<?php echo form_open('register/doAdd'); ?>
					<fieldset>
						<legend class="text-center">Sign Up</legend>
						<h5>All fields are required</h5>
						<?php
							$username = '';
							$email = ''; 	
							if (isset($error)) {
								echo '<p class="error">'.$error['msg'].'</p>'; 
								$username = $error['username'];
								$email = $error['email'];
							}

							if (isset($message)) {
								echo '<p class="error">'.$message.'</p>'; 
							}
						?>
						<hr>
						<label class="fg-mauve" for="username">Username:<span class="requiredmark">*</span> </label>
						<div class="input-control text ">
							<input class="bd-mauve" type="text" name="username" size="30" value="<?php echo $username; ?>" required>
						</div>

						<label class="fg-mauve" for="email">Email:<span class="requiredmark">*</span> </label>
						<div class="input-control email">
							<input class="bd-mauve" type="email" name="email" size="30" value="<?php echo $email; ?>" required>
						</div>

						<label class="fg-mauve" for="password">Password:</label>
						<div class="input-control password">
							<input class="bd-mauve" type="password" name="password" size="30" placeholder="input password">
						</div>

						<label class="fg-mauve" for="repassword">Retype Password:</label>
						<div class="input-control password">
							<input class="bd-mauve" type="password" name="repassword" size="30" placeholder="retype password">
						</div>

						<p>&nbsp;</p>

						<button class="large bg-mauve fg-white" type="submit" name="submit">Submit</button>
						<button class="large bg-mauve fg-white" type="reset" name="reset"> Clear </button>

						<p>&nbsp;</p>
					</fieldset>
				<?php echo form_close(); ?>
		    </div>
	    </div>

	    <!-- Right pane of the content page -->
	    <div class="hidden-xs hidden-sm hidden-md col-lg-2">

	    </div>

	</div>
</div>


					