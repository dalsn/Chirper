

<hr class="bd-white"></hr>
<div class="container">
	<div class="jumbotron text-center bg-mauve">
		<img class="cycle span2 hidden-md hidden-lg" src ="<?php echo site_url('imgs/ChirperSM.png'); ?>"/>
	    <h1 class="fg-white hidden-xs hidden-sm chirper">Chirper</h1>
	    <p class="lead fg-white hidden-xs hidden-sm" id="vision">Sharing your music experience with the world</p>
	</div>
	<div class="row">

		<div class="col-lg-3">
			
	    </div>
	    
	    <div class="col-lg-6" >
		    <div class="reg-form">
				<?php echo form_open('login/submit'); ?>
			
				<h2>Sign In</h2>
				<?php
					if (isset($message)) {
						echo '<p class="fg-lightRed">'.$message.'</p>'; 
					} 
				?>
				<a href="<?php echo site_url('register'); ?>" class="fg-mauve join">Join</a><br/>
				<label class="fg-mauve" for="username">Poster<span class="requiredmark">*</span> </label>
				<div class="input-control text ">
					<input class="bd-mauve" type="text" name="username" size="30" placeholder="Username or Email" alt="Enter your username or email" required>
				</div><br/><br/>
				<label class="fg-mauve" for="password">Password<span class="requiredmark">*</span></label>
				<div class="input-control password">
					<input class="bd-mauve" type="password" name="password" placeholder="Password" alt="Enter your password" required>
				</div><br/><br/><br/>
					<button class="large bg-mauve fg-white" type="submit" name="submit" value="login">Login</button>
				</p>
				<p>&nbsp;</p>
			
		<?php echo form_close(); ?>
		    </div>
	    </div>

	    <div class="hidden-xs hidden-sm hidden-md col-lg-3">
			
	    </div>

	</div>
</div>

