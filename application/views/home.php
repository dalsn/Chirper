	<?php 
	//echo '<pre>'.print_r($posts).'</pre>';
		$CI =& get_instance();
		$id = $CI->session->userdata('poster_id');
		$test = $CI->loggedin();
		$poster = $CI->model_poster->getPoster($id);
	?>
<hr class="bd-white"></hr>
<div class="container">
	<div class="jumbotron text-center bg-mauve">
		<img class="cycle span2 hidden-xs hidden-sm" alt="" src ="<?php echo site_url('imgs/ChirperMD.png'); ?>"/>
		<img class="cycle span1 hidden-md hidden-lg" alt="" src ="<?php echo site_url('imgs/ChirperSM.png'); ?>"/>
	    <h1 class="fg-white hidden-xs hidden-sm chirper">Chirper</h1>
	    <p class="lead fg-white hidden-xs hidden-sm" id="vision">Sharing your music experience with the world</p>
	</div>
	<div class="row">

		<div class="col-lg-3">
			<div style="width:100%;">
			<?php
			if (isset($message) && !empty($message)) {
		 		echo '<p>'.$message.'</p>'; 
		 	} ?>
			 	<form method="get" action="#">
					<div class="input-control text">
						<!-- <label for="search" hidden>Search</label> -->
						<input name="search" id="search" type="text" maxlength="30"/>
						<button class="btn-search">.</button>
				    </div>
				</form>
	    	</div>
		    <section>
		    	<h4>Most Popular songs</h4>
				<p>###########</p>
			</section>
			<section>
				<h4>Most popular artists</h4>
				<p>$$$$$$$$$$$$</p>
		    </section>
	    </div>
	    
	    <div class="col-lg-7" >
	    	<div class="posts-pane">
	    	<?php 
				if ($test) { 
					$img = $poster['img_file'];
			?>
			    <div class="add-post">
					<form method="post" name="newpost" action="<?php echo site_url('posts/do_add'); ?>">
						<div class="input-control text size4">
					    	<input class="bd-mauve" type="text" name="song" placeholder="Song..." required/>
					    </div>
					    <div class="input-control text size4">
					    	<input class="bd-mauve" type="text" name="artist" placeholder="Artist..." required/>
					    </div>
					    <!-- <span class="countdown">140</span> -->
						<div class="input-control textarea">
					    	<textarea class="bd-mauve" name="post" maxlength="140" cols="2" required></textarea>
					    </div>
					    <button class="large bg-white fg-mauve bd-mauve" type="submit" name="submit" value="addpost">Post</button>
					</form>			
				</div>
		    <?php	
				} 
			?>

		   <!--  <div style="width:100%; margin:0 auto; border: 1px solid purple; padding: 10px; border-radius: 6px;"> -->

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
					// print_r($post);
			?>
			<div class="tiles">

				<div class="tile image hidden-xs hidden-sm" id="user-img">
					<a href ='<?php echo site_url("profile/view/{$post['posterID']}"); ?>'>
						<img alt="Poster Image" src = "<?php echo site_url('imgs/posters/'.$img); ?>" id="img"/>					
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
						<p><?php echo $postcomment; ?></p>
					</div>
					<div>
						<ul class="list-inline">
							<li><span><a href='<?php echo site_url("comment/view/{$post['postID']}"); ?>'>Comments
													(<?php echo $CI->model_post->countComments($post['postID']);?>)</a></span></li>
						</ul>
					</div>
				</div>

			</div>
			<?php 
				}
			?>
		    </div>
	    </div>

	    <div class="hidden-xs hidden-sm hidden-md col-lg-2">
			<div style="width:100%;">
				<section>
					<h4>People like you</h4>
					<p>###########</p>
				</section>
				<section>
					<h4>Recently joined</h4>
					<p>$$$$$$$$$$$$</p>
				</section>
	    	</div>
	    </div>

	</div>
</div>
			