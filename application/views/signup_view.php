<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row" style="margin-top: 5%; margin-bottom: 10%;">
			<div class="col-4"></div>
			<div class="col-4">

				<h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

				<form method="post" action="<?php echo base_url();?>Home_Controller/signup_validation">

					<div class="form-group">
						<input class="form-control" type="text" name="name" placeholder="name" required/>
					</div>

					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="email" required/>
						<div>
						<span class="text-danger">
							<?php echo $this->session->flashdata("error1");?>
						</span>
					</div>
					</div>

					<!-- :::::::::::::::::username:::::::::::::: -->
					<div class="form-group">
						<input class="form-control" type="text" name="username" placeholder="username" id="username" required/>
						<div>
						<span class="text-danger">
							<?php echo $this->session->flashdata("error2");?>
						</span>
					</div>
					</div>

					<!-- <label>Date of Birth:</label>
					<div class="form-group">
						<input class="form-control" type="date" name="dateOfbirth"required/>
					</div> -->

					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="password" required />
					</div>

					<!-- <label>Security Questions:</label>
					<div class="row">
						<div class="col-6">
							<span class="form-group">
								<input class="form-control" type="text" name="securityQ1" placeholder="Your favorite country?" required/>
							</span>
						</div>
						<div class="col-6">
							<span class="form-group">
								<input class="form-control" type="text" name="securityQ2" placeholder="Your favorite game?" required/>
							</span>

						</div>
					</div> -->
					<div class="checkbox">
						<label>
							<input type="checkbox" name="terms_conditions" required>
							I agree to <a class="text-info" href="#">terms and conditions</a>
						</label>

					</div>

					<div>
						<input class="btn btn-info btn-block" type="submit" name="signup" value="Sign up"/>
					</div>
				</form>	
			</div>
			<div class="col-4"></div>
		</div>
	</div>
</body>
</html>