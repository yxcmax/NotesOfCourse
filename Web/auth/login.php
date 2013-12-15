<?php
	//The login implementation
	session_start();

	if(!(isset($function_file) && $function_file))
	{
		if(isset($_SESSION["login_error"]))
		{
			$login_error = $_SESSION["login_error"];
			unset($_SESSION["login_error"]);
		}else
		{
			$login_error = "";
		}

		if(isset($_GET["logout"]))//Logging out
		{
			if(isset($_COOKIE["login_token"])){
				$expire = time()-60*60*24;
				setcookie("login_token", "", $expire, "/");
				unset($_COOKIE["login_token"]);//Unset the login cookie
			}
			unset($_SESSION["login"]);//Unset the login session
			header("Location: ".htmlspecialchars($_SERVER["PHP_SELF"]));
			exit();
		}

		if(isset($_POST["email"]))//Logging in
		{
			$email = $_POST["email"];
			$pass = $_POST["pass"];
			$pass = md5($pass);
			//Connect to the database
			$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");

			$query = " SELECT * FROM Users WHERE Email = '$email' and Hash = '$pass' ";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result)==1)
			{//Correct info
				//Store login info in session
				$row = mysqli_fetch_assoc($result);
				$_SESSION["login"] = $email;
				//Store token and set cookie to maintain login
				$token = md5($email.$pass.time());
				$query = " UPDATE Users SET Token = '$token' WHERE Email = '$email' ";
				mysqli_query($con, $query);
				$expire = time()+60*60*24;
				setcookie("login_token", $token, $expire, "/");
				//Refresh the page to clear POST
				header('Location: '.htmlspecialchars($_SERVER["PHP_SELF"]));
				exit();
			}else{//Wrong info
				$_SESSION["login_error"] = "<p class='navbar-text navbar-right' style='color:red;'>Wrong info</p>";
				header("Location: ".htmlspecialchars($_SERVER["PHP_SELF"]));
				exit();
			}
		}
	}

	if(isset($_COOKIE["login_token"]) && !isset($_SESSION["login"]))
	{//Supposed to be logged in
		$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");

		$token = $_COOKIE["login_token"];
		$query = " SELECT * FROM Users WHERE Token = '$token' ";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result)==1)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION["login"] = $row["Email"];
		}
	}

	if(isset($_SESSION["login"]))
	{
		$login = $_SESSION["login"];
	}
?>