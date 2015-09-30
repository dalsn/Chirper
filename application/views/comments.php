<?php 
		// echo count($commenters); echo count($comments);
		$CI =& get_instance();
		$test = $CI->loggedin();
		$user_id = $CI->session->userdata('poster_id');
		$test2 = $CI->isPosterViewer($post['poster_id'], $user_id);
		$img = $post['img_file'];
		$username = $post['username'];
		$postcomment = $post['comment'];
		$t = $post['timestamp'];
		$posttime = date("H:i A", $t). ' - '.date("d F, Y", $t);
		$songname = $post['songName'];
		$artist = $post['artist'];
?>

<hr class="bd-white"></hr>
<div class="container">
	<div class="jumbotron text-center bg-mauve">
		<img class="cycle span1" src ="<?php echo site_url('imgs/ChirperSM.png'); ?>"/>
	    <h1 class="fg-white hidden-xs hidden-sm chirper">Chirper</h1>
	</div>
	<div class="row">

		<div class="col-lg-2">
			
	    </div>
	    
	    <div class="col-lg-8" >

	    	<?php
				if (isset($message)) {
			 		echo '<p>'.$message.'</p>'; 
			 } ?>
	    	<!--Chirp-->
	    	<h2 class="text-center">Chirp</h2>
	    	<div class="user-profile-pane">

		   <!--  <div style="width:100%; margin:0 auto; border: 1px solid purple; padding: 10px; border-radius: 6px;"> -->
				<div class="tiles">

					<div class="tile image hidden-xs hidden-sm" id="user-img">
						<a href ='<?php echo site_url("profile/view/{$post['posterID']}"); ?>'>
							<img id="img" src = "<?php echo site_url('imgs/posters/'.$img); ?>"/>					
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
							<a href ='<?php echo site_url("home/song/{$post['songID']}"); ?>'><kbd class="bg-cyan">#<span class="text-capitalize songname"><?php echo $songname; ?></span></kbd></a>
							<a href ='<?php echo site_url("home/artist/{$post['artist']}"); ?>'><kbd class="bg-lightRed">@<span class="text-capitalize artist"><?php echo $artist; ?></span></kbd></a>
						</div>
						<div>
							<h5><?php echo $postcomment; ?></h5>
						</div>
						<div style="width:100%; height: 1.3em;"></div>
					</div>
					<div class="add-comment">
					<form method="post" name="newcomment" action="<?php echo site_url("comment/do_add/{$post['postID']}/{$post['songID']}"); ?>">
					    <!-- <span class="countdown">140</span> -->
					    <?php if($test) { ?>
						<div class="input-control text">
					    	<input class="bd-mauve" type="text" name="comment" maxlength="140" placeholder="Comment..." required/>
					    </div>
					    <button class="large bg-white fg-mauve bd-mauve" type="submit" name="submit" value="addcomment">Add</button>
					    <?php } else { echo '<div class="" style="width:100%; height: 0.5em;"></div>';} ?>
					</form>			
					</div>

				</div>

		    </div>

		    <div class="" style="width:100%; height: 1em;"></div>

		    <!-- Comments-->
		    <div class="comment-pane">
			<?php 
				$i = 0;
				if (!empty($comments)) {
			echo '<h2 class="text-center">All Comments</h2>';
					foreach ($comments as $comment) {
						$img = $commenters[$i]['img_file'];
						$username = $commenters[$i]['username'];
						$theComment = $comment['comment'];
						$t = $comment['timestamp'];
						$posttime = date("H:i A", $t). ' - '.date("d F, Y", $t);
						$songname = $comment['songName'];
						$artist = $comment['artist'];
						$test3 = $CI->canDelete($user_id, $commenters[$i]['posterID']);
			?>
		    
		   <!--  <div style="width:100%; margin:0 auto; border: 1px solid purple; padding: 10px; border-radius: 6px;"> -->
				<div class="tiles">

					<div class="tile half image hidden-xs" id="user-img">
						<a href ='<?php echo site_url("profile/view/{$commenters[$i]['posterID']}"); ?>'>
							<img src = "<?php echo site_url('imgs/posters/'.$img); ?>" />
						</a>
					</div>

			    	<div class="bg-hover-white" id="post">
						<div>
							<a href ='<?php echo site_url("profile/view/{$commenters[$i]['posterID']}"); ?>'>
								<kbd class="text-capitalize username"><?php echo $username;?></kbd>
							</a><br/>
							<span id="posttime"><?php echo $posttime; ?></span>
						</div>
						<div>
							
						</div>
						<div>
							<h5><?php echo $theComment; ?></h5>
						</div>
						<div>
							<ul class="list-inline">
								<?php if($test3 || $test2) { ?>
								<li><a href='<?php echo site_url("comment/delete/{$comment['commentID']}"); ?>'>Delete comment</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>

				</div>

		    <?php 
		    			$i++; 
			    	}
			    } else {
			    	echo '<h2 class="text-center">No Comments</h2>';
			    }
		    ?>
		    </div>
	    </div>

	    <div class="hidden-xs hidden-sm hidden-md col-lg-2">

	    </div>

	</div>
</div>
			