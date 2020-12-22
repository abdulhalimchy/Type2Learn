<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Bootstrap 4 tutorial</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/header.css">
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>


	<nav class="navbar navbar-expand-sm navbar-custom">
		<a href="#" class="navbar-brand"><b>Type2Learn<b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCustom">
			<i class="fa fa-bars fa-lg py-1 text-white"></i>
		</button>
		<div class="navbar-collapse collapse" id="navbarCustom">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#" style="font-size:16px">Typing speed</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#" style="font-size:16px">Practice typing</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#" style="font-size:16px">Vocabulary test</a>
				</li>


				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:16px">
						Global rank
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Fast Typer</a>
						<a class="dropdown-item" href="#">Vocabulary Solver</a>
					</div>
				</li>

				<li class="nav-item" align="right">
					<a class="nav-link" href="#" style="font-size:16px">Contact</a>
				</li>
			</ul>
		</div>
	</nav>


	<footer class="page-footer font-small" style="background-color:#222222;color: rgba(255,255,255,.6); bottom:0; position: fixed; width: 100%;">

		<div class="footer-copyright text-center py-3">© 2019 Copyright- Abdul Halim Chowdhury</div>

	</footer>

</body>
</html>