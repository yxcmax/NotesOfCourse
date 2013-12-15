<?php
  $myheader_path_to_root = "../";
  $myheader_title = "Notes";
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
            <img src="../images/241.jpg" alt="CS241">
            <div class="carousel-caption">
                <h1>CS241-Systems Programming</h1>
            </div>
          </div>
          <div class="item">
            <img src="../images/225.jpg" alt="CS225">
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

    <div class="container">
      
      <!-- Search box -->
      <div class="well">
        <h4>Find your notes!</h4>
        <form id="searchForm">
        <div class="input-group" style="padding-bottom: 16px;">
          <input autocomplete="off" type="text" class="form-control" placeholder="Search for a keyword">
          <span class="input-group-btn">
            <button type="submit" id="searchBtn" class="btn btn-primary">Get Notes!</button>
          </span>
        </div>
        </form>
        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="notes" checked>
            Notes
          </label>
        </div>
        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="courses">
            Courses
          </label>
        </div>
        <!-- Search will insert table into here -->
        <div id="s_result"></div>
        <div id="s_result_pager"></div>
      </div>

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
<?php
$myheader_src = array();
$myheader_src[] = "<script src='../src/notes.js'></script>";
$myheader_src[] = "<script src='../src/totable.js'></script>";
?>
<?php include $myheader_path_to_root."misc/footer.php"; ?>
