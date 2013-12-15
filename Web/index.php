<?php
  $myheader_path_to_root = "./";
  $myheader_title = "Home";
  $myheader_company = "Notes-Of-Course";
  include $myheader_path_to_root."auth/login.php";
  include $myheader_path_to_root."misc/header.php";
?>

<!-- Inside the <body> tag -->

    <!-- Carousel -->
    <div class="container">
      <div id="course-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#course-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#course-carousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="images/241.jpg" alt="CS241">
            <div class="carousel-caption">
                <h1>CS241-Systems Programming</h1>
            </div>
          </div>
          <div class="item">
            <img src="images/225.jpg" alt="CS225">
            <div class="carousel-caption">
              <h1>CS225-Data Structures</h1>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#course-carousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#course-carousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Find the notes you want here!</h1>
        <p>Having trouble deciding what classes you are going to take?</p>
        <p>Want to find lecture slides that contain information you are looking for? You've come to the right place!</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="./help">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>CS241-Systems Programming</h2>
          <p>Go deeper into the basics of the computer that we use everyday, learn more about the interactions between programs and the operating system. Sink into memory, network and a whole lot of intersting things!</p>
          <p><a class="btn btn-default" href="#" role="button">View notes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>CS225-Data Structures</h2>
          <p>Do you know how data is stored in a program? Even though computers seem 'fast' to us, they're actually repeating simple instructions again and again. So how are we computer scientists going to build efficient data structures to allow computers to find our data more quickly?</p>
          <p><a class="btn btn-default" href="#" role="button">View notes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2><em>Under Construction</em></h2>
          <p>...</p>
          <p><a class="btn btn-default" href="#" role="button">View notes not &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p><!--&copy;--> <?php echo $myheader_company; ?> 2013</p>
      </footer>
    </div> <!-- /container -->

<!-- Include scripts and end tags -->
<?php include $myheader_path_to_root."misc/footer.php"; ?>
