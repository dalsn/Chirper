
	<?php 
		$CI =& get_instance();
		$user_id = $CI->session->userdata('poster_id');
		$test = false;
		$test = $CI->isPosterViewer($poster['posterID'], $user_id);
		$test2 = $CI->loggedin();
		echo form_open_multipart('profile/my_profile'); 
	?>
<hr class="bd-white"></hr>
<div class="container">
	<div class="jumbotron text-center bg-mauve">
		<img class="cycle span2 hidden-xs hidden-sm" src ="<?php echo site_url('imgs/ChirperMD.png'); ?>"/>
		<img class="cycle span1 hidden-md hidden-lg" src ="<?php echo site_url('imgs/ChirperSM.png'); ?>"/>
	    <h1 class="fg-white chirper">Chirper</h1>
	</div>
	<div class="row">

	<!-- Left pane of the content page -->
		<div class="col-lg-6">
			<div class="reg-form">
				<?php 
					// $CI =& get_instance();
					echo form_open_multipart('profile/my_profile'); 
				?>
				<fieldset>
					<legend class="text-center">Profile</legend>
					<?php if ($test) { ?>
					<h5>Edit your profile</h5>
					<hr>
					<?php } ?>
					<?php
						if (isset($message)) {
					 		echo '<p>'.$message.'</p>'; 
					 	}

					 	if ($test){
					 ?>

						<img class="cycle polaroid span3 hidden-xs" src ="<?php echo site_url('imgs/posters/'.$poster['img_file']); ?>"/>
						
						<label class="fg-mauve" for="username">Username:<span class="requiredmark">*</span> </label>
						<div class="input-control text ">
							<input class="bd-mauve" type="text" name="username" size="30" value="<?php echo $poster['username']; ?>" required>
							<input type="hidden" name="username1" value="<?php echo $poster['username'] ?>">
						</div>


						<label class="fg-mauve" for="email">Email:<span class="requiredmark">*</span> </label>
						<div class="input-control email">
							<input class="bd-mauve" type="email" name="email" size="30" value="<?php echo $poster['email'] ?>" readonly>
						</div>


						<label class="fg-mauve" for="fullname">Name: </label>
						<div class="input-control text">
							<input class="bd-mauve" type="text" name="fullname" size="30" value="<?php echo $poster['posterName']; ?>">
						</div>

						<label class="fg-mauve" for="bio">Bio: </label>
						<div class="input-control textarea" name="bio">
					    	<textarea rows="4" cols="50"><?php echo $poster['bio']; ?></textarea>
					    </div>

					    <label class="fg-mauve" for="address">Location: </label>
						<div class="input-control text">
							<input class="bd-mauve" type="text" name="address" size="30" value="<?php echo $poster['address']; ?>">
					    </div>

						<label class="fg-mauve" for="website">Website: </label>
						<div class="input-control text">
							<input class="bd-mauve" type="text" name="website" size="30" value="<?php echo $poster['web']; ?>">
						</div>
						
						<label class="fg-mauve" for="avatar">Upload an avatar: </label>
					    <input type="file" name="avatar" size="50"/><br/>
					    <button class="small bd-mauve bg-white fg-mauve" name="submit" value="upload">Upload</button>

						
						<p>&nbsp;</p>

						<button class="large bd-mauve bg-white fg-mauve" type="submit" name="submit" value="save" value="save">Save</button>
						
						<p>&nbsp;</p>

					<?php } else { ?>

						<label class="fg-mauve">Username: </label><?php echo $poster['username']; ?>

						<label class="fg-mauve">Name: </label><?php echo $poster['posterName']; ?>

						<label class="fg-mauve">Bio: </label>
						<?php echo $poster['bio']; ?>

					    <label class="fg-mauve" for="address">Location: </label><?php echo $poster['address']; ?>

						<label class="fg-mauve" for="website">Website: </label><?php echo $poster['web']; ?>

					<?php } ?>
					
				</fieldset>
				<?php echo form_close(); ?>
		    </div>
	    </div>
	    
	    <!-- Center of the content page -->
	    <div class="col-lg-6 hidden-sm hidden-xs" >
		    
		    <?php if (!empty($posts)) { ?>
				<h2 class="text-center">Chirps by this Poster</h2>

		    <div class="posts-pane">
		    	<?php
						// print_r($posts[0]->getPoster());
					foreach ($posts as $post) {
						$img = $post['img_file'];
						$username = $post['username'];
						$postcomment = $post['comment'];
						$t = $post['timestamp'];
						$posttime = date("H:i A", $t). ' - '.date("d F, Y", $t);
						$songname = $post['songName'];
						$artist = $post['artist'];
						//print_r($post);
				?>
				<div class="tiles">

					<div class="tile image hidden-xs hidden-sm" id="user-img">
						<a href ='<?php echo site_url("profile/view/{$post['posterID']}"); ?>'>
							<img src = "<?php echo site_url('imgs/posters/'.$img); ?>" id="img"/>					
						</a>
					</div>

			    	<div class="bg-hover-white" id="post">
						<div>
							<a href ='<?php echo site_url("profile/view/{$post['posterID']}"); ?>'>
								<kbd class="text-capitalize username"><?php echo $username;?></kbd>
							</a><br/>
							<span id="posttime"><?php echo $posttime; ?></span>
						</div>
						<div>
							<a href ='<?php echo site_url("home/song/{$post['songID']}"); ?>'><kbd class="bg-cyan"><span class="songname">#</span><span class="text-capitalize songname"><?php echo $songname; ?></span></kbd></a>
							<a href ='<?php echo site_url("home/artist/{$post['artist']}"); ?>'><kbd class="bg-lightRed"><span class="artist">@</span><span class="text-capitalize artist"><?php echo $artist; ?></span></kbd></a>
						</div>
						<div>
							<h5><?php echo $postcomment; ?></h5>
						</div>
						<div>
							<ul class="list-inline">
								<li><span><a href='<?php echo site_url("comment/view/{$post['postID']}"); ?>'>Comments
												(<?php echo $CI->model_post->countComments($post['postID']);?>)</a></span></li>
							<?php if ($test){ ?>
								<li><span><a href='<?php echo site_url("posts/delete/{$post['postID']}"); ?>'>Delete post</a></span></li>
							<?php } ?>
							</ul>
						</div>
					</div>

				</div>
				<?php 
					}
				?>
		    </div>
		    <?php 
				}
			?>
	    </div>



	</div>
</div>