<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  	<?php
  		if (isset($error)) { ?>
	  			<div class="alert alert-danger mt-5 w-50 m-auto" role="alert">
				  <?php echo $error; ?>
				</div>
  	<?php	}
  	?>
  	<form class="mt-5 w-50 m-auto" action="<?= base_url().'admin/login/loginpost' ?>" method="post">
  		<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
  		<div class="form-floating mb-3  ">
		  <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
		  <label for="floatingInput">Username</label>
		</div>
		<div class="form-floating mb-3 ">
		  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
		  <label for="floatingPassword">Password</label>
		</div>
		<div class="form-check text-start my-3">
	      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
	      <label class="form-check-label" for="flexCheckDefault">
	        Remember me
	      </label>
	    </div>
	    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  	</form>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>