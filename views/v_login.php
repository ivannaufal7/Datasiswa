 <!DOCTYPE html>
 <html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>/media/css/style.css" rel="stylesheet">
 </head>
 <body>
 <div class="container well">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center">LOGIN</h1>
			<?php
				if(!empty($success)){
					?>
				<div class="col-lg-12">
					<div class="alert alert-success"><?php echo $success?></div>
			<?php
			}
			?>
			<?php
				if(!empty($error)){?>
				<div class="col-lg-12">
					<div class="alert alert-danger"><?php echo $error?></div>
			<?php
			}
			?>
				</div>
			<form class="form-horizontal" method="post" action="login.php">
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control"/>
					</div>
				</div>
				<div class="button">
					<button type="submit" class="col-sm-2 btn btn-primary">Login</button>
					<a href="sign.php" class="col-sm-2 btn btn-primary">Sign Up</a></span>
				</div>
				</div>
			</form>
			</div>
		</div>
 </body>
 </html>