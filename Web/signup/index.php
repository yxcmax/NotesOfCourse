<?php
  $myheader_path_to_root = "../";
  $myheader_title = "Signup for NoC";
  $myheader_company = "Notes-Of-Course";
  include $myheader_path_to_root."auth/login.php";
?>

<?php
  if(isset($login)) 
  {
  	header("Refresh: 4;url=".$myheader_path_to_root);
    echo '
          <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="">
              <link rel="shortcut icon" href="'.$myheader_path_to_root.'ico/favicon.ico">

              <title>Notes, of Course! - Signup</title>

              <!-- Bootstrap core CSS -->
              <link href="'.$myheader_path_to_root.'/bootstrap/css/bootstrap.css" rel="stylesheet">

              <!-- Add custom CSS here -->
            </head>
            <body>
              <div class="container" style="padding-top: 25px;">
                <legend>Sign up for Notes, of Course!</legend>
                <div class="well" style="background: rgba(0, 128, 255, 0.3);padding-top: 50px;padding-bottom: 50px;">
                  <h1>Signed in as '.$login.'</h1>
                  <p>Redirecting in 3...</p>
                  <a href="'.$myheader_path_to_root.'">Click here if nothing happens</a>
                </div>
                <hr>

			    <footer>
			      <p><!--&copy;-->'.$myheader_company.' 2013</p>
			    </footer>
              </div>
            </body>
    ';
  }else{
    echo '



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="'.$myheader_path_to_root.'ico/favicon.ico">

    <title>Notes, of Course! - Signup</title>

    <!-- Bootstrap core CSS -->
    <link href="'.$myheader_path_to_root.'/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
  </head>

  <body>
    <div class="container" style="padding-top: 25px;">
      <legend>Sign up for <a href="'.$myheader_path_to_root.'">Notes, of Course!</a></legend>
      <div class="well" style="background: rgba(0, 128, 255, 0.3);padding-top: 50px;padding-bottom: 50px;">
        <form class="form-horizontal" role="form" id="form1" method="post" action="welcome.php">
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-6">
              <input name="newemail" type="email" class="form-control" id="inputEmail" placeholder="Email" autocomplete="off">
            </div>
            <div style="color:red;" id="emailwar"></div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-6">
              <input name="newpass" type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <div style="color:red" id="passwar"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="button" class="btn btn-default" id="mysubmit">Sign up</button>
            </div>
          </div>
        </form>
      </div>
    </div>


  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).ready(function(){

      $("#mysubmit").click(function() {
        document.getElementById("emailwar").innerHTML="";
        document.getElementById("passwar").innerHTML="";
        var emailVal = $("#inputEmail").val().trim();
        var passVal = $("#inputPassword").val();

        //Email validation
		var atpos=emailVal.indexOf("@");
		var dotpos=emailVal.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=emailVal.length)
		{
			document.getElementById("emailwar").innerHTML="Please enter a valid email address";
			document.getElementById("inputPassword").value="";
			return false;
		}

        if(emailVal.length > 50){
          document.getElementById("emailwar").innerHTML="This email address is too long!!";
          document.getElementById("inputPassword").value="";
          return false;
        }

        for(var i=0;i<emailVal.length;i++){
          var c = emailVal.charAt(i);
          if( !(c<="z" && c>="a") && !(c<="Z" && c>="A") && !(c<="9" && c>="0") && !(c=="@") && !(c==".") ){
            document.getElementById("emailwar").innerHTML="Email address must only contain a-z , A-Z , 0-9 , dot and @";
            document.getElementById("inputPassword").value="";
            return false;
          }
        }

        //Password validation
        if(passVal.length > 15 || passVal.length < 6){
          document.getElementById("passwar").innerHTML="password must be 6~15 characters long";
          document.getElementById("inputPassword").value="";
          return false;
        }

        //alert(userVal);
        $.post("checkuser.php", {newemail : emailVal}, function(data) {
          if(data=="exist"){
            document.getElementById("emailwar").innerHTML="The user name you entered already exists, please choose a new one.";
            document.getElementById("inputPassword").value="";
            return false;
          }
          else{
            $("#form1").submit();
          }
        });
      });
    });
  </script>
  </body>

      ';
  }
?>