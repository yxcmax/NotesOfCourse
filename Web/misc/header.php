<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo "'".$myheader_path_to_root."ico/favicon.ico'"; ?>>

    <title>Notes, of Course! - <?php echo $myheader_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "'".$myheader_path_to_root."bootstrap/css/bootstrap.css'"; ?> rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=<?php echo "'".$myheader_path_to_root."jumbotron.css'"; ?> rel="stylesheet">

    <!-- Custom styles for carousel -->
    <link rel="stylesheet" type="text/css" href=<?php echo "'".$myheader_path_to_root."custom.css'"; ?>>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=<?php echo "'".$myheader_path_to_root."'" ?>>Notes, of Course!</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php if(strcmp($myheader_title, "Home")==0) echo " class='active'"; ?>><a href=<?php echo "'".$myheader_path_to_root."'"; ?>>Home</a></li>
            <li<?php if(strcmp($myheader_title, "Notes")==0) echo " class='active'"; ?>><a href=<?php echo "'".$myheader_path_to_root."notes'"; ?>>Notes</a></li>
            <li<?php if(strcmp($myheader_title, "Help")==0) echo " class='active'"; ?>><a href=<?php echo "'".$myheader_path_to_root."help'"; ?>>Help</a>
            <li<?php if(strcmp($myheader_title, "About")==0) echo " class='active'"; ?>><a href=<?php echo "'".$myheader_path_to_root."about'"; ?>>About</a></li>
          </ul>
          <?php include $myheader_path_to_root."auth/navbar.php" ;?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
