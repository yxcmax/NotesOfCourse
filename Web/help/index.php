<?php
  $myheader_path_to_root = "../";
  $myheader_title = "Help";
  $myheader_company = "Notes-Of-Course";
  include $myheader_path_to_root."auth/login.php";
  include $myheader_path_to_root."misc/header.php";
?>

<!-- Inside the <body> tag -->


    <div class="container">
      <!-- List for navigation -->
      <div class="jumbotron">
        <ol>
          <li><a href="#one">Can you tell me about Notes...</a></li>
          <li><a href="#two">How do I search for lecture notes?</a></li>
          <li><a href="#three">How do I search for notes in a specific course?</a></li>
        </ol>
      </div>

      <div class="well">
        <ol>
          <li><h4><a id="one"></a>Can you tell me about Notes...</h4></li>
          <p>Of course! We are the </p>
          <li><h4><a id="two"></a>How do I search for lecture notes?</h4></li>
          <p></p>
          <li><h4><a id="three"></a>How do I search for notes in a specific course?</h4></li>
          <p></p>
        </ol>
      </div>

      <hr>

      <footer>
        <p><!--&copy;--> <?php echo $myheader_company; ?> 2013</p>
      </footer>
    </div> <!-- /container -->

<!-- Include scripts and end tags -->
<?php include $myheader_path_to_root."misc/footer.php"; ?>
