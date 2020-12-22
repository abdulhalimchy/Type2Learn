<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Type 2 learn</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="<?php echo base_url();?>typing-speed">Type2Learn</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navb" class="navbar-collapse collapse hide">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>typing-speed">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>typing-speed">Typing Speed</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>typing-rank">Typing Rank</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>typing-history">Typing History</a>
				</li>
			</ul>

			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#"><span class="fas fa-user"></span><?php echo $username;?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>signout"><span class="fas fa-sign-in-alt"></span>sign out</a>
				</li>
			</ul>
		</div>
	</nav>

</body>
</html>