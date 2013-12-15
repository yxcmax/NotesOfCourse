<?php
  if(!isset($_POST['newemail']) || !isset($_POST['newpass'])){
    header('Refresh: 4;url=../');
    echo "something went wrong, you will be redirected
          <a href='../'><p>Click here if nothing happens</p></a>
          ";
    exit();
  }

	$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");
	$newemail = $_POST['newemail'];
	$newpass = $_POST['newpass'];
  $hash = md5($newpass);
  $token = md5($newemail.$newpass.time());

	$result = mysqli_query($con, " INSERT INTO Users (Email, Password, Hash, Token) VALUES ('$newemail','$newpass','$hash','$token') ");
  //$UID = mysqli_query($con, "SELECT idNum FROM Drinker where userID = '$user'");
  //$therow = mysqli_fetch_assoc($UID);
  //$UID = $therow['idNum'];
  //$result = mysqli_query($con, "INSERT INTO Profile (UID) VALUES ('$UID')");
	if($result==false){
		echo 'error';
	}else{
    $expire = time() + 60*60*24; //1 day
    setcookie('login_token', $token, $expire, '/');
    session_start();
    $_SESSION["login"] = $newemail;
    header('Refresh: 4;url=../');
		echo'

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../ico/favicon.ico">

    <title>Notes, of Course - Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
  </head>

  <body>
    <div class="container" style="padding-top: 75px;">
      <legend>Thank you for signing up at Notes, of Course!</legend>
      <div class="well" style="background: rgba(0, 128, 255, 0.3);padding-top: 75px;padding-bottom: 75px;">
      	<h2>Welcome '.$newemail.", you'll be redirected to the home page soon.</h2>
      	<a href='../'><p>Click here if nothing happens</p></a>
      </div>
    </div>
  </body>

		";		
	}
?>