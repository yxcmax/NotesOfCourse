<?php
	if(!isset($login))
	{
		echo "
			<form class='navbar-form navbar-right' method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
				<div class='form-group'>
					<input type='email' placeholder='Email' class='form-control' name='email'>
				</div>
				<div class='form-group'>
					<input type='password' placeholder='Password' class='form-control' name='pass'>
				</div>
				<button type='submit' class='btn btn-success'>Sign in</button>
				<a type='button' class='btn btn-primary' href='".$myheader_path_to_root."signup'>Signup</a>
			</form>
			".$login_error;
	}else{
		echo "
			<p class='navbar-text navbar-right'>Signed in as ".$login.", <a href='?logout' class='navbar-link'><b>click here to logout</b></a>.</p>
		";
	}
?>