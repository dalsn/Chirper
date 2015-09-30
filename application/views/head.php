<?php 

$CI =& get_instance();
$test = $CI->loggedin();
$username = $CI->session->userdata('poster_id');
$user = $CI->model_poster->getPoster($username);
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
<title>
	Chirper - The Music World
</title>
<link rel="shortcut icon" href="<?php echo site_url('imgs/Chirper.ico'); ?>">
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href=<?php echo site_url("css/metro-bootstrap-responsive.css"); ?>>
<link rel="stylesheet" href=<?php echo site_url("css/bootstrap.min.css"); ?>>
<link rel="stylesheet" href=<?php echo site_url("css/metro-bootstrap.css"); ?>>
<link href='http://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet' type='text/css'>

</head>
<body class="metro main">
<header class="dark">
	<div class="container-fluid">
	<div class="row">
	<div class="navigation-bar dark">
	<div class="navigation-bar-content container hidden-xs">
	    <a class="navbar-brand fg-mauve fg-hover-white chirper" href="<?php echo site_url('home'); ?>">
	    	<img class="cycle" alt="Chirper logo link to homepage" src ="<?php echo site_url('imgs/ChirperIcon.png'); ?>"/>
	    </a>
	    <ul class="nav navbar-nav">
	    	<li class="active"><a class="fg-white fg-hover-mauve links" href="<?php echo site_url('home'); ?>">Home</a></li>
	    <?php 
			if ($test) { 
		?>
	    		<li><a class="fg-white fg-hover-mauve links" href="<?php echo site_url('profile'); ?>">Profile</a></li>
	    		<li><a class="fg-white fg-hover-mauve links" href="<?php echo site_url('profile/logout'); ?>">Logout</a></li>
	    <?php 
	    	} else {
	    ?>
	    		<li><a class="fg-white fg-hover-mauve links" href="<?php echo site_url('login'); ?>">Login</a></li>
	    		<li><a class="fg-white fg-hover-mauve links" href="<?php echo site_url('register'); ?>">Register</a></li>
	    <?php
	    	}

			if (!empty($username)) { 
		?>
	    <li><a href ='<?php echo site_url("profile/view/{$username}"); ?>'>
							<kbd class="text-capitalize"><?php echo $user['posterName'];?></kbd>
						</a></li>
		<?php
	    	}
	    ?>
	    </ul>
	</div>
	</div>
	<div class="row no-large no-desktop">
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a id="links" href="<?php echo site_url('home'); ?>">Home</a></li>
			<?php 
				if ($test) { 
			?>
				<li role="presentation"><a id="links" href="<?php echo site_url('profile'); ?>">Profile</a></li>
				<li role="presentation"><a id="links" href="<?php echo site_url('profile/logout'); ?>">Logout</a></li>
			<?php 
		    	} else {
		    ?>
				<li role="presentation"><a id="links" href="<?php echo site_url('login'); ?>">Login</a></li>
				<li role="presentation"><a id="links" href="<?php echo site_url('register'); ?>">Register</a></li>
			<?php
		    	}
		    ?>

		</ul>
	</div>
	</div>
</header>




