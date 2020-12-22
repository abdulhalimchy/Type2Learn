<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign in</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row" style="margin-top: 10%; margin-bottom: 10%;">
			<div class="col-4"></div>
			<div class="col-4">

				<h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

				<form method="post" action="<?php echo base_url();?>Home_Controller/signin_validation">

					<div>
						<span class="text-success">
							<?php echo $this->session->flashdata("done");?>
						</span>
					</div> 
					
					<div class="form-group">
						<input class="form-control" type="text" name="username" placeholder="username"/>
						<span class="text-danger"><?php echo form_error('username'); ?></span>
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="password"/>
						<span class="text-danger"><?php echo form_error('password'); ?></span>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember_me">
							Remember me
						</label>
						
					</div>

					<div>
						<span class="text-danger">
							<?php echo $this->session->flashdata("error");?>
						</span>
					</div>

					<div>
						<input class="btn btn-info btn-block" type="submit" name="signin" value="sign in"/>
					</div>
				</form>	
			</div>
			<div class="col-4"></div>
		</div>
	</div>
</body>
</html>