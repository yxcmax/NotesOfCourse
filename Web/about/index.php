<?php
  $myheader_path_to_root = "../";
  $myheader_title = "About";
  $myheader_company = "Notes-Of-Course";
  include $myheader_path_to_root."auth/login.php";
  include $myheader_path_to_root."misc/header.php";
?>

<!-- Inside the <body> tag -->


    <div class="container">
      <!-- List for navigation -->
      <div class="jumbotron">
        <p>We're the awesome site that helps you find your course notes!</p>
      </div>

      <hr>

      <footer>
        <p><!--&copy;--> <?php echo $myheader_company; ?> 2013</p>
      </footer>
    </div> <!-- /container -->

<!-- Include scripts and end tags -->
<?php include $myheader_path_to_root."misc/footer.php"; ?>